@extends('layouts.admin')

@section('title', 'Edit Gaji')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Gaji</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('admin.gaji.index') }}">Gaji</a></div>
                    <div class="breadcrumb-item">Edit Gaji</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <form class="card mb-4" method="POST" action="{{ route('admin.gaji.update', $gaji->id_gaji) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>Edit Gaji</h4>
                            </div>

                            <div class="card-body">
                                <x-select name="id_pekerja" label="ID Pekerja" placeholder="Pilih ID Pekerja"
                                    :data="$pekerja" :value="$gaji->id_pekerja" />

                                <x-text-input type="date" name="bulan_gaji" label="Bulan Gaji"
                                    placeholder="Masukan bulan gaji" :value="$gaji->bulan_gaji" />

                                <x-text-input type="date" name="tanggal_gaji" label="Tanggal Gaji"
                                    placeholder="Masukan tanggal gaji" :value="$gaji->tanggal_gaji" />
                            </div>

                            <div class="card-footer pt-0 d-flex justify-content-end">
                                <a href="{{ route('admin.gaji.index') }}">
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
