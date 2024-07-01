<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProsesMakamRequest;
use App\Http\Requests\UpdateProsesMakamRequest;
use App\Models\ProsesMakam;
use App\Models\Jenazah;
use App\Models\Lokasi;
use App\Models\Biaya;
use App\Models\Pekerja;
use Illuminate\Http\Request;

class ProsesMakamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proses_makam = ProsesMakam::all();
        return view('admin.proses_makam.index', compact('proses_makam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = ProsesMakam::generateId();
        $jenazah = Jenazah::all()->map(function ($item, $key) {
            return ['label' => $item->nama, 'value' => $item->id_jenazah];
        });

        $lokasi = Lokasi::all()->map(function ($item, $key) {
            return ['label' => $item->blok->nama_blok, 'value' => $item->id_lokasi];
        });

        $biaya = Biaya::all()->map(function ($item, $key) {
            return ['label' => $item->nama_pekerjaan, 'value' => $item->id_biaya];
        });

        $pekerja = Pekerja::all()->map(function ($item, $key) {
            return ['label' => $item->nama, 'value' => $item->id_pekerja];
        });
        return view('admin.proses_makam.create', compact('id', 'jenazah', 'lokasi', 'biaya', 'pekerja'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateProsesMakamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProsesMakamRequest $request)
    {
        $data = $request->all();
        $data['id_pemakaman'] = ProsesMakam::generateId();
        ProsesMakam::create($data);
        return redirect()->route('admin.proses_makam.index')->with('success', 'ProsesMakam created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProsesMakam  $proses_makam
     * @return \Illuminate\Http\Response
     */
    public function show(ProsesMakam $proses_makam)
    {
        return view('admin.proses_makam.show', compact('proses_makam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProsesMakam  $proses_makam
     * @return \Illuminate\Http\Response
     */
    public function edit(ProsesMakam $proses_makam)
    {
        $jenazah = Jenazah::all()->map(function ($item, $key) {
            return ['label' => $item->nama, 'value' => $item->id_jenazah];
        });

        $lokasi = Lokasi::all()->map(function ($item, $key) {
            return ['label' => $item->blok->nama_blok, 'value' => $item->id_lokasi];
        });

        $biaya = Biaya::all()->map(function ($item, $key) {
            return ['label' => $item->nama_pekerjaan, 'value' => $item->id_biaya];
        });

        $pekerja = Pekerja::all()->map(function ($item, $key) {
            return ['label' => $item->nama, 'value' => $item->id_pekerja];
        });
        return view('admin.proses_makam.edit', compact('proses_makam', 'jenazah', 'lokasi', 'biaya', 'pekerja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProsesMakamRequest  $request
     * @param  \App\Models\ProsesMakam  $proses_makam
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProsesMakamRequest $request, ProsesMakam $proses_makam)
    {
        $proses_makam->update($request->all());
        return redirect()->route('admin.proses_makam.index')->with('success', 'ProsesMakam updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProsesMakam  $proses_makam
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProsesMakam $proses_makam)
    {
        $proses_makam->delete();
        return redirect()->route('admin.proses_makam.index')->with('success', 'ProsesMakam deleted successfully.');
    }
}
