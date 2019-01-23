<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Receta;
use App\Comentario;
use Auth;

class RecetaController extends Controller
{
    
	public function mostrar($titulo) {

		$receta = new Receta();

		$receta = $receta->where('titulo', $titulo)->get();
		$receta = $receta[0];

		$ingredientes = preg_split('/,/', $receta->ingredientes);
		
		for ($i=0; $i < count($ingredientes); $i++) { 
			$ingredientes[$i] = preg_split("/\s/", $ingredientes[$i]);
			if ($ingredientes[$i][0] == ""){
				 array_splice($ingredientes[$i], 0, 1);
			}
		}

		return view ('receta/receta', ['receta'=>$receta, 'time'=>time(), 'ingredientes'=> $ingredientes]);
	}

	public function getRecetasRanking() {

		$recetas = new Receta;
		$recetas = Receta::orderBy('votos', 'DESC')->take(3)->get();


		return view('index', ['recetas'=>$recetas, 'totalRecetas'=>count(Receta::get())]);
	}

	public function insertarComentario(Request $request) {

		$id = $_POST['id'];
		$receta = new Receta();
		$receta = $receta->find($id);
		$com = new Comentario();

		$com->mensaje = $_POST['mensaje'];
		$com->user_id = Auth::user()->id;
		$com->receta_id = $id;
		$com->time = time();

		$com->save();

		return redirect('receta/'.$receta->titulo);
	}

	public function insertarReceta(Request $request) {

		$data = $request->all();

		$receta = new Receta();
		$receta->titulo = $data['titulo'];
		$receta->descripcion = $data['descripcion'];
		$receta->elaboracion = $data['elaboracion'];

		
		$receta->elaboracion=nl2br($receta->elaboracion);

		$receta->ingredientes = $data['ingredientes'];
		$receta->imagen = $data['imagen'];
		$receta->user_id = Auth::user()->id;
		
		$receta->save();

		return redirect('recetas');

	}

	

}
