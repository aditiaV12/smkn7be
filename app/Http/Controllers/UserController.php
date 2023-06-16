<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=User::orderby('id','desc')->get();
        return view('admin.user.index',[
            'judul'=>'Admin'
        ])->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.user.create',[
        'judul'=>'Tambah Admin',
        'link'=>'create'
       ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi=$request->validate([
            'name'=>"required",
            'password'=>"required",
            'email'=>"required|email",
        ]);
        $validasi['password']=bcrypt($validasi['password']);
        User::create($validasi);
        return redirect('dashboard/admin')->with('success','Data Berhasil Di tambah!');
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
        $data=User::find($id);
        return view('admin.user.edit',[
            'judul'=>'Edit Admin',
        ])->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>"required|min:5",
            'password'=>"required|min:5",
            'email'=>"required|email",
        ]);
        $password=$request->password;
        $password=bcrypt($password);
       User::find($id)->update([
        'email'=>$request->email,
        'name'=>$request->name,
        'password'=>$password,
        
       ]);
       return redirect('dashboard/admin')->with('success','Data Berhasil Di Ubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return redirect('dashboard/admin')->with('success','Data Berhasil Di hapus!');
    }
}
