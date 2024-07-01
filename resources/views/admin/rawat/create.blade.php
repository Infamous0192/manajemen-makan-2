@extends('layouts.admin')

@section('title', 'Tambah Rawat')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Rawat</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('admin.rawat.index') }}">Rawat</a></div>
                    <div class="breadcrumb-item">Tambah Rawat</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <form class="card mb-4" method="POST" action="{{ route('admin.rawat.store') }}">
                            @csrf
                            <div class="card-header">
                                <h4>Tambah Rawat</h4>
                            </div>

                            <div class="card-body">
                                <x-select name="id_lokasi" label="ID Lokasi" placeholder="Pilih ID Lokasi"
                                    :data="$lokasi" />
                                <x-select name="id_jenazah" label="ID Jenazah" placeholder="Pilih ID Jenazah"
                                    :data="$jenazah" />
                                <x-select name="id_pekerja" label="ID Pekerja" placeholder="Pilih ID Pekerja"
                                    :data="$pekerja" />
                                <x-text-input type="number" name="jumlah_pekerja" label="Jumlah Pekerja"
                                    placeholder="Masukan Jumlah Pekerja" />
                                <x-text-input type="number" name="jumlah_perawatan" label="Jumlah Perawatan"
                                    placeholder="Masukan Jumlah Perawatan" />
                                <x-text-input type="date" name="tanggal_rawat" label="Tanggal Rawat"
                                    placeholder="Masukan Tanggal Rawat" />
                            </div>

                            <div class="card-footer pt-0 d-flex justify-content-end">
                                <a href="{{ route('admin.rawat.index') }}">
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
