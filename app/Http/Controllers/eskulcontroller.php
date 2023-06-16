<?php
namespace App\Http\Controllers;
use App\Models\eskul;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class eskulcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =eskul::orderby('id','desc')->get();
       return view('admin.eskul.index',[
        'judul'=>'Ekstrakulikuler',
        'link'=>'Ekstrakulikuler'
       ])->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

       return view('admin.eskul.create',[
        'judul'=>'Tambah Ekstrakulikuler',
        'link'=>'Ekstrakulikuler'
       ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama'     => 'required|min:5',
            'icon'     => 'required|image|mimes:svg',
            'instagram'   => '',
            'color'     =>  'required'
        ]);
        $image=$request->file('icon');
        $image->storeAs('public/img/icon',$image->hashName());
        $data=[
            'icon'=>$image->hashName(),
            'nama'=>$request->nama,
            'instagram'=>$request->instagram,
            'color'=>$request->color,
        ];
       

        eskul::create($data);
        return redirect()->to('dashboard/eskul')->with(['success' => 'Data Berhasil Disimpan!']);
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
        
        $data=eskul::find($id);
        return view('admin.eskul.edit',[
         'judul'=>'Edit Ekstrakulikuler',
        ])->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
        $this->validate($request, [
            'nama'     => 'required|min:5',
            'icon'     => 'image|mimes:svg',
            'instagram'   => '',
            'color'=>'required'
        ]);
        if($request->hasFile('icon')){
            
            Storage::delete('public/img/icon/'.$request->image);
            $image=$request->file('icon');
            $image->storeAs('public/img/icon',$image->hashName());
             $data=[
             'icon'=>$image->hashName(),
             'nama'=>$request->nama,
             'instagram'=>$request->instagram,
             'color'=>$request->color
             ];
         }else{
             $data=[
                'nama'=>$request->nama,
                'instagram'=>$request->instagram,
                'color'=>$request->color
                 ];
         }
         eskul::where('id',$id)->update($data);
         return redirect('dashboard/eskul')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=eskul::find($id);
        Storage::delete('public/img/icon/'.$data->icon);
        eskul::find($id)->delete();
        return redirect()->to('dashboard/eskul')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
