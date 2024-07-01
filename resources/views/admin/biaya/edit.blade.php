@extends('layouts.admin')

@section('title', 'Edit Biaya')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Biaya</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('admin.biaya.index') }}">Biaya</a></div>
                    <div class="breadcrumb-item">Edit Biaya</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <form class="card mb-4" method="POST" action="{{ route('admin.biaya.update', $biaya->id_biaya) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>Edit Biaya</h4>
                            </div>

                            <div class="card-body">
                                <x-text-input name="nama_pekerjaan" label="Nama Pekerjaan"
                                    placeholder="Masukan Nama Pekerjaan" :value="$biaya->nama_pekerjaan" />
                                <x-text-input name="nama_paket" label="Nama Paket" placeholder="Masukan Nama Paket"
                                    :value="$biaya->nama_paket" />
                                <x-text-input type="number" name="jumlah_pekerja" label="Jumlah Pekerja"
                                    placeholder="Masukan Jumlah Pekerja" :value="$biaya->jumlah_pekerja" />
                                <x-text-input name="fasilitas" label="Fasilitas" placeholder="Masukan Fasilitas"
                                    :value="$biaya->fasilitas" />
                                <x-text-input type="number" name="harga" label="Harga" placeholder="Masukan Harga"
                                    :value="$biaya->harga" />
                            </div>

                            <div class="card-footer pt-0 d-flex justify-content-end">
                                <a href="{{ route('admin.biaya.index') }}">
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
