@extends('layouts.admin')

@section('title', 'Data Transaksi')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.bootstrap4.min.css">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Transaksi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Transaksi</div>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>×</span>
                        </button>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h4>Data Transaksi</h4>
                                <a href="{{ route('admin.transaksi.create') }}">
                                    <button class="btn btn-sm btn-primary rounded-sm">
                                        Tambah
                                    </button>
                                </a>
                            </div>

                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Judul</th>
                                                <th>Keterangan</th>
                                                <th>Jenis</th>
                                                <th>Jumlah</th>
                                                <th>Tanggal</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($items as $item)
                                                <tr>
                                                    <td>{{ $item->id_transaksi }}</td>
                                                    <td>{{ $item->judul }}</td>
                                                    <td>{{ $item->keterangan ? $item->keterangan : '-' }}</td>
                                                    <td style="text-transform: capitalize">{{ $item->jenis }}</td>
                                                    <td class="text-right">Rp. {{ number_format($item->jumlah, 0, ',', '.') }}</td>
                                                    <td>{{ $item->tanggal }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.transaksi.edit', $item->id_transaksi) }}"
                                                            class="btn btn-warning">Edit</a>
                                                        <form
                                                            action="{{ route('admin.transaksi.destroy', $item->id_transaksi) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h4>Data Laporan Pemasukan & Pengeluaran</h4>
                            </div>

                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table" id="summary-table">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Pemasukan</th>
                                                <th>Pengeluaran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $totalPemasukan = 0;
                                                $totalPengeluaran = 0;
                                                $saldo = 0;
                                            @endphp
                                            @foreach ($summary as $item)
                                                @php
                                                    $totalPemasukan += $item->total_pemasukan;
                                                    $totalPengeluaran += $item->total_pengeluaran;
                                                    $saldo = $totalPemasukan - $totalPengeluaran;
                                                @endphp
                                                <tr>
                                                    <td>{{ $item->tanggal }}</td>
                                                    <td class="text-right">Rp. {{ number_format($item->total_pemasukan, 0, ',', '.') }}</td>
                                                    <td class="text-right">Rp. {{ number_format($item->total_pengeluaran, 0, ',', '.') }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Total</th>
                                                <th class="text-right">Rp. {{ number_format($totalPemasukan, 0, ',', '.') }}</th>
                                                <th class="text-right">Rp. {{ number_format($totalPengeluaran, 0, ',', '.') }}</th>
                                            </tr>
                                            <tr>
                                                <th>Saldo</th>
                                                <th colspan="2" class="text-right">Rp. {{ number_format($saldo, 0, ',', '.') }}</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('library/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('library/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>

    <!-- Page Specific JS File -->
    <script>
        const table1 = $("#table-1").DataTable({
            "dom": 'Bfrtip',
            "buttons": [{
                extend: 'print',
                title: 'Data Transaksi',
                customize: function(win) {
                    $(win.document.body)
                        .css('font-size', '10pt')
                        .prepend(
                            '<img src="{{ asset('images/logo.png') }}" style="position:absolute; top:0; left:0;" />'
                        );

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                }
            }]
        });

        const summaryTable = $("#summary-table").DataTable({
            "dom": 'Bfrtip',
            "buttons": [{
                extend: 'print',
                title: 'Summary Table',
                customize: function(win) {
                    $(win.document.body)
                        .css('font-size', '10pt')
                        .prepend(
                            '<img src="{{ asset('images/logo.png') }}" style="position:absolute; top:0; left:0;" />'
                        );

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                }
            }]
        });
    </script>
@endpush
