<?php

namespace App\Http\Controllers;
use App\Models\berita;
use App\Models\eskul;
use App\Models\staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;

class homeController extends Controller
{
    public function index()
    {
        return view('pages.index',[
        'berita'=>berita::orderby('id','desc')->paginate(6),
        'eskul'=>eskul::latest('id')->get(),
        'staff'=>staff::where('staff_kategori_id','1')->get(),
        'judul'=>'Home'
        ]);
    }

}
