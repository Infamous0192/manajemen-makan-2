<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRawatBulananRequest;
use App\Models\RawatBulanan;
use App\Models\Blok;
use Illuminate\Http\Request;

class RawatBulananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rawatBulanan = RawatBulanan::all();
        return view('admin.rawatBulanan.index', compact('rawatBulanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = RawatBulanan::generateId();
        $blok = Blok::all()->map(function ($item, $key) {
            return ['label' => $item->nama_blok, 'value' => $item->id_blok];
        });
        return view('admin.rawatBulanan.create', compact('id', 'blok'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateRawatBulananRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRawatBulananRequest $request)
    {
        $data = $request->all();
        $data['id_rawatBulanan'] = RawatBulanan::generateId();
        RawatBulanan::create($data);
        return redirect()->route('admin.rawatBulanan.index')->with('success', 'RawatBulanan created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RawatBulanan  $rawatBulanan
     * @return \Illuminate\Http\Response
     */
    public function show(RawatBulanan $rawatBulanan)
    {
        return view('admin.rawatBulanan.show', compact('rawatBulanan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RawatBulanan  $rawatBulanan
     * @return \Illuminate\Http\Response
     */
    public function edit(RawatBulanan $rawatBulanan)
    {
        $blok = Blok::all()->map(function ($item, $key) {
            return ['label' => $item->nama_blok, 'value' => $item->id_blok];
        });
        return view('admin.rawatBulanan.edit', compact('rawatBulanan', 'blok'));
    }

    public function update(Request $request, RawatBulanan $rawatBulanan)
    {
        $rawatBulanan->update($request->all());
        return redirect()->route('admin.rawatBulanan.index')->with('success', 'RawatBulanan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RawatBulanan  $rawatBulanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(RawatBulanan $rawatBulanan)
    {
        $rawatBulanan->delete();
        return redirect()->route('admin.rawatBulanan.index')->with('success', 'RawatBulanan deleted successfully.');
    }

    public function confirm(RawatBulanan $rawatBulanan)
    {
        $rawatBulanan->update(['status' => 'terbayar']);

        return redirect()->route('admin.rawatBulanan.index')->with('success', 'RawatBulanan updated successfully.');
    }
}
