<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public function nameRol() {
        return $this->hasOne(Rol::class, 'id', 'select_rol');
    }

    public function nameCargo(){
        return $this->hasOne(Cargo::class, 'id', 'select_cargo');
    }

    public function nameSucursal(){
        return $this->hasOne(Sucursal::class, 'id', 'select_sucursal');
    }
}
