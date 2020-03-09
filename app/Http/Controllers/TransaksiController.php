<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transaksi;
use Fpdf;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = transaksi::where('status', '0')->get();

        return view('transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaksi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'qty' => 'required'

        ]);
        transaksi::create($request->except('submit'));
        return redirect()->route('transaksi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $transaksi = transaksi::where('status', '0');
        $transaksi->update(['status' => '1']);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = transaksi::findOrFail($id);
        if (!$transaksi) {
            return redirect()->back();
        }
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('pesan', 'data transaksi berhasil dihapus');
    }
    public function laporan()
    {
        $fpdf = new Fpdf();
        $fpdf::AddPage();
        $fpdf::SetFont('Courier', 'B', 18);
        $fpdf::Cell(50, 25, 'Hello World!');
        $fpdf::Output();
        exit();
    }
}
