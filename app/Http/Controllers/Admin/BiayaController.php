<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBiayaRequest;
use App\Http\Requests\UpdateBiayaRequest;
use App\Models\Biaya;

use Illuminate\Http\Request;

class BiayaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biaya = Biaya::all();
        return view('admin.biaya.index', compact('biaya'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Biaya::generateId();

        return view('admin.biaya.create', compact('id',));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateBiayaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBiayaRequest $request)
    {
        $data = $request->all();
        $data['id_biaya'] = Biaya::generateId();
        Biaya::create($data);
        return redirect()->route('admin.biaya.index')->with('success', 'Biaya created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Biaya  $biaya
     * @return \Illuminate\Http\Response
     */
    public function show(Biaya $biaya)
    {
        return view('admin.biaya.show', compact('biaya'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Biaya  $biaya
     * @return \Illuminate\Http\Response
     */
    public function edit(Biaya $biaya)
    {

        return view('admin.biaya.edit', compact('biaya',));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBiayaRequest  $request
     * @param  \App\Models\Biaya  $biaya
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBiayaRequest $request, Biaya $biaya)
    {
        $biaya->update($request->all());
        return redirect()->route('admin.biaya.index')->with('success', 'Biaya updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Biaya  $biaya
     * @return \Illuminate\Http\Response
     */
    public function destroy(Biaya $biaya)
    {
        $biaya->delete();
        return redirect()->route('admin.biaya.index')->with('success', 'Biaya deleted successfully.');
    }
}
