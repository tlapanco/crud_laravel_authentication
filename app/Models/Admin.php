<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Http\Traits\Hashidable;

class Admin extends Authenticatable
{
    use HasFactory, SoftDeletes, HasApiTokens, Notifiable, Hashidable;


    protected $appends = ['hashed_id'];

    protected $primaryKey = 'idadmin';

    protected $fillable = [
        'titulo',
        'nombre',
        'foto',
        'apellido_paterno',
        'apellido_materno',
        'email',
        'remember_token',
        'password',
        'activo',
        'ida'
    ];

    protected $attributes = [
        'activo' => 1
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $table = 'administradores_plataforma';

    public function getGetFullnameAttribute()
    {
        return "{$this->titulo} {$this->nombre} {$this->apellido_paterno} {$this->apellido_materno}";
    }

    public function getGetStatusAttribute(){
        if($this->activo === 1){
            return strtoupper("Activo");
        }else{
            return strtoupper('Inactivo');
        }
    }

    public function getHashedIdAttribute($value)
    {
        return \Hashids::connection(get_called_class())->encode($this->getKey());
    }

    public function area(){
        return $this->belongsTo(Area::class, 'ida');
    }
}
