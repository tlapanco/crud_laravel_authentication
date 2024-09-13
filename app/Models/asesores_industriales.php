<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\Hashidable;
use Illuminate\Database\Eloquent\SoftDeletes;


class asesores_industriales extends Model
{
    use HasFactory, Hashidable, SoftDeletes;

  protected $appends = ['hashed_id'];

  protected $primaryKey = 'idai';

  protected $fillable = [
      'idai',
      'rfc',
      'titulacion',
      'nombre',
      'apellido_paterno',
      'apellido_materno',
      'cargo',
      'telefono',
      'correo',
      'activo',
      'idem'

  ];


  protected $table = 'asesores_industriales';

  public function getHashedIdAttribute($value)
  {
      return \Hashids::connection(get_called_class())->encode($this->getKey());
  }
}
