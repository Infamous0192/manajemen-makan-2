@extends('layouts.landing')

@section('title', 'Daftar')

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h2 class="text-center">Rawat Bulanan</h2>

            <form id="multiStepForm" method="POST" action="{{ route('bulanan.submit') }}" enctype="multipart/form-data">
                @csrf

                <div class="step">
                    <div class="form-group">
                        <label for="nama_jenazah">Nama Jenazah</label>
                        <input type="text" class="form-control" id="nama_jenazah" name="nama_jenazah" required>
                    </div>
                    <div class="form-group">
                        <label for="id_blok">Pilih Blok</label>
                        <select class="form-control" id="id_blok" name="id_blok" required>
                            <option value="">Pilih Blok</option>
                            @foreach ($blok as $data)
                                <option value="{{ $data->id_blok }}">{{ $data->nama_blok }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_lokasi">Pilih Lokasi</label>
                        <select class="form-control" id="id_lokasi" name="id_lokasi" required>
                            <option value="">Pilih Lokasi</option>
                            @foreach ($lokasi as $data)
                                <option value="{{ $data->id_lokasi }}">{{ $data->id_lokasi }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="transfer_proof">Upload Bukti Transfer</label>
                        <input type="file" class="form-control-file" id="transfer_proof" name="transfer_proof" required>
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
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
