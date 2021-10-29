<?php

namespace App\Http\Controllers;

use App\Models\pemasok;
use Illuminate\Http\Request;

class PemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pemasok.index', [
            'pemasok' => pemasok::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pemasok.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_pemasok' => 'required',
            'nama_pemasok' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'no_telp' => 'required'
        ]);

        Pemasok::create($validatedData);

        return redirect('/pemasok')->with('success', 'New Data has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function show(pemasok $pemasok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function edit(pemasok $pemasok)
    {
        return view('pemasok.index', [
            'pemasok' => $pemasok
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pemasok $pemasok)
    {
        $validatedData = $request->validate([
            'kode_pemasok' => 'required',
            'nama_pemasok' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'no_telp' => 'required'
        ]);

        Pemasok::where('id', $pemasok->id)
            ->update($validatedData);

        return redirect('/pemasok')->with('success', 'New Data has been added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $validatedData = Pemasok::find($id);
        $validatedData->delete();
        return redirect('/pemasok');
    }
}
