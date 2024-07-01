@extends('layouts.admin')

@section('title', 'Edit Daftar')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Daftar</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('admin.daftar.index') }}">Daftar</a></div>
                    <div class="breadcrumb-item">Edit Daftar</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <form class="card mb-4" method="POST"
                            action="{{ route('admin.daftar.update', $daftar->id_daftar) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>Edit Daftar</h4>
                            </div>

                            <div class="card-body">
                                <x-text-input name="nama" label="Nama" placeholder="Masukan nama" :value="$daftar->nama" />
                                <x-text-input name="no_hp" label="No HP" placeholder="Masukan No HP" :value="$daftar->no_hp" />
                                <x-text-input type="date" name="tanggal_meninggal" label="Tanggal Meninggal"
                                    placeholder="Masukan Tanggal Meninggal" :value="$daftar->tanggal_meninggal" />
                                <x-select name="id_jenazah" label="ID Jenazah" placeholder="Pilih ID Jenazah"
                                    :data="$jenazah" :value="$daftar->id_jenazah" />
                            </div>

                            <div class="card-footer pt-0 d-flex justify-content-end">
                                <a href="{{ route('admin.daftar.index') }}">
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
