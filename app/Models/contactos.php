<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contactos extends Model
{
    use HasFactory;
    protected $table = 'contactos';
    protected $primaryKey = 'id_contactos';
    protected $filable =[
        'fk_correo'
    ];


    public function planteles(){
        return $this->HasMany(planteles::class,'id_plantel','fk_plantel');//belongsToMany id_plantel
    }//

    public function usuarios(){
        return $this->HasMany(usuarios::class,'id_matricula','fk_usuario');//belongsToMany
    }//

    public function User(){
        return $this->HasMany(User::class,'id','fk_correo');//belongsToMany
    }
    public function Contacto(){
        return $this->HasMany(contactos::class,'fk_correo','id_contactos');//belongsToMany
    }
}
