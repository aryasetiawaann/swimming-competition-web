<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kompetisi;
use App\Models\Atlet;
use Illuminate\Database\Eloquent\Relations\Concerns\InteractsWithPivotTable;


class Acara extends Model
{
    use HasFactory;

    protected $table = 'acara';

    protected $fillable = [
        'kompetisi_id',
        'nomor_lomba',
        'nama',
        'jenis_lomba',
        'kategori',
        'harga',
        'kuota',
        'grup',
        'min_umur',
        'max_umur',
    ];

    public function kompetisi(){

        return $this->belongsTo(Kompetisi::class);
    }

    public function peserta(){
        return $this->belongsToMany(Atlet::class)->withPivot(['status_pembayaran', 'updated_at', 'id']);
    }

    public function pesertaSelesai(){
        return $this->belongsToMany(Atlet::class)
        ->withPivot(['status_pembayaran', 'updated_at', 'id', 'waktu_pembayaran'])
        ->wherePivot('status_pembayaran', 'Selesai');
    }

    
}
