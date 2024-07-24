@extends('layouts.admin')

@section('title', 'Edit Transaksi')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Transaksi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('admin.transaksi.index') }}">Transaksi</a></div>
                    <div class="breadcrumb-item">Edit Transaksi</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <form class="card mb-4" method="POST"
                            action="{{ route('admin.transaksi.update', $transaksi->id_transaksi) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>Edit Transaksi</h4>
                            </div>

                            <div class="card-body">
                                <x-text-input name="judul" type="text" label="Judul" placeholder="Masukan judul"
                                    :value="$transaksi->judul" />
                                <x-text-area name="keterangan" label="Keterangan" placeholder="Masukan keterangan"
                                    :value="$transaksi->keterangan" />
                                <x-select name="jenis" label="Jenis" disabled placeholder="Pilih Jenis" :data="[
                                    ['value' => 'pengeluaran', 'label' => 'Pengeluaran'],
                                    ['value' => 'pemasukan', 'label' => 'Pemasukan'],
                                ]"
                                    :value="$transaksi->jenis"  />
                                <x-text-input name="jumlah" type="number" label="Jumlah" placeholder="Masukan jumlah"
                                    :value="$transaksi->jumlah" />
                                <x-text-input type="date" name="tanggal" label="Tanggal" placeholder="Masukan tanggal"
                                    :value="$transaksi->tanggal" />
                            </div>

                            <div class="card-footer pt-0 d-flex justify-content-end">
                                <a href="{{ route('admin.transaksi.index') }}">
                                    <button type="button" class="btn btn-secondary px-3 mr-2">Kembali</button>
                                </a>
                                <button type="submit" class="btn btn-primary px-3">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
