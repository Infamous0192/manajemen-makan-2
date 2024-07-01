<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePekerjaRequest;
use App\Http\Requests\UpdatePekerjaRequest;
use App\Models\Pekerja;

use Illuminate\Http\Request;

class PekerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Pekerja::all();

        return view('admin.pekerja.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Pekerja::generateId();

        return view('admin.pekerja.create', compact('id',));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreatePekerjaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePekerjaRequest $request)
    {
        $data = $request->all();
        $data['id_pekerja'] = Pekerja::generateId();
        Pekerja::create($data);
        return redirect()->route('admin.pekerja.index')->with('success', 'Pekerja created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pekerja  $pekerja
     * @return \Illuminate\Http\Response
     */
    public function show(Pekerja $pekerja)
    {
        return view('admin.pekerja.show', compact('pekerja'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pekerja  $pekerja
     * @return \Illuminate\Http\Response
     */
    public function edit(Pekerja $pekerja)
    {

        return view('admin.pekerja.edit', compact('pekerja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePekerjaRequest  $request
     * @param  \App\Models\Pekerja  $pekerja
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePekerjaRequest $request, Pekerja $pekerja)
    {
        $pekerja->update($request->all());
        return redirect()->route('admin.pekerja.index')->with('success', 'Pekerja updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pekerja  $pekerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pekerja $pekerja)
    {
        $pekerja->delete();
        return redirect()->route('admin.pekerja.index')->with('success', 'Pekerja deleted successfully.');
    }
}
