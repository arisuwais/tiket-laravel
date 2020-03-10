<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kategori;
use App\Imports\KategoriImport;
use Excel;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
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
            'nama_kategori' => 'min:3|required'
        ]);
        $kategori = Kategori::create($request->all());
        return redirect()->route('kategori.index')->with('pesan', 'data berhasil dimasukan');
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
        $kategori = Kategori::findOrFail($id);
        // dd($kategori);
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'min:3|required'
        ]);
        $kategori = Kategori::find($id);
        $kategori->update($request->all());
        return redirect()->route('kategori.index')->with('pesan', 'data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect()->route('kategori.index')->with('pesan', 'data berhasil dihapus');
    }
    public function excel()
    {
        return view('kategori.excel');
    }
    public function upload(Request $request)
    {
        $this->validate($request, ['file' => 'required|mimes:xls,xlsx']);
        if ($request->has('file')) {
            $file = $request->file('file');
            Excel::import(new KategoriImport, $file);
            return redirect()->route('kategori.index')->with('pesan', 'data berhasil di upload');
        }

        return redirect()->back()->with('pesan', 'gagal upload file');
    }
}
