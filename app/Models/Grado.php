<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    use HasFactory;
    protected $table = 'Grado';

    public function escalafon()
    {
        return $this->belongsTo(Escalafon::class, 'Escalafon');
    }
}
