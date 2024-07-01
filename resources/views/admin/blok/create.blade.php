@extends('layouts.admin')

@section('title', 'Tambah Blok')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Blok</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('admin.blok.index') }}">Blok</a></div>
                    <div class="breadcrumb-item">Tambah Blok</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <form class="card mb-4" method="POST" action="{{ route('admin.blok.store') }}">
                            @csrf
                            <div class="card-header">
                                <h4>Tambah Blok</h4>
                            </div>

                            <div class="card-body">
                                <x-text-input name="nama_blok" label="Nama Blok" placeholder="Masukan Nama Blok" />
                            </div>

                            <div class="card-footer pt-0 d-flex justify-content-end">
                                <a href="{{ route('admin.blok.index') }}">
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
