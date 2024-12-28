<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Models\Cargo;
use App\Models\Rol;
use App\Models\Sucursal;
use App\Models\User;
use App\Models\Usuario;
use PhpParser\Node\Expr\FuncCall;
use App\Http\Controllers\CatalogoController;

class HomeController extends Controller
{
    public function homeIndex(){
        $newuser = Usuario::paginate(4);
        //$firebase = new CatalogoController;
        //$firebase->testFirebaseConnection();
        return view('home.home', compact('newuser'));
    }

    public function editUser($id) {
        $useredit = Usuario::findOrFail($id);
        $cargos = Cargo::all();
        $roles = Rol::all();
        $sucursales = Sucursal::all();
        return view('home.edit.edituser', compact('useredit', 'cargos', 'roles', 'sucursales'));
    }

    public function update(Request $request, $id){

        $userUpdate = Usuario::find($id);
        $userUpdate->name_user = $request->name_user;
        $userUpdate->lastname_user = $request->lastname_user;
        $userUpdate->username = $request->username;
        $userUpdate->userpassword = $request->userpassword;
        $userUpdate->userpassword_repeat = $request->userpassword_repeat;
        $userUpdate->select_cargo = $request->select_cargo;
        $userUpdate->select_rol = $request->select_rol;
        $userUpdate->select_sucursal = $request->select_sucursal;

        $userUpdate->save();

        return back()->with('mensaje', 'Usuario Editado!');
    }

    public function delete($id){
        $userdelete = Usuario::findOrFail($id);
        $userdelete->delete();

        return back()->with('mensaje', 'Usuario Eliminado!');
    }

}
