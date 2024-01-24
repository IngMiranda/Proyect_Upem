<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{
    use HasFactory;

    public function contactos()
    {
        return $this->hasOne(contactos::class, 'fk_usuario', 'id_usuario');
    }

    public function carreras()
    {
        return $this->HasMany(carreras::class, 'id_carrera', 'fk_carrera'); //belongsToMany
    }

    public function modalidades()
    {
        return $this->HasMany(modalidades::class, 'id_modalidad', 'fk_modalidad'); //belongsToMany
    }

    public function becas()
    {
        return $this->HasMany(becas::class, 'id_beca', 'fk_beca'); //belongsToMany
    }
}
