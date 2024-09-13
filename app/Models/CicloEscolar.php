<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CicloEscolar extends Model
{
    use HasFactory;

    protected $primarykey = "idce";

    protected $fillable = [
        'nombre',
        'activo'
    ];
}
