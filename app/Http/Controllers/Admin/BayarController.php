<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBayarRequest;
use App\Http\Requests\UpdateBayarRequest;
use App\Models\Bayar;
use App\Models\Daftar;
use App\Models\Jenazah;
use App\Models\Lokasi;
use App\Models\Biaya;
use App\Models\HargaMakam;
use Illuminate\Http\Request;

class BayarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bayar = Bayar::all();
        return view('admin.bayar.index', compact('bayar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Bayar::generateId();
        $daftar = Daftar::all()->map(function ($item, $key) {
            return ['label' => $item->nama, 'value' => $item->id_daftar];
        });
        $jenazah = Jenazah::all()->map(function ($item, $key) {
            return ['label' => $item->nama, 'value' => $item->id_daftar];
        });
        $lokasi = Lokasi::all()->map(function ($item, $key) {
            return ['label' => $item->blok->nama_blok, 'value' => $item->id_lokasi];
        });
        $biaya = Biaya::all()->map(function ($item, $key) {
            return ['label' => $item->nama_pekerjaan, 'value' => $item->id_biaya];
        });
        $hargaMakam = HargaMakam::all()->map(function ($item, $key) {
            return ['label' => $item->harga_makam, 'value' => $item->id_harga];
        });
        return view('admin.bayar.create', compact('id', 'daftar', 'jenazah', 'lokasi', 'biaya', 'hargaMakam'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateBayarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBayarRequest $request)
    {
        $data = $request->all();
        $data['id_bayar'] = Bayar::generateId();
        Bayar::create($data);
        return redirect()->route('admin.bayar.index')->with('success', 'Bayar created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bayar  $bayar
     * @return \Illuminate\Http\Response
     */
    public function show(Bayar $bayar)
    {
        return view('admin.bayar.show', compact('bayar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bayar  $bayar
     * @return \Illuminate\Http\Response
     */
    public function edit(Bayar $bayar)
    {

        $daftar = Daftar::all()->map(function ($item, $key) {
            return ['label' => $item->nama, 'value' => $item->id_daftar];
        });

        $jenazah = Jenazah::all()->map(function ($item, $key) {
            return ['label' => $item->nama, 'value' => $item->id_daftar];
        });

        $lokasi = Lokasi::all()->map(function ($item, $key) {
            return ['label' => $item->blok->nama_blok, 'value' => $item->id_lokasi];
        });

        $biaya = Biaya::all()->map(function ($item, $key) {
            return ['label' => $item->nama_pekerjaan, 'value' => $item->id_biaya];
        });

        $hargaMakam = HargaMakam::all()->map(function ($item, $key) {
            return ['label' => $item->harga_makam, 'value' => $item->id_harga];
        });
        return view('admin.bayar.edit', compact('bayar', 'daftar', 'jenazah', 'lokasi', 'biaya', 'hargaMakam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBayarRequest  $request
     * @param  \App\Models\Bayar  $bayar
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBayarRequest $request, Bayar $bayar)
    {
        $bayar->update($request->all());
        return redirect()->route('admin.bayar.index')->with('success', 'Bayar updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bayar  $bayar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bayar $bayar)
    {
        $bayar->delete();
        return redirect()->route('admin.bayar.index')->with('success', 'Bayar deleted successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBayarRequest  $request
     * @param  \App\Models\Bayar  $bayar
     * @return \Illuminate\Http\Response
     */
    public function confirm(Bayar $bayar)
    {
        $bayar->update(['status' => 'terbayar']);

        return redirect()->route('admin.bayar.index')->with('success', 'Bayar updated successfully.');
    }
}
