<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBlokRequest;
use App\Http\Requests\UpdateBlokRequest;
use App\Models\Blok;

use Illuminate\Http\Request;

class BlokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blok = Blok::all();
        return view('admin.blok.index', compact('blok'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Blok::generateId();
        
        return view('admin.blok.create', compact('id', ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateBlokRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBlokRequest $request)
    {
        $data = $request->all();
        $data['id_blok'] = Blok::generateId();
        Blok::create($data);
        return redirect()->route('admin.blok.index')->with('success', 'Blok created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blok  $blok
     * @return \Illuminate\Http\Response
     */
    public function show(Blok $blok)
    {
        return view('admin.blok.show', compact('blok'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blok  $blok
     * @return \Illuminate\Http\Response
     */
    public function edit(Blok $blok)
    {
        
        return view('admin.blok.edit', compact('blok', ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlokRequest  $request
     * @param  \App\Models\Blok  $blok
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlokRequest $request, Blok $blok)
    {
        $blok->update($request->all());
        return redirect()->route('admin.blok.index')->with('success', 'Blok updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blok  $blok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blok $blok)
    {
        $blok->delete();
        return redirect()->route('admin.blok.index')->with('success', 'Blok deleted successfully.');
    }
}
