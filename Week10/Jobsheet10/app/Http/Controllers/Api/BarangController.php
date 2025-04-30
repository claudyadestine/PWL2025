<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BarangModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class BarangController extends Controller
{
    public function index()
    {
        return BarangModel::all();
    }

    public function store(Request $request)
    {
        $barang = BarangModel::create($request->all());
        return response()->json([
            'data' => $barang,
            'status' => 201
        ]);
    }

    public function show(BarangModel $barang)
    {
        return $barang;
    }

    public function update(Request $request, BarangModel $barang)
    {
        $barang->update($request->all());
        return $barang;
    }

    
    public function destroy(BarangModel $barang)
    {
        $barang->delete();
        return response()->json([
            'message' => 'Data terhapus.'
        ], 200);
    }
}