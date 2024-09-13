<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\Hashidable;
use Illuminate\Database\Eloquent\SoftDeletes;

class asesores_academicos extends Model
{
    use HasFactory, Hashidable, SoftDeletes;

    protected $appends = ['hashed_id'];
  
    protected $primaryKey = 'idaa';
  
    protected $fillable = [
        'idaa',
        'nomnbre',
        'apellido_paterno',
        'apellido_materno',
        'telefono',
        'correo',
        'titulo',
        'activo'
    ];
  
  
    protected $table = 'asesores_academicos';
  
    public function getHashedIdAttribute($value)
    {
        return \Hashids::connection(get_called_class())->encode($this->getKey());
    }
}
