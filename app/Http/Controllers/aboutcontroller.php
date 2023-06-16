<?php

namespace App\Http\Controllers;
use App\Models\about;
use Illuminate\Http\Request;

class aboutcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     $data=about::get();
     return view('admin.about.index',[
        'judul'=>'Tentang SMKN 7 Baleendah'
     ])->with('data',$data);  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $data=about::get();
        if (count($data)===1) {
            # code...
        } else {
            return view('admin.about.create',[
                'judul'=>'Tambah Keterangan'
            ]);
        }
        
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $this->validate($request,[
        'visi'=>'required|min:30',
        'misi'=>'required|min:30',
        'sejarah'=>'required|min:30'
       ]);

       $data=[
        'visi'=>$request->visi,
        'misi'=>$request->misi,
        'sejarah'=>$request->sejarah,
       ];
       about::create($data);
       return redirect('dashboard/about')->with(['success' => 'Data Berhasil Disimpan!']);
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
       $data=about::find($id);
       return view('admin.about.edit',[
        'judul'=>'Edit Keterangan'
       ])->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'visi'=>'required|min:30',
            'misi'=>'required|min:30',
            'sejarah'=>'required|min:30'
           ]);
    
           $data=[
            'visi'=>$request->visi,
            'misi'=>$request->misi,
            'sejarah'=>$request->sejarah,
           ];
           about::find($id)->update($data);
           return redirect('dashboard/about')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        about::find($id)->delete();
        return redirect('dashboard/about')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    public function about(about $about)
    {
        return view('pages.about',[
            'judul'=>'Tentang Smkn 7 Baleendah',
            'about'=>$about->first()
        ]);
    }
}
