@extends('layouts.admin')

@section('title', 'Tambah Gaji')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Gaji</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('admin.gaji.index') }}">Gaji</a></div>
                    <div class="breadcrumb-item">Tambah Gaji</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <form class="card mb-4" method="POST" action="{{ route('admin.gaji.store') }}">
                            @csrf
                            <div class="card-header">
                                <h4>Tambah Gaji</h4>
                            </div>

                            <div class="card-body">
                                <x-select name="id_pekerja" label="ID Pekerja" placeholder="Pilih ID Pekerja"
                                    :data="$pekerja" />

                                <x-text-input type="date" name="bulan_gaji" label="Bulan Gaji"
                                    placeholder="Masukan bulan gaji" />

                                <x-text-input type="date" name="tanggal_gaji" label="Tanggal Gaji"
                                    placeholder="Masukan tanggal gaji" />
                            </div>

                            <div class="card-footer pt-0 d-flex justify-content-end">
                                <a href="{{ route('admin.gaji.index') }}">
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
