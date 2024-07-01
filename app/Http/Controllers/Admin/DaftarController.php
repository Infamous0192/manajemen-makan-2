<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateDaftarRequest;
use App\Http\Requests\UpdateDaftarRequest;
use App\Models\Daftar;
use App\Models\Jenazah;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftar = Daftar::all();
        return view('admin.daftar.index', compact('daftar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Daftar::generateId();
        $jenazah = Jenazah::all()->map(function ($item, $key) {
            return ['label' => $item->nama, 'value' => $item->id_daftar];
        });
        return view('admin.daftar.create', compact('id', 'jenazah'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateDaftarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDaftarRequest $request)
    {
        $data = $request->all();
        $data['id_daftar'] = Daftar::generateId();
        Daftar::create($data);
        return redirect()->route('admin.daftar.index')->with('success', 'Daftar created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function show(Daftar $daftar)
    {
        return view('admin.daftar.show', compact('daftar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function edit(Daftar $daftar)
    {
        $jenazah = Jenazah::all()->map(function ($item, $key) {
            return ['label' => $item->nama, 'value' => $item->id_daftar];
        });
        return view('admin.daftar.edit', compact('daftar', 'jenazah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDaftarRequest  $request
     * @param  \App\Models\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDaftarRequest $request, Daftar $daftar)
    {
        $daftar->update($request->all());
        return redirect()->route('admin.daftar.index')->with('success', 'Daftar updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Daftar $daftar)
    {
        $daftar->delete();
        return redirect()->route('admin.daftar.index')->with('success', 'Daftar deleted successfully.');
    }
}
