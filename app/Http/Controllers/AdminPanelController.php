<?php

namespace App\Http\Controllers;

use App\User;
use App\Receta;
use App\Contacto;
use App\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPanelController extends Controller
{
    //EmailADMIN remitente de respuesta(s)
    protected $app_email;
    //Capturando valor de esta configuración sobre la BD
    protected $db_driver_actual;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //  >> Desactivarlo mientras se desarrolla
        $this->middleware(['auth', 'verified']);

        $this->app_email = config('mail.from.address', 'panpas.zm@gmail.com');
        $this->db_driver_actual = config('database.default', 'mysql');
    }

    public function index()
    {
        return view('admin.dashboard');
    }

    /**
     * Obtener totales de los recursos disponibles
     *
     * @return void
     */
    public function getTots()
    {
        $_arr_detalle = [];

        $tot_users          = User::withTrashed()->count();
        $tot_recetas        = Receta::withTrashed()->count();
        $tot_comentarios    = Comentario::withTrashed()->count();
        $tot_mens_contacto  = Contacto::withTrashed()->where('correo', '!=', $this->app_email)
                                        ->count();//sin los enviados por ADMIN como respuesta

        $_arr_detalle['tot_users']          = $tot_users;
        $_arr_detalle['tot_recetas']        = $tot_recetas;
        $_arr_detalle['tot_comentarios']    = $tot_comentarios;
        $_arr_detalle['tot_mens_contacto']  = $tot_mens_contacto;

        return $_arr_detalle;
    }

    /**
     * Devolviendo últimos usuarios y recetas registrad@s
     *
     * @return void
     */
    public function lastRegisterUsersRecipes()
    {
        $_arr_detalle = [];

        $ultim_users = User::withTrashed()
                            ->orderBy('created_at', 'DESC')//primero, por fecha DESC
                            ->orderBy('id', 'DESC')//segundo, por ID DESC
                            ->take(3)->get();

        $ultim_recetas = Receta::withTrashed()
                            ->with('user')
                            ->orderBy('created_at', 'DESC')//primero, por fecha DESC
                            ->orderBy('id', 'DESC')//segundo, por ID DESC
                            ->take(3)->get();

        $_arr_detalle['ultim_users'] = $ultim_users;
        $_arr_detalle['ultim_recetas'] = $ultim_recetas;

        return $_arr_detalle;
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
    public function searchRecipesXDateRange(Request $request)
    {
        //Estableciendo reglas de validación
        $reglas = [
            'fecha_ini' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_ini',
        ];
        //Validando petición
        $request->validate($reglas);

        //$fecha_ini = $request->fecha_ini;
        //$fecha_fin = $request->fecha_fin;
        //$fecha_ini = "2010-03-21 21:59:03";
        //Asegurando el formato requerido en la consulta a efectuar
        $fecha_ini = date('Y-m-d', strtotime($request->fecha_ini));
        $fecha_fin = date('Y-m-d', strtotime($request->fecha_fin));
        //dd('REQUEST: ', $request, 'fecha_ini: ', $fecha_ini, 'fecha_fin: ', $fecha_fin);

        //Según tipo de BD...
        if($this->db_driver_actual == 'mysql') {
            return Receta::select(DB::raw('COUNT(*) AS total_recetas, created_at AS dia_alta'))
                    ->whereBetween('created_at', [$fecha_ini, $fecha_fin])
                    ->groupby('dia_alta')
                    ->get();

        } else if($this->db_driver_actual == 'pgsql') {
            return Receta::select(DB::raw('COUNT(*) AS total_recetas, created_at AS dia_alta'))
                    ->whereBetween('created_at', [$fecha_ini, $fecha_fin])
                    ->groupby('dia_alta')
                    ->get();
        }
    }

    /**
     * Filtrar total de usuarios registros por país de procedencia
     *
     * @return void
     */
    public function searchUsersWorld()
    {
        //Según tipo de BD...
        if($this->db_driver_actual == 'mysql') {
            return User::select(DB::raw('COUNT(*) AS total_users, country'))
                    ->groupby('country')
                    ->get();

        } else if($this->db_driver_actual == 'pgsql') {
            return User::select(DB::raw('COUNT(*) AS total_users, country'))
                    ->groupby('country')
                    ->get();
        }
    }

    /**
     * Filtrar total de recetas por categoría
     *
     * @return void
     */
    public function searchRecipesXCateg()
    {
        //Según tipo de BD...
        if($this->db_driver_actual == 'mysql') {
            return Receta::select(DB::raw('COUNT(*) AS total_recetas, categoria'))
                    ->groupby('categoria')
                    ->get();

        } else if($this->db_driver_actual == 'pgsql') {
            return Receta::select(DB::raw('COUNT(*) AS total_recetas, categoria'))
                    ->groupby('categoria')
                    ->get();
        }
    }
}
