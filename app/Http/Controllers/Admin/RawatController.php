<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRawatRequest;
use App\Http\Requests\UpdateRawatRequest;
use App\Models\Rawat;
use App\Models\Lokasi;
use App\Models\Jenazah;
use App\Models\Pekerja;
use Illuminate\Http\Request;

class RawatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rawat = Rawat::all();
        return view('admin.rawat.index', compact('rawat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Rawat::generateId();
        $jenazah = Jenazah::all()->map(function ($item, $key) {
            return ['label' => $item->nama, 'value' => $item->id_daftar];
        });

        $lokasi = Lokasi::all()->map(function ($item, $key) {
            return ['label' => $item->blok->nama_blok, 'value' => $item->id_lokasi];
        });

        $pekerja = Pekerja::all()->map(function ($item, $key) {
            return ['label' => $item->nama, 'value' => $item->id_pekerja];
        });
        return view('admin.rawat.create', compact('id', 'lokasi', 'jenazah', 'pekerja'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateRawatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRawatRequest $request)
    {
        $data = $request->all();
        $data['id_rawat'] = Rawat::generateId();
        Rawat::create($data);
        return redirect()->route('admin.rawat.index')->with('success', 'Rawat created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rawat  $rawat
     * @return \Illuminate\Http\Response
     */
    public function show(Rawat $rawat)
    {
        return view('admin.rawat.show', compact('rawat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rawat  $rawat
     * @return \Illuminate\Http\Response
     */
    public function edit(Rawat $rawat)
    {
        $jenazah = Jenazah::all()->map(function ($item, $key) {
            return ['label' => $item->nama, 'value' => $item->id_daftar];
        });

        $lokasi = Lokasi::all()->map(function ($item, $key) {
            return ['label' => $item->blok->nama_blok, 'value' => $item->id_lokasi];
        });

        $pekerja = Pekerja::all()->map(function ($item, $key) {
            return ['label' => $item->nama, 'value' => $item->id_pekerja];
        });
        return view('admin.rawat.edit', compact('rawat', 'lokasi', 'jenazah', 'pekerja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRawatRequest  $request
     * @param  \App\Models\Rawat  $rawat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRawatRequest $request, Rawat $rawat)
    {
        $rawat->update($request->all());
        return redirect()->route('admin.rawat.index')->with('success', 'Rawat updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rawat  $rawat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rawat $rawat)
    {
        $rawat->delete();
        return redirect()->route('admin.rawat.index')->with('success', 'Rawat deleted successfully.');
    }
}
