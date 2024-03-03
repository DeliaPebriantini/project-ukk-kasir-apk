<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Penjualan extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $fillable = [
        'total_harga',
        'id_user',
        'nama_kasir',
        'id_pelanggan',
        'nama_pelanggan',
        'bayar',
        'kembali',
    ];

    protected $guarded = [];

}
