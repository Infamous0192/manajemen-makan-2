@extends('layouts.admin')

@section('title', 'Edit Bayar')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Bayar</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('admin.bayar.index') }}">Bayar</a></div>
                    <div class="breadcrumb-item">Edit Bayar</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <form class="card mb-4" method="POST" action="{{ route('admin.bayar.update', $bayar->id_bayar) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>Edit Bayar</h4>
                            </div>

                            <div class="card-body">
                                <x-select name="id_daftar" label="ID Daftar" placeholder="Pilih ID Daftar" :data="$daftar"
                                    :value="$bayar->id_daftar" />
                                <x-select name="id_jenazah" label="ID Jenazah" placeholder="Pilih ID Jenazah"
                                    :data="$jenazah" :value="$bayar->id_jenazah" />
                                <x-select name="id_lokasi" label="ID Lokasi" placeholder="Pilih ID Lokasi" :data="$lokasi"
                                    :value="$bayar->id_lokasi" />
                                <x-select name="id_biaya" label="ID Biaya" placeholder="Pilih ID Biaya" :data="$biaya"
                                    :value="$bayar->id_biaya" />
                                <x-select name="id_harga" label="ID Harga" placeholder="Pilih ID Harga" :data="$harga"
                                    :value="$bayar->id_harga" />
                                <x-text-input type="date" name="tanggal_bayar" label="Tanggal Bayar"
                                    placeholder="Masukan Tanggal Bayar" :value="$bayar->tanggal_bayar" />
                                <x-select name="jenis_bayar" label="Jenis Bayar" placeholder="Pilih Jenis Bayar"
                                    :data="[
                                        ['label' => 'Cash', 'value' => 'cash'],
                                        ['label' => 'Transfer', 'value' => 'transfer'],
                                    ]" :value="$bayar->jenis_bayar" />
                                <x-text-input type="number" name="jumlah" label="Jumlah" placeholder="Masukan Jumlah"
                                    :value="$bayar->jumlah" />
                                <x-select name="status" label="Status" placeholder="Pilih Status" :data="[
                                    ['label' => 'Terbayar', 'value' => 'terbayar'],
                                    ['label' => 'Belum', 'value' => 'belum'],
                                ]"
                                    :value="$bayar->status" />
                            </div>

                            <div class="card-footer pt-0 d-flex justify-content-end">
                                <a href="{{ route('admin.bayar.index') }}">
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
