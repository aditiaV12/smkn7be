<?php

namespace App\Http\Controllers;
use App\Models\berita;

use App\Models\kategori;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class beritacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request('search')) {
            $search=request('search');
            $data=berita::where('judul','like','%'. $search.'%')
                          ->orwhere('isi','like','%'. $search.'%')
                          ->orwhere('author','like','%'. $search.'%')
                          ->join('kategori','berita.kategori_id','=','kategori.id')
                          ->orwhere('nama','like','%'.$search.'%')
                          ->paginate(10)->withQueryString();
        }else{
            $data=berita::sortable()->paginate(10);
        }
        return view('admin.berita.index',[
            'judul'=>'Berita'
        ])->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori=kategori::get();
        return view('admin.berita.create',[
            'judul'=>'Tambah Berita'
        ])->with('kategori',$kategori);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'cover'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul'     => 'required|min:5',
            'isi'   => 'required|min:30',
            'author'=>'required'
        ]);
        $image=$request->file('cover');
        $image->storeAs('public/img/berita',$image->hashName());
        $data=[
            'cover'=>$image->hashName(),
            'judul'=>$request->judul,
            'kategori_id'=>$request->kategori,
            'author'=>$request->author,
            'isi'=>$request->isi

        ];
       

        berita::create($data);
        return redirect()->to('dashboard/berita')->with(['success' => 'Data Berhasil Disimpan!']);


    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data=berita::where('id',$id)->first();
        
        return view('admin.berita.show',[
            'judul'=>$data->judul
        ])->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $data=berita::where('id',$id)->first();
       return view('admin.berita.edit',[
        'judul'=>'Edit '.$data->judul,
        'kategori'=>kategori::get()
       ])->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'cover'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul'     => 'required|min:5',
            'isi'   => 'required|min:30',
            'author'=>'required'
        ]);
        if($request->hasFile('cover')){
            
           Storage::delete('public/img/berita/'.$request->image);
           $slug = SlugService::createSlug(berita::class, 'slug', $request->judul);
           $image=$request->file('cover');
           $image->storeAs('public/img/berita',$image->hashName());
            $data=[
            'cover'=>$image->hashName(),
            'judul'=>$request->judul,
            'slug'=>$slug,
            'author'=>$request->author,
            'kategori_id'=>$request->kategori,
            'isi'=>$request->isi

            ];
          
        }else{
            $slug = SlugService::createSlug(berita::class, 'slug', $request->judul);
            $data=[

                'judul'=>$request->judul,
                'slug'=>$slug,
                'author'=>$request->author,
                'kategori_id'=>$request->kategori,
                'isi'=>$request->isi
                ];
        }
        berita::where('id',$id)->update($data);
        return redirect('dashboard/berita')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=berita::find($id);
        Storage::delete('public/img/berita/'.$data->cover);

      
        berita::where('id',$id)->delete();
        return redirect('dashboard/berita')->with(['success' => 'Data Berhasil Dihapus!']);

    }

    public function posts(Request $request){
        if ($request->search) {
            $search=request('search');
            $data=berita::where('judul','like','%'. $search.'%')
                          ->orwhere('isi','like','%'. $search.'%')
                          ->orwhere('author','like','%'. $search.'%')
                          ->latest()
                          ->paginate(10)->withQueryString();
        }else{

            $data=berita::orderby('id','desc')->paginate(10);
        }
        return view('pages.berita',[
            'judul'=>"Berita"
        ])->with('data',$data);
    }
    public function blog(berita $berita){
       
        return view('blog')->with('pages.berita',$berita);
    }
 
}
