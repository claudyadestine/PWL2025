@extends('layouts.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <button onclick="modalAction('{{ url('/detail_penjualan/import') }}')" class="btn btn-info">Import penjualan</button>
                <a href="{{ url('/detail_penjualan/export_excel') }}" class="btn btn-primary">Export penjualan</a>
                <a href="{{ url('/detail_penjualan/export_pdf') }}" class="btn btn-warning"><i class="fa fa-file- pdf"></i> Export penjualan (PDF)</a>
                <button onclick="modalAction('{{ url('/detail_penjualan/create_ajax') }}')" class="btn btn-success">Tambah Data (Ajax)</button>
            </div>
        </div>
        <div class="card-body">            
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            
            <table class="table table-bordered table-sm table-striped table-hover" id="table - detail_penjualan">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Detail Id</th>
                        <th>Penjualan Id</th>
                        <th>Barang Id</th>
                        <th>Harga</th>
                        <th>Jumlah </th>
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
        var tabledetail_penjualan;
        $(document).ready(function() {
            tabledetail_penjualan = $('#table-detail_penjualan').DataTable({
                processing: true,
                serverSide: true, 
                ajax: {
                    "url": "{{ url('detail_penjualan/list') }}",
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
                        data: "detail_id",
                        className: "text-center",
                        width: "6%",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "penjualan_id",
                        className: "text-center",
                        width: "6%",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "barang_id",
                        className: "text-center",
                        width: "6%",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "harga",
                        className: "text-center",
                        width: "6%",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "jumlah",
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

            $('#table-detail_penjualan_filter input').unbind().bind().on('keyup', function(e) {
                if (e.keyCode == 13) { // enter key
                    tabledetail_penjualan.search(this.value).draw();
                }
            });
        });
    </script>
@endpush