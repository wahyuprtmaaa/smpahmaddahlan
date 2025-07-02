<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswas';
    protected $fillable = [
        'nisn',
        'nis',
        'nama',
        'id_kelas',
        'alamat',
        'telepon',
        'jenis_kelamin',
        'tanggal_lahir',
        'foto',
        'user_id'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function wali()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tagihans()
    {
        return $this->hasMany(Tagihan::class, 'siswa_id');
    }

    public function pembayarans()
    {
        return $this->hasManyThrough(
            \App\Models\Pembayaran::class,
            \App\Models\Tagihan::class,
            'siswa_id',
            'tagihan_id',
            'id',
            'id'
        );
    }


}
