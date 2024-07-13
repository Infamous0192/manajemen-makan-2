@extends('layouts.admin')

@section('title', 'Tambah Pengeluaran')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Pengeluaran</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('admin.pengeluaran.index') }}">Pengeluaran</a></div>
                    <div class="breadcrumb-item">Tambah Pengeluaran</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <form class="card mb-4" method="POST" action="{{ route('admin.pengeluaran.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h4>Tambah Pengeluaran</h4>
                            </div>

                            <div class="card-body">
                                <x-text-input name="biaya" type="number" label="Biaya" placeholder="Masukan biaya" />

                                <x-text-input type="date" name="tanggal" label="Tanggal"
                                    placeholder="Masukan tanggal" />
                            </div>

                            <div class="card-footer pt-0 d-flex justify-content-end">
                                <a href="{{ route('admin.pengeluaran.index') }}">
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
