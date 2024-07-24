<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;
use App\Models\Transaksi;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Transaksi::all();

        $summary = Transaksi::selectRaw('tanggal, 
                                     SUM(CASE WHEN jenis = "pemasukan" THEN jumlah ELSE 0 END) as total_pemasukan, 
                                     SUM(CASE WHEN jenis = "pengeluaran" THEN jumlah ELSE 0 END) as total_pengeluaran')
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

        return view('admin.transaksi.index', compact('items', 'summary'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Transaksi::generateId();

        return view('admin.transaksi.create', compact('id',));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateTransaksiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTransaksiRequest $request)
    {
        $data = $request->all();
        $data['id_transaksi'] = Transaksi::generateId();
        Transaksi::create($data);
        return redirect()->route('admin.transaksi.index')->with('success', 'Transaksi created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        return view('admin.transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {

        return view('admin.transaksi.edit', compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransaksiRequest  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransaksiRequest $request, Transaksi $transaksi)
    {
        $transaksi->update($request->all());
        return redirect()->route('admin.transaksi.index')->with('success', 'Transaksi updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('admin.transaksi.index')->with('success', 'Transaksi deleted successfully.');
    }
}
