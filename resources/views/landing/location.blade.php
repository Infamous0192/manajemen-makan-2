@extends('layouts.landing')

@section('title', 'Lokasi Makam Al-Allamah Muhammad Amin')

@section('content')
    <div class="card">
        <div class="card-body">
            <div id="map" style="height: 400px;"></div>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-body">
            <p><strong>Alamat :</strong> Jl. Lingkar Benua Anyar, Benua Anyar, Kec. Banjarmasin Tim, Kota Banjarmasin,
                Kalimantan Selatan 70121</p>
            <p><strong>Head Office :</strong> Jl. Raya Lenteng Agung No 48, Jakarta Selatan</p>
            <p><strong>Phone :</strong> 0896.0533.5103</p>
        </div>
    </div>
@endsection

@section('scripts')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([-3.3090458, 114.6140432], 17);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([-3.3090458, 114.6140432]).addTo(map)
            .bindPopup(
                'Jl. Lingkar Benua Anyar, Benua Anyar, Kec. Banjarmasin Tim, Kota Banjarmasin, Kalimantan Selatan 70121')
            .openPopup();
    </script>
@endsection
