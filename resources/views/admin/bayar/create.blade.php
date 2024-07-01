@extends('layouts.admin')

@section('title', 'Tambah Bayar')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Bayar</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('admin.bayar.index') }}">Bayar</a></div>
                    <div class="breadcrumb-item">Tambah Bayar</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <form class="card mb-4" method="POST" action="{{ route('admin.bayar.store') }}">
                            @csrf
                            <div class="card-header">
                                <h4>Tambah Bayar</h4>
                            </div>

                            <div class="card-body">
                                <x-select name="id_daftar" label="ID Daftar" placeholder="Pilih ID Daftar"
                                    :data="$daftar" />
                                <x-select name="id_jenazah" label="ID Jenazah" placeholder="Pilih ID Jenazah"
                                    :data="$jenazah" />
                                <x-select name="id_lokasi" label="ID Lokasi" placeholder="Pilih ID Lokasi"
                                    :data="$lokasi" />
                                <x-select name="id_biaya" label="ID Biaya" placeholder="Pilih ID Biaya" :data="$biaya" />
                                <x-select name="id_harga" label="ID Harga" placeholder="Pilih ID Harga" :data="$harga" />
                                <x-text-input type="date" name="tanggal_bayar" label="Tanggal Bayar"
                                    placeholder="Masukan Tanggal Bayar" />
                                <x-select name="jenis_bayar" label="Jenis Bayar" placeholder="Pilih Jenis Bayar"
                                    :data="[
                                        ['label' => 'Cash', 'value' => 'cash'],
                                        ['label' => 'Transfer', 'value' => 'transfer'],
                                    ]" />
                                <x-text-input type="number" name="jumlah" label="Jumlah" placeholder="Masukan Jumlah" />
                                <x-select name="status" label="Status" placeholder="Pilih Status" :data="[
                                    ['label' => 'Terbayar', 'value' => 'terbayar'],
                                    ['label' => 'Belum', 'value' => 'belum'],
                                ]" />
                            </div>

                            <div class="card-footer pt-0 d-flex justify-content-end">
                                <a href="{{ route('admin.bayar.index') }}">
                                    <button type="button" class="btn btn-secondary px-3 mr-2">Kembali</button>
                                </a>
                                <button type="submit" class="btn btn-primary px-3">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
