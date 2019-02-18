<?php

use App\User;

use Illuminate\Database\Seeder;


class recetas_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        static $users;
        //Todos los usuarios
        ////$users = User::all();
        $id_no = 1;
        //Todos los usuarios, menos el del ID especificado
        ////$users = User::all()->except($id_no);
        //Todos los usuarios, menos el del ID que inició sesión
        ////$users = User::all()->except(Auth::id());
        //Todos los usuarios, menos los que tengan el ID de perfil indicado (1 >> ADMIN)
        $users = User::where('perfil_id', '<>', $id_no)->get();
        $users_tot = count($users);

        //$recetas_faker_tot = 20;
        $recetas_faker_tot = 69;
        $_arr_categoria = ['panadería', 'pastelería'];








            DB::table('recetas')->insert([
                'titulo' => 'Diplomático',
                'descripcion' => "Eva Arguiñano elabora en el programa de televisión Karlos Arguiñano en tu cocina el delicioso postre Diplomático ¿te lo vas a perder?",
                'imagen' => "https://www.hogarmania.com/archivos/201812/diplomatico-vertical-XxXx80.jpg",
                'elaboracion' => "Calienta 65 gramos de azúcar en una sartén. Cuando se funda reparte el caramelo en 4 recipientes aptos para el horno.<br><br>
Bate en un bol los huevos con el azúcar. Añade la leche y mezcla bien.<br><br>

Pica las frutas confitadas y colócalas en un bol. Añade las pasas remojadas en ron y mezcla. Resérvalas.<br><br>

Corta los cruasanes en rodajas. Cubre la base de los recipientes con unos trozos de cruasán, reparte encima la mezcla de frutas confitadas y pasas, y finalmente cúbrelos con el resto de los trozos de cruasán.<br><br>

Reparte encima la mezcla de huevo batido con leche y deja que reposen en el frigorífico de un día para otro.<br><br>

Hornéalos a 180º C durante 25-30 min. Deja que se templen y desmolda. Sirve la crema inglesa en la base de los platos y coloca un diplomático en cada uno. Adorna con unas hojas de menta.<br><br>

Consejo:<br><br>

Si no los has dejado reposar de un día para otro no pasa nada. Con tenerlos 3 horas será suficiente para que queden bien empapados.",
                'ingredientes' => "Cruasan 2, Leche 250ml, huevos 2, azúcar 100g, pasas al Ron 20g, fruta confitada 50g, hojas de menta 2",
                //  >> Aleatorio entre un rango de números dado
                ////'user_id' => random_int(1, 9),
                //  >> Aleatorio entre los IDs resultantes de la consulta
                'user_id' => 3,
                'votos' => 0,
                //'votos' => random_int(0, 0),
                'categoria' => 'pastelería',
                ////'created_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now'),
                'created_at' => new DateTime('2018-12-14'),
            ]);

                DB::table('recetas')->insert([
                'titulo' => 'Pastelitos de mora',
                'descripcion' => "Eva Arguiñano prepara una receta de pastelitos de mora, un postre delicioso y muy fácil de hacer. Anímate a probarlo.",
                'ingredientes' => "Harina 150g, Mantequilla 75g, Azúcar Moreno 40g, Copos Avena 20g, Huevo 1, Moras 20, Mermelada 150g, Hojas de Menta 2",
                'imagen' => "https://www.hogarmania.com/archivos/201809/6218-pastelitos-de-mora-pin-XxXx80.jpg",
                'elaboracion' => "<h3>Paso 1</h3><p>Coloca la harina en un bol, añade la avena, el azúcar moreno, la avellana molida y una pizca de sal. Mezcla, incorpora la mantequilla a punto de pomada y el huevo. Amasa con la mano.</p>
<h3>Paso 2</h3>
<p>
Extiende un papel de horno y coloca encima la masa, coloca otro papel de horno y estírala con un rodillo. Coloca la masa (con los papeles de horno) en una placa de horno y hornéala a 170º C durante 15 minutos.</p>
<h3>Paso 3</h3>
<p>
Retira la masa del horno y con ayuda de un corta pastas corta (en caliente) 4 galletas.</p>
<h3>Paso 4</h3>
<p>
Coloca las 4 galletas en una fuente, úntalas con un poco de mermelada y pon 5 moras encima de cada una.</p>
<h3>Paso 5</h3>
<p>
Decora con unas hojitas de menta.</p>",

                'user_id' => 2,
                'votos' => 0,
                'categoria' => 'pastelería',
                'created_at' => new DateTime('2019-01-07'),
            ]);

                DB::table('recetas')->insert([
                'titulo' => 'Tarta de queso cuajada',
                'descripcion' => "Joseba Arguiñano elabora de postre una deliciosa Tarta de queso cuajada en el programa de televisión Cocina Abierta.",
                'ingredientes' => "Nata 200ml, Leche 175ml, Queso Cremoso 175g, Azúcar 45g, Cuajo en Polvo 1, Galletas 100g, Mantequilla 50g, Mermelada de Fresa ?, Frambuesas 2, Physalis 2, Grosellas 1",
                'imagen' => "https://www.hogarmania.com/archivos/201803/tarta-queso-vertical-XxXx80.jpg",
                'elaboracion' => "
                <ol>
                <li style='border:1px solid black; padding: 10px;'>
                Precalienta el horno a 200ºC. Para la base de la tarta, tritura las galletas y derrite la mantequilla. Mézclalas en un bol hasta conseguir una pasta. Colócala en el fondo de un molde y aplástala bien con el culo de un vaso para que quede uniforme. Introdúcela en el horno. Apaga el horno y déjala que se seque con el calor durante 5 minutos.
                </li><br>
                <li style='border:1px solid black; padding: 10px;'>
                Mezcla el queso, el cuajo y el azúcar en un bol. Pon a calentar la nata y la leche en un cazo. Cuando rompa a hervir viértelo sobre el queso y remueve hasta que el queso se disuelva. Dale al conjunto un nuevo hervor removiéndolo con cuidado de que no se pegue. Vierte todo al molde y deja que se temple.
                </li><br>
                <li style='border:1px solid black; padding: 10px;'>
                Tapa la tarta con plástico de cocina y deja que se enfríe en el frigorífico durante 2 horas. Desmóldala y cúbrela con una capa de mermelada de fresa. Decora con las physalis, las frambuesas y las grosellas. Sirve.
                </li>
                    </ol>
                ",
                'user_id' => 3,
                'votos' => 0,
                'categoria' => 'pastelería',
                'created_at' => new DateTime('2019-02-15'),
            ]);

    }
}
