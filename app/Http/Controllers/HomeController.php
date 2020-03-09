<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\transaksi;

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
        $transaksi =  DB::table('transaksis')
            ->join('tikets', 'transaksis.id_tiket', '=',  'tikets.id')
            ->join('kategoris', 'kategoris.id', '=', 'tikets.id_kategori')
            ->where('status', '=', 1)
            ->get();

        // $count = transaksi::all();
        return view('home', compact('transaksi'));
    }
}
