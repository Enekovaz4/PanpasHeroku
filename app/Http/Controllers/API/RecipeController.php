<?php

namespace App\Http\Controllers\API;

use App\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\RecipeStoreRequest;
use App\Http\Requests\RecipeUpdateRequest;

class RecipeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //Exigiendo: autenticarse, verificar-email-registro
        //----------------------------------------------------------
        //  >> Desactivado mientras se desarrolla
        $this->middleware(['auth:api', 'verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  >>CON Soft Delete activado
        //      -> incluyendo los registros en papelera
        return Receta::withTrashed()->with('user:id,username,name,lastname')
                    ->orderBy('id', 'desc')->get();
    }

    /**
     * Filtrar resultados del listado por el término enviado
     *
     * $termino => buscando por titulo, descripcion, elaboracion, ingredientes
     *
     * @param Request $request
     * @return void
     */
    public function search(Request $request)
    {
        $termino = $request->term;
        $db_driver_actual = config('database.default', 'mysql');

        if($db_driver_actual == 'mysql') {
            return Receta::withTrashed()
                    ->with('user:id,username,name,lastname')
                    //para Caso INSENSITIVO a Mayúsculas
                    //  >> sacando resultados que coincidan
                    //  ya sea en mayúsc. o minúsculas
                    ->where(DB::raw('LOWER(titulo)'), 'LIKE', "%".strtolower($termino)."%")
                    ->orWhere(DB::raw('LOWER(descripcion)'), 'LIKE', "%".strtolower($termino)."%")
                    ->orWhere(DB::raw('LOWER(elaboracion)'), 'LIKE', "%".strtolower($termino)."%")
                    ->orWhere(DB::raw('LOWER(ingredientes)'), 'LIKE', "%".strtolower($termino)."%")
                    ->orderBy('id', 'desc')->get();

        } else if($db_driver_actual == 'pgsql') {
            return Receta::withTrashed()
                    ->with('user:id,username,name,lastname')
                    //para Caso INSENSITIVO a Mayúsculas
                    //  >> sacando resultados que coincidan
                    //  ya sea en mayúsc. o minúsculas
                    ->where('titulo', 'ilike', "%{$termino}%")
                    ->orWhere('descripcion', 'ilike', "%{$termino}%")
                    ->orWhere('elaboracion', 'ilike', "%{$termino}%")
                    ->orWhere('ingredientes', 'ilike', "%{$termino}%")
                    ->orderBy('id', 'desc')->get();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecipeStoreRequest $request)
    {
        Receta::create($request->all());

        //Simplemente, se hace un RETURN vacío pues JS se encargará de avisar
        //del OK del proceso, a no ser que se quiera enviar, por ejemplo,
        //enviar un mensaje informativo para verlo por consola
        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Receta::withTrashed()->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RecipeUpdateRequest $request, $id)
    {
        //Operación masiva contando con los campos especificados en el $fillable del modelo
        Receta::where('id', $request->id)
                ->update($request->except('_token'));

        return ['message' => 'Actualizando el registro con ID => [' . $id . ']'];
    }

    /**
     * Editing the field of an specified register.
     *
     * @param  int      $id
     * @param  string   $campo
     * @param  int      $valor
     * @return \Illuminate\Http\Response
     */
    public function update_campo($id, $campo, $valor)
    {
        if($id == 0) {
            Receta::query()
                    ->update([
                        $campo => $valor,
                    ]);
        } else {
            Receta::where('id', $id)
                    ->update([
                        $campo => $valor,
                    ]);
        }

        return;
    }

    /**
     * Remove the specified resource from storage.
     *      >> Teniendo Soft Delete activado
     *          -> el DELETE() pasa a mandar el registro
     *          a la papelera
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $reg = Receta::findOrFail($id);

            $reg->delete();
            //SIN Soft Delete
            ////$msg = 'Receta borrada definitivamente ... OK';
            //CON Soft Delete
            $msg = 'Receta mandada a la papelera ... OK';

        } catch (\Exception $e) {
            $msg = $e->getMessage();
        }

        return [
            'message' => $msg,
        ];
    }

    /**
     * Forcing remove the specified resource.
     *      >> Teniendo Soft Delete activado
     *          -> es necesario forzar el DELETE()
     *          para eliminar el registro totalmente
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forceDelete($id)
    {
        try {
            //  >>CON Soft Delete activado
            //      -> incluyendo los registros en papelera
            $reg = Receta::withTrashed()->findOrFail($id);

            $reg->forceDelete();
            $msg = 'Receta borrada definitivamente ... OK';
        } catch (\Exception $e) {
            $msg = $e->getMessage();
        }

        return [
            'message' => $msg,
        ];
    }

    /**
     * Restore form trash the specified resource.
     *      >> Teniendo Soft Delete activado
     *          -> se restaura el registro desactivado
     *          por encontrarse en la papelera
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restoreDelete($id)
    {
        try {
            $reg = Receta::onlyTrashed()->findOrFail($id);

            $reg->restore();
            $msg = 'Receta restaurada de la papelera ... OK';
        } catch (\Exception $e) {
            $msg = $e->getMessage();
        }

        return [
            'message' => $msg,
        ];
    }

    //********************************************************************************
    //  :: Gráfica(s) ::
    //********************************************************************************

    /**
     * Filtrar altas de recetas por un rango de fechas
     *
     * @param Request $request
     * @return void
     */
    public function searchXDateRange(Request $request)
    {
        $fecha_ini = $request->fecha_ini;
        $fecha_fin = $request->fecha_fin;
        return Receta::where('created_at', 'LIKE', "%{$termino}%")
                ->orWhere('lastname', 'LIKE', "%{$termino}%")
                ->orWhere('username', 'LIKE', "%{$termino}%")
                ->orWhere('email', 'LIKE', "%{$termino}%")
                ->orderBy('created_at', 'asc')->get();
    }
}
