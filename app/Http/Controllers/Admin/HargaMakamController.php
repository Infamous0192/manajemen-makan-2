<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateHargaMakamRequest;
use App\Http\Requests\UpdateHargaMakamRequest;
use App\Models\HargaMakam;
use App\Models\Blok;
use Illuminate\Http\Request;

class HargaMakamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $harga_makam = HargaMakam::all();
        return view('admin.harga_makam.index', compact('harga_makam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = HargaMakam::generateId();
        $blok = Blok::all()->map(function ($item, $key) {
            return ['label' => $item->nama_blok, 'value' => $item->id_blok];
        });
        return view('admin.harga_makam.create', compact('id', 'blok'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateHargaMakamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateHargaMakamRequest $request)
    {
        $data = $request->all();
        $data['id_harga'] = HargaMakam::generateId();
        HargaMakam::create($data);
        return redirect()->route('admin.harga_makam.index')->with('success', 'HargaMakam created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HargaMakam  $harga_makam
     * @return \Illuminate\Http\Response
     */
    public function show(HargaMakam $harga_makam)
    {
        return view('admin.harga_makam.show', compact('harga_makam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HargaMakam  $harga_makam
     * @return \Illuminate\Http\Response
     */
    public function edit(HargaMakam $harga_makam)
    {
        $blok = Blok::all()->map(function ($item, $key) {
            return ['label' => $item->nama_blok, 'value' => $item->id_blok];
        });
        return view('admin.harga_makam.edit', compact('harga_makam', 'blok'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHargaMakamRequest  $request
     * @param  \App\Models\HargaMakam  $harga_makam
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHargaMakamRequest $request, HargaMakam $harga_makam)
    {
        $harga_makam->update($request->all());
        return redirect()->route('admin.harga_makam.index')->with('success', 'HargaMakam updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HargaMakam  $harga_makam
     * @return \Illuminate\Http\Response
     */
    public function destroy(HargaMakam $harga_makam)
    {
        $harga_makam->delete();
        return redirect()->route('admin.harga_makam.index')->with('success', 'HargaMakam deleted successfully.');
    }
}
