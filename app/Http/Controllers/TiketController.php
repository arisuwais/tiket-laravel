<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tiket;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiket = tiket::orderby('id', 'desc')->get();

        return view('tiket.index', compact('tiket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tiket.create');
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
            'name_tiket' => 'min:3|required',
            'harga_tiket' => 'numeric|required',
            'jumlah_tiket' => 'required',
            'jenis_tiket' => 'required',

        ]);
        $tiket = tiket::create($request->all());
        return redirect()->route('tiket.index')->with('pesan', 'data tiket berhasil disimpan');
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
        $tiket = tiket::findOrFail($id);
        // dd($tiket);
        return view('tiket.edit', compact('tiket'));
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
            'name_tiket' => 'min:3|required',
            'harga_tiket' => 'numeric|required',
            'jumlah_tiket' => 'required',
            'jenis_tiket' => 'required',

        ]);
        $tiket = tiket::find($id);
        $tiket->update($request->all());
        return redirect()->route('tiket.index')->with('pesan', 'data tiket berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tiket = tiket::find($id);
        if (!$tiket) {
            return redirect()->back();
        }
        $tiket->delete();
        return redirect()->route('tiket.index')->with('pesan', 'data tiket berhasil dihapus');
    }
}
