@extends('layouts.admin')

@section('title', 'Edit Jenazah')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Jenazah</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('admin.jenazah.index') }}">Jenazah</a></div>
                    <div class="breadcrumb-item">Edit Jenazah</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <form class="card mb-4" method="POST"
                            action="{{ route('admin.jenazah.update', $jenazah->id_jenazah) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>Edit Jenazah</h4>
                            </div>

                            <div class="card-body">
                                <x-text-input name="nama" label="Nama" placeholder="Masukan nama" :value="$jenazah->nama" />
                                <x-text-input name="nik" label="NIK" placeholder="Masukan NIK" :value="$jenazah->nik" />
                                <x-text-input name="tempat_lahir" label="Tempat Lahir" placeholder="Masukan tempat lahir"
                                    :value="$jenazah->tempat_lahir" />
                                <x-text-input type="date" name="tanggal_lahir" label="Tanggal Lahir"
                                    placeholder="Masukan tanggal lahir" :value="$jenazah->tanggal_lahir" />
                                <x-select name="jenis_kelamin" label="Jenis Kelamin" placeholder="Pilih jenis kelamin"
                                    :data="[
                                        ['label' => 'Laki-laki', 'value' => 'L'],
                                        ['label' => 'Perempuan', 'value' => 'P'],
                                    ]" :value="$jenazah->jenis_kelamin" />
                                <x-select name="status_kawin" label="Status Kawin" placeholder="Pilih status kawin"
                                    :data="[
                                        ['label' => 'Kawin', 'value' => 'Kawin'],
                                        ['label' => 'Belum Kawin', 'value' => 'Belum Kawin'],
                                    ]" :value="$jenazah->status_kawin" />
                                <x-text-input name="kewarganegaraan" label="Kewarganegaraan"
                                    placeholder="Masukan kewarganegaraan" :value="$jenazah->kewarganegaraan" />
                                <x-text-input name="provinsi" label="Provinsi" placeholder="Masukan provinsi"
                                    :value="$jenazah->provinsi" />
                                <x-text-input name="kabupaten" label="Kabupaten" placeholder="Masukan kabupaten"
                                    :value="$jenazah->kabupaten" />
                                <x-text-input name="kecamatan" label="Kecamatan" placeholder="Masukan kecamatan"
                                    :value="$jenazah->kecamatan" />
                                <x-text-input name="kelurahan" label="Kelurahan" placeholder="Masukan kelurahan"
                                    :value="$jenazah->kelurahan" />
                                <x-text-input name="rt" label="RT" placeholder="Masukan RT" :value="$jenazah->rt" />
                                <x-text-input name="rw" label="RW" placeholder="Masukan RW" :value="$jenazah->rw" />
                                <x-text-area name="alamat_lengkap" label="Alamat Lengkap"
                                    placeholder="Masukan alamat lengkap" :value="$jenazah->alamat_lengkap" />
                                <x-text-area name="alamat_singkat" label="Alamat Singkat"
                                    placeholder="Masukan alamat singkat" :value="$jenazah->alamat_singkat" />
                                <x-select name="agama" label="Agama" placeholder="Pilih agama" :data="[
                                    ['label' => 'Islam', 'value' => 'Islam'],
                                    ['label' => 'Kristen', 'value' => 'Kristen'],
                                    ['label' => 'Katholik', 'value' => 'Katholik'],
                                    ['label' => 'Hindu', 'value' => 'Hindu'],
                                    ['label' => 'Buddha', 'value' => 'Buddha'],
                                    ['label' => 'Konghucu', 'value' => 'Konghucu'],
                                ]"
                                    :value="$jenazah->agama" />
                                <x-text-input name="pendidikan" label="Pendidikan" placeholder="Masukan pendidikan"
                                    :value="$jenazah->pendidikan" />
                                <x-text-input name="pekerjaan" label="Pekerjaan" placeholder="Masukan pekerjaan"
                                    :value="$jenazah->pekerjaan" />
                            </div>

                            <div class="card-footer pt-0 d-flex justify-content-end">
                                <a href="{{ route('admin.jenazah.index') }}">
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
