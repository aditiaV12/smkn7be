<?php

namespace App\Http\Controllers;

use App\Models\staff_kategori;
use Illuminate\Http\Request;

class staff_kategoricontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=staff_kategori::all();
        return view('admin.jabatan.index',[
            'judul'=>'Jabatan'
        ])->with('data',$data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jabatan.create',[
            'judul'=>'Tambah Jabatan'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
        'jabatan'=>'required|min:5'
       ]);
       staff_kategori::create([
        'jabatan'=>$request->jabatan
       ]);
       return redirect('dashboard/jabatan')->with('success','Data Berhasil DiTambahkan!');
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
        $data=staff_kategori::find($id);
        return view('admin.jabatan.edit',[
            'judul'=>'Edit',$data->jabatan
        ])->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
       $request->validate([
        'jabatan'=>'required|min:5'
       ]);
       staff_kategori::find($id)->update([
        'jabatan'=>$request->jabatan
       ]);
       return redirect('dashboard/jabatan')->with('success','Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        staff_kategori::find($id)->delete();
        return redirect('dashboard/jabatan')->with('success','Data Berhasil Dihapus!');
    }
}
