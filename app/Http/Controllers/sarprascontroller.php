<?php

namespace App\Http\Controllers;
use App\Models\sarpras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use \Cviebrock\EloquentSluggable\Services\SlugService;

class sarprascontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request('search'))
        {   $search=request('search');
            $data=sarpras::where('judul','like','%'.$search.'%')
                              ->orwhere('body','like','%'.$search. '%')
                              ->orwhere('author','like','%'.$search. '%')
                              ->paginate(10);

        }else
        {

            $data=sarpras::orderby('id','desc')->paginate(10);
        }
        return view('admin.sarpras.index',[
            'judul'=>'Sarana dan Prasarana'
        ])->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.sarpras.create',[
        'judul'=>'Tambah Sarana dan Prasarna'
       ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'foto'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul'     => 'required|min:5',
            'body'   => 'required|min:10',
            'author'=>'required'
        ]);


        $image=$request->file('foto');
        $image->storeAs('public/img/sarpras',$image->hashName());
        $data=[
            'foto'=>$image->hashName(),
            'judul'=>$request->judul,
            'author'=>$request->author,
            'body'=>$request->body

        ];

        sarpras::create($data);
        return redirect()->to('dashboard/sarpras')->with(['success' => 'Data Berhasil Disimpan!']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data=sarpras::find($id);
        return view('admin.sarpras.show',[
            'judul'=>$data->judul
        ])->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
     $data=sarpras::find($id);
     return view('admin.sarpras.edit',[
        'judul'=>'Edit'.$data->judul
     ])->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'foto'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul'     => 'required|min:5',
            'body'   => 'required|min:10',
            'author'=>'required'
        ]);
        if($request->hasFile('foto')){
            Storage::delete('public/img/sarpras/'.$request->oldimage);
            $slug = SlugService::createSlug(sarpras::class, 'slug', $request->judul);
            $image=$request->file('foto');
            $image->storeAs('public/img/sarpras',$image->hashName());

            $data=[
            'foto'=>$image->hashName(),
            'judul'=>$request->judul,
            'slug'=>$slug,
            'author'=>$request->author,
            'body'=>$request->body

            ];
        }else{
            $slug = SlugService::createSlug(sarpras::class, 'slug', $request->judul);
            $data=[
                'judul'=>$request->judul,
                'slug'=>$slug,
                'author'=>$request->author,
                'body'=>$request->body
                ];
        }
        sarpras::where('id',$id)->update($data);
        return redirect('dashboard/sarpras')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=sarpras::find($id);
        Storage::delete('public/img/berita/'.$data->foto);
        sarpras::find($id)->delete();
        return redirect('dashboard/sarpras')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function posts(sarpras $sarpras)
    {
        if(request('search'))
        {   $search=request('search');
            $sarpras=sarpras::where('judul','like','%'.$search.'%')
                              ->orwhere('body','like','%'.$search. '%')
                              ->orwhere('author','like','%'.$search. '%')
                              ->paginate(10);

        }
        $sarpras=sarpras::orderby('id','desc')->paginate(10);
        

       return view('pages.sarpras',[
        'judul'=>'Sarana Dan Prasarana',
        'sarpras'=>$sarpras
       ]);
    }
    public function sarana(sarpras $sarpras)
    {
       return view('pages.sarana',[
        'judul'=>'Sarana Dan Prasarana',
        'sarpras'=>$sarpras
       ]);
    }
}
