<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modalidades extends Model
{
    use HasFactory;
    public function contactos()
    {
        return $this->hasOne(contactos::class, 'id_modalidad', 'fk_modalidad');
    }
}
