<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumnosCarrera extends Model
{
    use HasFactory;
    
    protected $table = 'alumnos_carreras'; 
    protected $primaryKey = "idaca";
    protected $fillable = [
    'activo',
    'idu',
    'idg'
    ];
}