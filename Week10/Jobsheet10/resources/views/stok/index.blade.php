@extends('layouts.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <button onclick="modalAction('{{ url('/Stok/import') }}')" class="btn btn-info">Import Stok</button>
                <a href="{{ url('/Stok/export_excel') }}" class="btn btn-primary">Export Stok</a>
                <a href="{{ url('/Stok/export_pdf') }}" class="btn btn-warning"><i class="fa fa-file- pdf"></i> Export Stok (PDF)</a>
                <button onclick="modalAction('{{ url('/Stok/create_ajax') }}')" class="btn btn-success">Tambah Data (Ajax)</button>
            </div>
        </div>
        <div class="card-body">            
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            
            <table class="table table-bordered table-sm table-striped table-hover" id="table-Stok">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Kode User</th>
                        <th>Jumlah</th>
                        <th>Tanggal Stok </th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    <div id="myModal" class="modal fade animate shake" tabindex="-1" data-backdrop="static" data-keyboard="false" data-width="75%"></div>
@endsection 

@push('js')
    <script>
        function modalAction(url = '') {
            $('#myModal').load(url, function() {
                $('#myModal').modal('show');
            });
        }
        var tableStok;
        $(document).ready(function() {
            tableStok = $('#table-Stok').DataTable({
                processing: true,
                serverSide: true, 
                ajax: {
                    "url": "{{ url('Stok/list') }}",
                    "dataType": "json",
                    "type": "POST",
                },
                columns: [
                    {
                        data: "DT_RowIndex",
                        className: "text-center",
                        width: "5%",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "barang_id",
                        className: "text-center",
                        width: "6%",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "user_id",
                        className: "text-center",
                        width: "6%",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "stok_jumlah",
                        className: "text-center",
                        width: "6%",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "stok_tanggal",
                        className: "text-center",
                        width: "10%",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "aksi",
                        className: "text-center",
                        width: "10%",
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            $('#table-stok_filter input').unbind().bind().on('keyup', function(e) {
                if (e.keyCode == 13) { // enter key
                    tableStok.search(this.value).draw();
                }
            });
        });
    </script>
@endpush