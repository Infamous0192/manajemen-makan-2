<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateGajiRequest;
use App\Http\Requests\UpdateGajiRequest;
use App\Models\Gaji;
use App\Models\Pekerja;
use Illuminate\Http\Request;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gaji = Gaji::all();
        return view('admin.gaji.index', compact('gaji'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Gaji::generateId();
        $pekerja = Pekerja::all()->map(function ($item, $key) {
            return ['label' => $item->nama, 'value' => $item->id_pekerja];
        });
        return view('admin.gaji.create', compact('id', 'pekerja'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateGajiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGajiRequest $request)
    {
        $data = $request->all();
        $data['id_gaji'] = Gaji::generateId();
        Gaji::create($data);
        return redirect()->route('admin.gaji.index')->with('success', 'Gaji created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function show(Gaji $gaji)
    {
        return view('admin.gaji.show', compact('gaji'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function edit(Gaji $gaji)
    {
        $pekerja = Pekerja::all()->map(function ($item, $key) {
            return ['label' => $item->nama, 'value' => $item->id_pekerja];
        });
        return view('admin.gaji.edit', compact('gaji', 'pekerja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGajiRequest  $request
     * @param  \App\Models\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGajiRequest $request, Gaji $gaji)
    {
        $gaji->update($request->all());
        return redirect()->route('admin.gaji.index')->with('success', 'Gaji updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gaji $gaji)
    {
        $gaji->delete();
        return redirect()->route('admin.gaji.index')->with('success', 'Gaji deleted successfully.');
    }
}
