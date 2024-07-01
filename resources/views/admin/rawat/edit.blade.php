@extends('layouts.admin')

@section('title', 'Edit Rawat')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Rawat</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('admin.rawat.index') }}">Rawat</a></div>
                    <div class="breadcrumb-item">Edit Rawat</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <form class="card mb-4" method="POST" action="{{ route('admin.rawat.update', $rawat->id_rawat) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>Edit Rawat</h4>
                            </div>

                            <div class="card-body">
                                <x-select name="id_lokasi" label="ID Lokasi" placeholder="Pilih ID Lokasi" :data="$lokasi"
                                    :value="$rawat->id_lokasi" />
                                <x-select name="id_jenazah" label="ID Jenazah" placeholder="Pilih ID Jenazah"
                                    :data="$jenazah" :value="$rawat->id_jenazah" />
                                <x-select name="id_pekerja" label="ID Pekerja" placeholder="Pilih ID Pekerja"
                                    :data="$pekerja" :value="$rawat->id_pekerja" />
                                <x-text-input type="number" name="jumlah_pekerja" label="Jumlah Pekerja"
                                    placeholder="Masukan Jumlah Pekerja" :value="$rawat->jumlah_pekerja" />
                                <x-text-input type="number" name="jumlah_perawatan" label="Jumlah Perawatan"
                                    placeholder="Masukan Jumlah Perawatan" :value="$rawat->jumlah_perawatan" />
                                <x-text-input type="date" name="tanggal_rawat" label="Tanggal Rawat"
                                    placeholder="Masukan Tanggal Rawat" :value="$rawat->tanggal_rawat" />
                            </div>

                            <div class="card-footer pt-0 d-flex justify-content-end">
                                <a href="{{ route('admin.rawat.index') }}">
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
