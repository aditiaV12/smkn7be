<?php

namespace App\Http\Controllers;
use App\Models\staff;
use App\Models\staff_kategori;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class staffcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request('search')) {
            $search=request('search');
            $data=staff::where('nama','like','%'. $search.'%')
                          ->orwhere('staff.jabatan','like','%'. $search.'%')
                          ->orwhere('staff_kategori.jabatan','like','%'. $search.'%')
                          ->join('staff_kategori','staff_kategori.id','=','staff.staff_kategori_id')
                          ->paginate(10)->withQueryString();
        }else{
            $data=staff::sortable()->paginate(10);
        }
       return view('admin.staff.index',[
        'judul'=>'staff'
       ])->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori=staff_kategori::get();
        return view('admin.staff.create',[
            'judul'=>'Tambah Staff'
        ])->with('kategori',$kategori);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'foto'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama'     => 'required',
            'jabatan'   => 'required',
            'kategori'  =>'required'
        ]);
        $image=$request->file('foto');
        $image->storeAs('public/img/staff',$image->hashName());
        $staff=[
            'foto'=>$image->hashName(),
            'nama'=>$request->nama,
            'jabatan'=>$request->jabatan,
            'staff_kategori_id'=>$request->kategori
        ];
        staff::create($staff);
        return redirect()->to('dashboard/staff')->with(['success' => 'Data Berhasil Ditambah!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
   //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=staff::find($id);
        return view('admin.staff.edit',[
            'judul'=>'Edit Staff '.$data->nama,
            'kategori'=>staff_kategori::get()
        ])->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'foto'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama'     => 'required',
            'jabatan'   => 'required',
            'kategori'=>'required'
        ]);
        if($request->hasFile('foto')){
            Storage::delete('public/img/staff/'.$request->oldimage);
           $image=$request->file('foto');
           $image->storeAs('public/img/staff',$image->hashName());

            $data=[
            'foto'=>$image->hashName(),
            'nama'=>$request->nama,
            'staff_kategori_id'=>$request->kategori,
            'jabatan'=>$request->jabatan

            ];
          
        }else{
            $data=[
                'nama'=>$request->nama,
                'staff_kategori_id'=>$request->kategori,
                'jabatan'=>$request->jabatan
                ];
        }
        staff::where('id',$id)->update($data);
        return redirect('dashboard/staff')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=staff::find($id);
        Storage::delete('public/img/staff/'.$data->foto);
       staff::find($id)->delete();
        return redirect()->to('dashboard/staff')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    public function staff(Request $request)
    {   
        $staff=staff::orderby('id','desc')->paginate(15);
        $search=$request->search;
        if ($request->search) {
            $staff=staff::where('nama', 'like','%'.$search.'%')
            ->orwhere('jabatan','like','%'.$search.'%')
            ->paginate(15);
        }
        return view('pages.staff',[
            'judul'=>'Staff Smkn 7 Baleendah',
            'staff'=>$staff
        ]);
    }
}
