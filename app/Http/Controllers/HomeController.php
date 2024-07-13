<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bayar;
use App\Models\Biaya;
use App\Models\Blok;
use App\Models\Daftar;
use App\Models\HargaMakam;
use App\Models\Jenazah;
use App\Models\Lokasi;
use App\Models\RawatBulanan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('landing.index');
    }

    public function location()
    {
        return view('landing.location');
    }

    public function register()
    {
        $bloks = Blok::all();
        $biayas = Biaya::all();

        return view('landing.register', compact('bloks', 'biayas'));
    }

    public function bulanan()
    {
        $blok = Blok::all();
        $lokasi = Lokasi::all();

        return view('landing.bulanan', compact('blok', 'lokasi'));
    }

    public function bulananSubmit(Request $request)
    {
        $data = [
            'id_rawat' => RawatBulanan::generateId(),
            'nama_jenazah' => $request->nama_jenazah,
            'id_lokasi' => $request->id_lokasi,
            'id_blok' => $request->id_blok,
            'status' => 'belum',
            'bukti_transfer' => '',
        ];

        if ($request->hasFile('transfer_proof')) {
            $path = $request->file('transfer_proof')->store('transfer_proofs', 'public');
            $data['bukti_transfer'] = $path;
        }

        RawatBulanan::create($data);

        return redirect()->route('register')->with('success', 'Pembayaran berhasil!');
    }

    public function submit(Request $request)
    {
        // Handle Step 1: Save Daftar data
        $id_daftar = Daftar::generateId();
        $daftar = new Daftar();
        $daftar->id_daftar = $id_daftar;
        $daftar->nama = $request->name;
        $daftar->no_hp = $request->no_hp;
        $daftar->tanggal_meninggal = $request->tanggal_meninggal;

        // Handle Step 2: Save Jenazah data
        $id_jenazah = Jenazah::generateId();
        $jenazah = new Jenazah();
        $jenazah->id_jenazah = $id_jenazah;
        $jenazah->nama = $request->nama;
        $jenazah->nik = $request->nik;
        $jenazah->tempat_lahir = $request->tempat_lahir;
        $jenazah->tanggal_lahir = $request->tanggal_lahir;
        $jenazah->jenis_kelamin = $request->jenis_kelamin;
        $jenazah->status_kawin = $request->status_kawin;
        $jenazah->kewarganegaraan = $request->kewarganegaraan;
        $jenazah->provinsi = $request->provinsi;
        $jenazah->kabupaten = $request->kabupaten;
        $jenazah->kecamatan = $request->kecamatan;
        $jenazah->kelurahan = $request->kelurahan;
        $jenazah->rt = $request->rt;
        $jenazah->rw = $request->rw;
        $jenazah->alamat_lengkap = $request->alamat_ktp;
        $jenazah->alamat_singkat = $request->alamat_sekarang;
        $jenazah->agama = $request->agama;
        $jenazah->pendidikan = $request->pendidikan;
        $jenazah->pekerjaan = $request->pekerjaan;

        $jenazah->save();

        // Link Daftar to Jenazah
        $daftar->id_jenazah = $id_jenazah;
        $daftar->save();

        // Handle Step 3: Save Bayar data
        $bayar = new Bayar();
        $bayar->id_bayar = Bayar::generateId();
        $bayar->id_daftar = $id_daftar;
        $bayar->id_jenazah = $id_jenazah;

        // Find the related lokasi and harga based on the selected blok
        $lokasi = Lokasi::where('id_blok', $request->blok)->first();
        $harga = HargaMakam::where('id_blok', $request->blok)->first();

        $bayar->id_lokasi = $lokasi->id_lokasi;
        $bayar->id_biaya = $request->paket;
        $bayar->id_harga = $harga->id_harga;
        $bayar->tanggal_bayar = now();
        $bayar->jenis_bayar = 'transfer';
        $bayar->jumlah = Biaya::find($request->paket)->harga; // Get the harga from Biaya
        $bayar->status = 'belum';

        if ($request->hasFile('transfer_proof')) {
            $path = $request->file('transfer_proof')->store('transfer_proofs', 'public');
            $bayar->bukti_transfer = $path;
        }

        $bayar->save();

        return redirect()->route('register')->with('success', 'Pembayaran berhasil!');
    }
}
