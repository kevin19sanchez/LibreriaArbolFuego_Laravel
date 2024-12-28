<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;


class CatalogoController extends Controller
{
    public function inicio(){
        $newbook = Libro::all();
        return view('catalogo.catalogo', compact('newbook'));
    }

    public function indexCatalogoRegister(){
        return view('catalogo.catalogo_register.register_catalogo');
    }

    public function store(Request $request){
        //return $request->all();

        $firebase = (new Factory)->withServiceAccount(base_path(env('GOOGLE_CLOUD_KEY_FILE')));
        $storage = $firebase->createStorage();

        $newbook = new Libro();
        $newbook->title = $request->title;
        $newbook->author = $request->author;
        $newbook->identifier = $request->identifier;
        $newbook->publisher = $request->publisher;
        $newbook->description = $request->description;
        $newbook->date = $request->date;
        $newbook->type = $request->type;
        $newbook->format = $request->format;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $firebasePath = 'book_covers/' . $imageName;
            $file = fopen($image->path(), 'r');

            // Obtener el bucket de Firebase Storage
            $bucketName = str_replace('gs://', '', env('GOOGLE_CLOUD_STORAGE_BUCKET'));
            $bucket = $storage->getBucket($bucketName);

            // Subir el archivo a Firebase Storage
            $object = $bucket->upload($file, [
                'name' => $firebasePath
            ]);

            // Configurar permisos públicos
            $object->update([
                'acl' => []
            ], [
                'predefinedAcl' => 'PUBLICREAD'
            ]);

            // Obtener la URL pública
            $imageUrl = 'https://storage.googleapis.com/' . $bucketName . '/' . $firebasePath;

            // Guardar la URL en la base de datos
            $newbook->image = $imageUrl;

        }

        $newbook->save();

        return redirect()->route('catalogo.inicio')->with('mensaje', 'Libro agregado');
    }

    public function updateCatalogo($id){
        $updatebook = Libro::findOrFail($id);
        return view('catalogo.update_catalogo', compact('updatebook'));
    }

    public function catalogoUpdate(Request $request, $id){

        $bookupdate = Libro::find($id);
        $bookupdate->title = $request->title;
        $bookupdate->author = $request->author;
        $bookupdate->identifier = $request->identifier;
        $bookupdate->publisher = $request->publisher;
        $bookupdate->description = $request->description;
        $bookupdate->date = $request->date;
        $bookupdate->type = $request->type;
        $bookupdate->format = $request->format;
        $bookupdate->image = $request->image;

        $bookupdate->save();

        return redirect()->route('catalogo.inicio')->with('mensaje', 'Libro Editado!');
    }

    public function catalogoDelete($id){

        $deleteCatalogo = Libro::findOrFail($id);
        $deleteCatalogo->delete();

        return redirect()->route('catalogo.inicio')->with('mensaje', 'Libro Eliminado!');
    }
}





