<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class DetailPenjualan extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'id_penjualan',
        'id_produk',
        'nama_produk',
        'jumlah_produk',
        'subtotal',
    ];

    protected $guarded = [];

}
