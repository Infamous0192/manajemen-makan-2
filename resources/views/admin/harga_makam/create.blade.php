@extends('layouts.admin')

@section('title', 'Tambah Harga Makam')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Harga Makam</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('admin.harga_makam.index') }}">Harga Makam</a></div>
                    <div class="breadcrumb-item">Tambah Harga Makam</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <form class="card mb-4" method="POST" action="{{ route('admin.harga_makam.store') }}">
                            @csrf
                            <div class="card-header">
                                <h4>Tambah Harga Makam</h4>
                            </div>

                            <div class="card-body">
                                <x-select name="id_blok" label="ID Blok" placeholder="Pilih ID Blok" :data="$blok" />
                                <x-text-input name="harga_makam" label="Harga Makam" placeholder="Masukan Harga Makam" />
                            </div>

                            <div class="card-footer pt-0 d-flex justify-content-end">
                                <a href="{{ route('admin.harga_makam.index') }}">
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
