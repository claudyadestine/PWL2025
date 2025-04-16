<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\BarangModel;
use App\Models\PenjualanModel;

class DetailPenjualanModel extends Model
{
    use HasFactory;

    protected $table = 't_detail_penjualan';
    protected $primaryKey = 'detail_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'detail_id',
        'penjualan_id',
        'barang_id',
        'harga',
        'jumlah'
    ];

    // Relasi ke header transaksi
    public function penjualan(): BelongsTo
    {
        return $this->belongsTo(PenjualanModel::class, 'penjualan_id', 'penjualan_id');
    }

    // Relasi ke data barang
    public function barang(): BelongsTo
    {
        return $this->belongsTo(BarangModel::class, 'barang_id', 'barang_id');
    }
}