<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogoKompetisi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kompetisi_id',
        'name'
    ];
}
