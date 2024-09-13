<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\Hashidable;
use Illuminate\Database\Eloquent\SoftDeletes;

class solicitudes extends Model
{
    use HasFactory, Hashidable, SoftDeletes;

    protected $appends = ['hashed_id'];
  
    protected $primaryKey = 'idpe';
  
    protected $fillable = [
        'idpe',
        'matricula',
        'nombre',
        'idem',
        'nombre_del_proyecto',
        'idp',
        'idaa',
        'idai',
        'fecha_solicitud',
        'fecha_inicio',
        'fecha_termino',
        'idca',
        'idc',
        'telefono',
        'solicitud_registrda',
        'solucitud_subida',
        'carta_subida',
        'cargo',
        'ide',
        'idti',
        'idta',
        'correo',
        'estatus',
        'status',
        'idce',
        'activo',
        'nombre_contacto',
        'correo_d',
        'telefono_d',
        'idg'
    ];
  
  
    protected $table = 'solicitudes';
  
    public function getHashedIdAttribute($value)
    {
        return \Hashids::connection(get_called_class())->encode($this->getKey());
    }
}
