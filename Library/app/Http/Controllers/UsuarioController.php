<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{

    public function createUSer(Request $request){
        //return $request->all();

        $request->validate([
            'name_user' => 'required',
            'lastname_user' => 'required',
            'username' => 'required',
            'userpassword' => 'required',
            'userpassword_repeat' => 'required',
            'select_cargo' => 'required',
            'select_rol' => 'required',
            'select_sucursal' => 'required',
        ]);

        $new_user = new Usuario();
        $new_user->name_user = $request->name_user;
        $new_user->lastname_user = $request->lastname_user;
        $new_user->username = $request->username;
        $new_user->userpassword = $request->userpassword;
        $new_user->userpassword_repeat = $request->userpassword_repeat;
        $new_user->select_cargo = $request->select_cargo;
        $new_user->select_rol = $request->select_rol;
        $new_user->select_sucursal = $request->select_sucursal;

        $new_user->save();

        return redirect()->route('home')->with('mensaje', 'Usuario agregado');
    }
}
