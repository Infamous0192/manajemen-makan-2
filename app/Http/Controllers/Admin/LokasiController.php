<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateLokasiRequest;
use App\Http\Requests\UpdateLokasiRequest;
use App\Models\Lokasi;
use App\Models\Blok;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lokasi = Lokasi::all();
        return view('admin.lokasi.index', compact('lokasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Lokasi::generateId();
        $blok = Blok::all()->map(function ($item, $key) {
            return ['label' => $item->nama_blok, 'value' => $item->id_blok];
        });
        return view('admin.lokasi.create', compact('id', 'blok'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateLokasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLokasiRequest $request)
    {
        $data = $request->all();
        $data['id_lokasi'] = Lokasi::generateId();
        Lokasi::create($data);
        return redirect()->route('admin.lokasi.index')->with('success', 'Lokasi created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function show(Lokasi $lokasi)
    {
        return view('admin.lokasi.show', compact('lokasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Lokasi $lokasi)
    {
        $blok = Blok::all()->map(function ($item, $key) {
            return ['label' => $item->nama_blok, 'value' => $item->id_blok];
        });
        return view('admin.lokasi.edit', compact('lokasi', 'blok'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLokasiRequest  $request
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLokasiRequest $request, Lokasi $lokasi)
    {
        $lokasi->update($request->all());
        return redirect()->route('admin.lokasi.index')->with('success', 'Lokasi updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lokasi $lokasi)
    {
        $lokasi->delete();
        return redirect()->route('admin.lokasi.index')->with('success', 'Lokasi deleted successfully.');
    }
}
