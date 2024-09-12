<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arma extends Model
{
    use HasFactory;
    protected $table = 'Arma';

    protected $appends = ['URLImagen'];

    public function getURLImagenAttribute() {
        if($this->Imagen) {
            return url('/') . '/storage/documents/' . $this->Imagen;
        } else {
            return url('/') . '/images/NoImagen.jpg';
        }
    }
}
