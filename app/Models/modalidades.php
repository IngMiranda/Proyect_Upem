<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modalidades extends Model
{
    use HasFactory;
    public function usuarios()
    {
        return $this->hasOne(contactos::class, 'fk_modalidad', 'id_modalidad');
    }
}
