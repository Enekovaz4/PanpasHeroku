<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Receta;
use App\Comentario;
use Auth;
use DB;
use Redirect;

class RecetaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //  >> Desactivarlo mientras se desarrolla
        $this->middleware(['auth', 'verified']);
    }

    public function mostrar($titulo, $estado = null) {
        $receta = new Receta();

        $receta = $receta->where('titulo', $titulo)->get();
        $receta = $receta[0];

        $ingredientes = preg_split('/,/', $receta->ingredientes);



        $ingProcesado = [];
        foreach ($ingredientes as $ingrediente) {
            $ingrediente = preg_split('[ ]', $ingrediente); 

            $newing = [null, null];
            for ($i = 0; $i <= count($ingrediente) - 1; $i++){
                if ($i != count($ingrediente)-1){
                    $newing[0] = $newing[0]." ".$ingrediente[$i];
                }
               
            }
            $newing[1] = $ingrediente[count($ingrediente) - 1];
            array_push($ingProcesado, $newing);
            
        }









        
        $newing = [null, ""];
        for ($i = 0; $i < count($ingredientes) - 1; $i++){
           $newing[0] = $newing[0]." ".$ingredientes[$i];
        }
        $newing[1] = $ingredientes[count($ingredientes) - 1];
        $ingredientes = $newing;
        //dd($ingredientes);
/*
        for ($i=0; $i < count($ingredientes); $i++) {
            $ingredientes[$i] = preg_split("/\s/", $ingredientes[$i]);
            if ($ingredientes[$i][0] == "") {
                array_splice($ingredientes[$i], 0, 1);
            }
        }
*/
        return view ('receta/receta', [
            'receta' => $receta,
            'time' => time(),
            'ingredientes' => $ingProcesado,
            'toast'=>$estado
        ]);
    }

    public function insertarComentario(Request $request) {
        $id = $_POST['id'];
        $receta = new Receta();
        $receta = $receta->find($id);
        $com = new Comentario();

        if ($_POST['mensaje'] != "") {
            $com->mensaje = $_POST['mensaje'];
            $com->user_id = Auth::user()->id;
            $com->receta_id = $id;
            $com->time = time();

            $com->save();

            return redirect('receta/'.$receta->titulo.'/recetaInsertada'); //receta insertada

        } else {
            return redirect('receta/'.$receta->titulo.'/inputVacio'); //receta no insertada por input vacío
        }
    }

    public function insertarReceta(Request $request) {
        $data = $request->all();

        $receta = new Receta();
        $receta->titulo = $data['titulo'];
        $receta->descripcion = $data['descripcion'];
        $receta->elaboracion = htmlentities ($data['elaboracion']);
        $receta->categoria = $data['categoria'];


        $receta->elaboracion = nl2br($receta->elaboracion);

        $receta->ingredientes = $data['ingredientes'];
        $receta->imagen = $data['imagen'];
        $receta->user_id = Auth::user()->id;
        $receta->save();

        return redirect('/recetas/RecetaInsertada');
    }

    public function insertarFavoritos($id) {
        //insertar registro en base de datos
        DB::table('receta_user')->insert([
            'user_id' => Auth::user()->id,
            'receta_id' => $id
        ]);

        //actualizar votos de la receta
        $receta = new Receta;
        $receta = $receta->where('id', $id)->first();

        $receta->votos += 1;

        $receta->save();

        return Redirect::back();
    }

    public function eliminarFavoritos($id) {
        //eliminar registro en base de datos
        DB::table('receta_user')->where('user_id', Auth::user()->id)->where('receta_id', $id)->delete();

        //actualizar votos de la receta
        $receta = new Receta;
        $receta = $receta->where('id', $id)->first();

        $receta->votos -= 1;

        $receta->save();

        return Redirect::back();
    }

}
