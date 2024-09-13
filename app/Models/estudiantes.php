<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\Hashidable;
use Illuminate\Database\Eloquent\SoftDeletes;


class estudiantes extends Model
{
  use HasFactory, Hashidable, SoftDeletes;

  protected $appends = ['hashed_id'];

  protected $primaryKey = 'ide';

  protected $fillable = [
      'ide',
      'matricula',
      'nombre',
      'sexo',
      'idca',
      'activo'
  ];


  protected $table = 'estudiantes';

  public function getHashedIdAttribute($value)
  {
      return \Hashids::connection(get_called_class())->encode($this->getKey());
  }
}
