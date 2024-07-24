@extends('layouts.admin')

@section('title', 'Tambah Transaksi')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Transaksi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('admin.transaksi.index') }}">Transaksi</a></div>
                    <div class="breadcrumb-item">Tambah Transaksi</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <form class="card mb-4" method="POST" action="{{ route('admin.transaksi.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h4>Tambah Transaksi</h4>
                            </div>

                            <div class="card-body">
                                <x-text-input name="judul" type="text" label="Judul" placeholder="Masukan judul" />
                                <x-text-area name="keterangan" label="Keterangan" placeholder="Masukan keterangan" />
                                <x-select name="jenis" label="Jenis" placeholder="Pilih Jenis" :data="[
                                    ['value' => 'pengeluaran', 'label' => 'Pengeluaran'],
                                    ['value' => 'pemasukan', 'label' => 'Pemasukan'],
                                ]" />
                                <x-text-input name="jumlah" type="number" label="Jumlah" placeholder="Masukan jumlah" />
                                <x-text-input type="date" name="tanggal" label="Tanggal" placeholder="Masukan tanggal" />
                            </div>

                            <div class="card-footer pt-0 d-flex justify-content-end">
                                <a href="{{ route('admin.transaksi.index') }}">
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
