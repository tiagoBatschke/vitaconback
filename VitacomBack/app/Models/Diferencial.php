<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diferencial extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'area_comum',
    ];
}