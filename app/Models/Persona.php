<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Persona extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'Persona';

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = ['URLFoto'];

    public function getURLFotoAttribute()
    {
        if ($this->Foto) {
            return url('/') . '/storage/documents/' . $this->Foto;
        } else {
            return url('/') . '/images/default_image_profile.png';
        }
    }

    public function sexo()
    {
        return $this->belongsTo(Sexo::class, 'Sexo');
    }

    public function estadoCivil()
    {
        return $this->belongsTo(EstadoCivil::class, 'EstadoCivil');
    }

    public function fuerza()
    {
        return $this->belongsTo(Fuerza::class, 'Fuerza');
    }

    public function arma()
    {
        return $this->belongsTo(Arma::class, 'Arma');
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'Departamento');
    }

    public function grupoSanguineo()
    {
        return $this->belongsTo(GrupoSanguineo::class, 'GrupoSanguineo');
    }

    public function grado()
    {
        return $this->belongsTo(Grado::class, 'Grado');
    }

    public function reparticion()
    {
        return $this->belongsTo(Reparticion::class, 'Reparticion');
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'Cargo');
    }

    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class, 'Especialidad');
    }
}
