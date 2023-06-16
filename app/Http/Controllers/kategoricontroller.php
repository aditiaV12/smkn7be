<?php

namespace App\Http\Controllers;
use App\Models\kategori;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class kategoricontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=kategori::orderby('id','desc')->get();
        return view('admin.kategori.index',[
            'judul'=>'Kategori'
        ])->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.kategori.create',[
        'judul'=>'Tambah Kategori'
       ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required|min:5',
         
        ]);

        kategori::create([
            'nama'=>$request->nama,
         
        ]);
        return redirect('dashboard/kategori')->with(['success'=>'Data berhasil Ditambah!']);
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
       $data=kategori::find($id);
        return view('admin.kategori.edit',[
            'judul'=>'Edit Kategori '. $data->nama,
        ])->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $request->validate([
        'nama'=>'required|min:5',
      
       ]);
       $slug = SlugService::createSlug(kategori::class, 'slug', $request->judul);

       kategori::find($id)->update([
        'nama'=>$request->nama,
        'slug'=>$slug,
        
       ]);
       return redirect('dashboard/kategori')->with(['success'=>'Data berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       kategori::find($id)->delete();
       return redirect('dashboard/kategori')->with(['success'=>'Data berhasil Dihapus!']);
    }
}
