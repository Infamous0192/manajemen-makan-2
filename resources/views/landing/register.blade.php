@extends('layouts.landing')

@section('title', 'Daftar')

@section('styles')
    <style>
        .step {
            display: none;
        }

        .step.active {
            display: block;
        }

        .step-navigation {
            margin-top: 20px;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h2 class="text-center">Daftar</h2>

            <form id="multiStepForm" method="POST" action="{{ route('register.submit') }}" enctype="multipart/form-data">
                @csrf

                <!-- Step 1 -->
                <div class="step active" id="step1">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No Hp</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_meninggal">Tanggal Meninggal</label>
                        <input type="date" class="form-control" id="tanggal_meninggal" name="tanggal_meninggal" required>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="step" id="step2">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" required>
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status_kawin">Status Kawin</label>
                        <select class="form-control" id="status_kawin" name="status_kawin" required>
                            <option value="Kawin">Kawin</option>
                            <option value="Belum Kawin">Belum Kawin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kewarganegaraan">Kewarganegaraan</label>
                        <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan" required>
                    </div>
                    <div class="form-group">
                        <label for="provinsi">Provinsi</label>
                        <input type="text" class="form-control" id="provinsi" name="provinsi" required>
                    </div>
                    <div class="form-group">
                        <label for="kabupaten">Kabupaten</label>
                        <input type="text" class="form-control" id="kabupaten" name="kabupaten" required>
                    </div>
                    <div class="form-group">
                        <label for="kecamatan">Kecamatan</label>
                        <input type="text" class="form-control" id="kecamatan" name="kecamatan" required>
                    </div>
                    <div class="form-group">
                        <label for="kelurahan">Kelurahan</label>
                        <input type="text" class="form-control" id="kelurahan" name="kelurahan" required>
                    </div>
                    <div class="form-group">
                        <label for="rt">RT</label>
                        <input type="text" class="form-control" id="rt" name="rt" required>
                    </div>
                    <div class="form-group">
                        <label for="rw">RW</label>
                        <input type="text" class="form-control" id="rw" name="rw" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat_ktp">Alamat KTP</label>
                        <input type="text" class="form-control" id="alamat_ktp" name="alamat_ktp" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat_sekarang">Alamat Sekarang</label>
                        <input type="text" class="form-control" id="alamat_sekarang" name="alamat_sekarang" required>
                    </div>
                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <select class="form-control" id="agama" name="agama" required>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katholik">Katholik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pendidikan">Pendidikan</label>
                        <input type="text" class="form-control" id="pendidikan" name="pendidikan" required>
                    </div>
                    <div class="form-group">
                        <label for="pekerjaan">Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="step" id="step3">
                    <div class="form-group">
                        <label for="blok">Pilih Blok</label>
                        <select class="form-control" id="blok" name="blok" required>
                            @foreach ($bloks as $blok)
                                <option value="{{ $blok->id_blok }}">{{ $blok->nama_blok }}
                                    {{ count($blok->hargaMakam) > 0 ? '(Rp. ' . $blok->hargaMakam[0]->harga_makam . ')' : '' }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="paket">Pilih Paket</label>
                        @foreach ($biayas as $biaya)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paket"
                                    id="paket{{ $biaya->id_biaya }}" value="{{ $biaya->id_biaya }}" required>
                                <label class="form-check-label" for="paket{{ $biaya->id_biaya }}">
                                    {{ $biaya->nama_paket }}: Rp.{{ number_format($biaya->harga, 0, ',', '.') }}
                                    <div>Fasilitas: {{ $biaya->jumlah_pekerja }} Pekerja, {{ $biaya->fasilitas }}</div>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="step" id="step4">
                    <div class="form-group">
                        <label for="transfer_proof">Upload Bukti Transfer</label>
                        <input type="file" class="form-control-file" id="transfer_proof" name="transfer_proof"
                            required>
                    </div>
                    <div class="text-center">
                        <p id="timer">Timer 24:00:00</p>
                        <p>Transfer Ke Rekening</p>
                        <p><strong>310013690618/At HJ. Muhidin</strong></p>
                        <p>Tolong bayarkan sebelum 1x24 Jam</p>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="step-navigation text-center">
                    <button type="button" class="btn btn-secondary" id="prevBtn"
                        onclick="nextPrev(-1)">Previous</button>
                    <button type="button" class="btn btn-primary" id="nextBtn" onclick="nextPrev(1)">Next</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let currentStep = 0;

        function showStep(n) {
            let steps = document.getElementsByClassName("step");
            steps[n].classList.add("active");

            if (n === 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }

            if (n === steps.length - 1) {
                document.getElementById("nextBtn").innerHTML = "Submit";
                document.getElementById("nextBtn").type = "submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
                document.getElementById("nextBtn").type = "button";
            }
        }

        function nextPrev(n) {
            let steps = document.getElementsByClassName("step");
            steps[currentStep].classList.remove("active");
            currentStep += n;

            if (currentStep >= steps.length) {
                document.getElementById("multiStepForm").submit();
                return false;
            }

            showStep(currentStep);
        }

        document.addEventListener("DOMContentLoaded", function() {
            showStep(currentStep);

            @if (session('success'))
                Swal.fire({
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            @endif
        });

        // Timer
        function startTimer(duration, display) {
            let timer = duration,
                hours, minutes, seconds;
            setInterval(function() {
                hours = parseInt(timer / 3600, 10);
                minutes = parseInt((timer % 3600) / 60, 10);
                seconds = parseInt(timer % 60, 10);

                hours = hours < 10 ? "0" + hours : hours;
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = `Timer ${hours}:${minutes}:${seconds}`;

                if (--timer < 0) {
                    timer = duration;
                }
            }, 1000);
        }

        document.addEventListener("DOMContentLoaded", function() {
            let duration = 60 * 60 * 24; // 24 hours in seconds
            let display = document.querySelector('#timer');
            startTimer(duration, display);
        });
    </script>
@endsection
