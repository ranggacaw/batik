<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $barangs = Barang::all(); // ngambil semua barang di tabel Barang
        // dd($barangs); // buat ngecheck ke ambil apa engga data nya dari database


        $barangs = Barang::paginate(20); // dibatasi per page cuma 20 bos
        return view('home', compact('barangs'));
    }
}
