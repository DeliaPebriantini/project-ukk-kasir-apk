<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Pelanggan extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $fillable = [
        'nama_pelanggan', 
        'jenis_kelamin',
        'alamat', 
        'nomor_telepon',
    ];

    protected $guarded = [];

}
