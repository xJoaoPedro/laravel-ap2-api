<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vilao extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'universo',
        'pontosPoder',
    ];
}
