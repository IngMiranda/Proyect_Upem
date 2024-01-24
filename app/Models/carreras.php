<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carreras extends Model
{
    use HasFactory;
    public function contactos()
    {
        return $this->hasOne(contactos::class, 'fk_carrera', 'id_carrera');
    }
}
