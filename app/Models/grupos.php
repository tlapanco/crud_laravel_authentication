<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grupos extends Model
{
    use HasFactory;

    protected $primarykey = "idg";

    protected $fillable = [
        'nombre',
        'idca',
        'idce',
        'activo'
    ];
}