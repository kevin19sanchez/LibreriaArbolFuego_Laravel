<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Reseña;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function apiConnection(){
        $books = Libro::all();
        //return dd($books);
        return response()->json($books, 200);
    }

    public function apiConnection2(){
        $reseñas = Reseña::all();
        //return dd($reseñas);
        return response()->json($reseñas, 200);
    }

}
