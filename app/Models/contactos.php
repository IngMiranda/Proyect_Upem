<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class contactos extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_contactos';


    public function planteles(){
        return $this->HasMany(planteles::class,'id_plantel','fk_plantel');//belongsToMany id_plantel
    }//

    public function usuarios(){
        return $this->HasMany(usuarios::class,'id_usuario','fk_usuario');//belongsToMany
    }//
    
}
