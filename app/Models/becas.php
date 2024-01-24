<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class becas extends Model
{
    use HasFactory;

    public function contactos()
    {
        return $this->hasOne(usuarios::class, 'fk_beca', 'id_beca');
    }
}
