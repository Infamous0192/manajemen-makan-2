@extends('layouts.admin')

@section('title', 'Tambah Lokasi')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Lokasi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('admin.lokasi.index') }}">Lokasi</a></div>
                    <div class="breadcrumb-item">Tambah Lokasi</div>
                </div>
            </div>

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>×</span>
                        </button>
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <form class="card mb-4" method="POST" action="{{ route('admin.lokasi.store') }}">
                            @csrf
                            <div class="card-header">
                                <h4>Tambah Lokasi</h4>
                            </div>

                            <div class="card-body">
                                <x-select name="id_blok" label="ID Blok" placeholder="Pilih ID Blok" :data="$blok" />
                            </div>

                            <div class="card-footer pt-0 d-flex justify-content-end">
                                <a href="{{ route('admin.lokasi.index') }}">
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
