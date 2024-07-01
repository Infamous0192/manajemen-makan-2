@extends('layouts.admin')

@section('title', 'Data Jenazah')

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
                <h1>Jenazah</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Jenazah</div>
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
                                <h4>Data Jenazah</h4>
                                <a href="{{ route('admin.jenazah.create') }}">
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
                                                <th class="text-center">ID Jenazah</th>
                                                <th>Nama</th>
                                                <th>NIK</th>
                                                <th>Tempat Lahir</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Status Kawin</th>
                                                <th>Kewarganegaraan</th>
                                                <th>Alamat Singkat</th>
                                                <th>Agama</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($jenazah as $data)
                                                <tr>
                                                    <td class="text-center">{{ $data->id_jenazah }}</td>
                                                    <td>{{ $data->nama }}</td>
                                                    <td>{{ $data->nik }}</td>
                                                    <td>{{ $data->tempat_lahir }}</td>
                                                    <td>{{ $data->tanggal_lahir }}</td>
                                                    <td>{{ $data->jenis_kelamin }}</td>
                                                    <td>{{ $data->status_kawin }}</td>
                                                    <td>{{ $data->kewarganegaraan }}</td>
                                                    <td>{{ $data->alamat_singkat }}</td>
                                                    <td>{{ $data->agama }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.jenazah.edit', $data->id_jenazah) }}"
                                                            class="btn btn-warning">Edit</a>
                                                        <form
                                                            action="{{ route('admin.jenazah.destroy', $data->id_jenazah) }}"
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
            "columnDefs": [{
                "sortable": false,
                "targets": [10]
            }],
            "dom": 'Bfrtip',
            "buttons": [{
                extend: 'print',
                title: 'Data Jenazah',
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
