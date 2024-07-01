@extends('layouts.admin')

@section('title', 'Tambah Biaya')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Biaya</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('admin.biaya.index') }}">Biaya</a></div>
                    <div class="breadcrumb-item">Tambah Biaya</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <form class="card mb-4" method="POST" action="{{ route('admin.biaya.store') }}">
                            @csrf
                            <div class="card-header">
                                <h4>Tambah Biaya</h4>
                            </div>

                            <div class="card-body">
                                <x-text-input name="nama_pekerjaan" label="Nama Pekerjaan"
                                    placeholder="Masukan Nama Pekerjaan" />
                                <x-text-input name="nama_paket" label="Nama Paket" placeholder="Masukan Nama Paket" />
                                <x-text-input type="number" name="jumlah_pekerja" label="Jumlah Pekerja"
                                    placeholder="Masukan Jumlah Pekerja" />
                                <x-text-input name="fasilitas" label="Fasilitas" placeholder="Masukan Fasilitas" />
                                <x-text-input type="number" name="harga" label="Harga" placeholder="Masukan Harga" />
                            </div>

                            <div class="card-footer pt-0 d-flex justify-content-end">
                                <a href="{{ route('admin.biaya.index') }}">
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
