<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias'; // Defina o nome da tabela correspondente se for diferente de 'categoria'

    protected $fillable = [
        'nome',
    ];
}