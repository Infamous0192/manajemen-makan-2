<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateJenazahRequest;
use App\Http\Requests\UpdateJenazahRequest;
use App\Models\Jenazah;

use Illuminate\Http\Request;

class JenazahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenazah = Jenazah::all();
        return view('admin.jenazah.index', compact('jenazah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Jenazah::generateId();
        
        return view('admin.jenazah.create', compact('id', ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateJenazahRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateJenazahRequest $request)
    {
        $data = $request->all();
        $data['id_jenazah'] = Jenazah::generateId();
        Jenazah::create($data);
        return redirect()->route('admin.jenazah.index')->with('success', 'Jenazah created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jenazah  $jenazah
     * @return \Illuminate\Http\Response
     */
    public function show(Jenazah $jenazah)
    {
        return view('admin.jenazah.show', compact('jenazah'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jenazah  $jenazah
     * @return \Illuminate\Http\Response
     */
    public function edit(Jenazah $jenazah)
    {
        
        return view('admin.jenazah.edit', compact('jenazah', ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJenazahRequest  $request
     * @param  \App\Models\Jenazah  $jenazah
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJenazahRequest $request, Jenazah $jenazah)
    {
        $jenazah->update($request->all());
        return redirect()->route('admin.jenazah.index')->with('success', 'Jenazah updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jenazah  $jenazah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jenazah $jenazah)
    {
        $jenazah->delete();
        return redirect()->route('admin.jenazah.index')->with('success', 'Jenazah deleted successfully.');
    }
}
