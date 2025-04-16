<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualanModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DetailPenjualanController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Transaksi Penjualan',
            'list' => ['Home', 'Transaksi Penjualan']
        ];

        $page = (object) [
            'title' => 'Data penjualan yang terdaftar dalam sistem'
        ];

        $activeMenu = 'detail_penjualan';

        return view('penjualan.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }
    public function list(Request $request)
    {
        $penjualans = DetailPenjualanModel::select('detail_id', 'penjualan_id', 'barang_id', 'harga', 'jumlah');
            
        return DataTables::of($penjualans)
            ->addIndexColumn()
            ->addColumn('aksi', function ($detail_penjualan) { 
                $btn = '<a href="' . url('/detail_penjualan/' . $detail_penjualan->detail_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/detail_penjualan/' . $detail_penjualan->detail_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' .
                    url('/detail_penjualan/' . $detail_penjualan->detail_id) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
}