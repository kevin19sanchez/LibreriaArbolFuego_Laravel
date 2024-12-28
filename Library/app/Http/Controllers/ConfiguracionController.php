<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cargo;
use App\Models\Rol;
use App\Models\Sucursal;
use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){

        $roles = Rol::all();
        $cargos = Cargo::all();
        $sucursales = Sucursal::all();

        return view('configuracion.configuracion', compact('roles', 'cargos', 'sucursales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeRol(Request $request){
        $request->validate([
            'rol' => 'required|unique:rols,rol'
        ]);

        $roles = new Rol();
        $roles->rol = $request->rol;
        $roles->save();

        return redirect()->route('configuracion.home')->with('success', 'Rol creado exitosamente');
    }

    public function storeCargo(Request $request){
        $request->validate([
            'cargo' => 'required|unique:cargos,cargo'
        ]);

        $cargos = new Cargo();
        $cargos->cargo = $request->cargo;
        $cargos->save();

        return redirect()->route('configuracion.home')->with('success', 'Cargo creado exitosamente');
    }

    public function storeSucursal(Request $request){
        $request->validate([
            'sucursal' => 'required|unique:cargos,cargo'
        ]);

        $sucursales = new Sucursal();
        $sucursales->sucursal = $request->sucursal;
        $sucursales->save();

        return redirect()->route('configuracion.home')->with('success', 'Sucursal creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
