<?php

namespace App\Http\Controllers;
use App\Models\kepsek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class kepsekcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=kepsek::orderby('id','desc')->get();
       return view('admin.kepsek.index',[
        'judul'=>'Sambutan Kepala Sekolah'
       ])->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data=kepsek::get();
        if (count($data)===1) {
           
        } else {
            return view('admin.kepsek.create',[
                'judul'=>'Buat Sambutan'
               ]);  
        }
        
     
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'foto'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama'     => 'required|min:5',
            'sambutan'   => 'required|min:10',
        ]);


        $image=$request->file('foto');
        $image->storeAs('public/img/kepsek',$image->hashName());
        $data=[
            'foto'=>$image->hashName(),
            'nama'=>$request->nama,
            'sambutan'=>$request->sambutan

        ];

        kepsek::create($data);
        return redirect()->to('dashboard/kepsek')->with(['success' => 'Data Berhasil Ditambah!']);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      $data=kepsek::find($id);
      return view('admin.kepsek.show',[
        'judul'=>'Sambutan Bapak '.$data->nama,
      ])->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=kepsek::where('id',$id)->first();
       return view('admin.kepsek.edit',[
        'judul'=>'Edit Sambutan'
       ])->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'foto'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama'     => 'required|min:5',
            'sambutan'   => 'required|min:10',
        ]);
        if($request->hasFile('foto')){
            
           Storage::delete('public/img/kepsek/'.$request->oldfoto);
           $image=$request->file('foto');
           $image->storeAs('public/img/kepsek',$image->hashName());

            $data=[
            'foto'=>$image->hashName(),
            'nama'=>$request->nama,
            'sambutan'=>$request->sambutan

            ];
          
        }else{
            $data=[
                'nama'=>$request->nama,
                'sambutan'=>$request->sambutan
                ];
        }
        kepsek::where('id',$id)->update($data);
        return redirect('dashboard/kepsek')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=kepsek::find($id);
        Storage::delete('public/img/kepsek/'.$data->foto);
       kepsek::find($id)->delete();
       return redirect('dashboard/kepsek')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    public function sambutan()
    {
        return view('pages.sambutan',[
            'kepsek'=>kepsek::get()->first(),
            'judul'=>'Sambutan Kepala Sekolah'
        ]);
    }
}
