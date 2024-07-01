@extends('layouts.admin')

@section('title', 'Edit Pekerja')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Pekerja</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('admin.pekerja.index') }}">Pekerja</a></div>
                    <div class="breadcrumb-item">Edit Pekerja</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <form class="card mb-4" method="POST"
                            action="{{ route('admin.pekerja.update', $pekerja->id_pekerja) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>Edit Pekerja</h4>
                            </div>

                            <div class="card-body">
                                <x-text-input name="nama" label="Nama" placeholder="Masukan nama" :value="$pekerja->nama" />

                                <x-text-input name="tempat_lahir" label="Tempat Lahir" placeholder="Masukan tempat lahir"
                                    :value="$pekerja->tempat_lahir" />

                                <x-text-input type="date" name="tanggal_lahir" label="Tanggal Lahir"
                                    placeholder="Masukan tanggal lahir" :value="$pekerja->tanggal_lahir" />

                                <x-select name="jenis_kelamin" label="Jenis Kelamin" placeholder="Pilih jenis kelamin"
                                    :data="[
                                        ['label' => 'Laki-laki', 'value' => 'L'],
                                        ['label' => 'Perempuan', 'value' => 'P'],
                                    ]" :value="$pekerja->jenis_kelamin" />

                                <x-text-area name="alamat" label="Alamat" placeholder="Masukan alamat" :value="$pekerja->alamat" />

                                <x-text-input name="no_hp" label="No HP" placeholder="Masukan no hp" :value="$pekerja->no_hp" />
                            </div>

                            <div class="card-footer pt-0 d-flex justify-content-end">
                                <a href="{{ route('admin.pekerja.index') }}">
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
