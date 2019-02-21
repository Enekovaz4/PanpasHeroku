<?php

use App\User;

use Illuminate\Database\Seeder;


class recetas_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void

//plantilla de receta

 DB::table('recetas')->insert([
                'titulo' => '',
                'descripcion' => "",
                'ingredientes' => "",
                'imagen' => "",
                'elaboracion' => "",
                'user_id' => ,
                'votos' => 0,
                'categoria' => 'pastelería',
                'created_at' => new DateTime('2019-07-15'),
            ]);



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


                DB::table('recetas')->insert([
                'titulo' => 'Magdalenas',
                'descripcion' => "Las magdalenas de mantequilla que te traigo hoy son una receta sencillamente deliciosa y debo su descubrimiento a mi amiga Patty.",
                'ingredientes' => "Huevos 4, Azúcar 150gr, Leche 60ml, Aceite Girasol 80ml, Mantequilla 100gr, Harina 200gr, Sal 3gr, Piel de Limón -",
                'imagen' => "http://www.annarecetasfaciles.com/files/magdalenas-de-mantequilla-a-650x488.jpg",
                'elaboracion' => "1.- Derrite la mantequilla en el microondas y deja templar (recuerda que salpica, acuérdate de poner la tapa ;)).

2.- Bate los huevos junto con el azúcar hasta que espumen bien. Añade la ralladura de limón, la mantequilla templada, el aceite y la leche. Bate de nuevo hasta que se se integren todos los ingredientes.<br><br>

3.- Incorpora la harina junto con la levadura y la sal a través de un tamiz o colador. Hazlo poco a poco para que la harina se integre bien y no queden grumos. Si este paso lo haces con la batidora, baja la velocidad. Guarda la mezcla en la nevera durante una hora, este paso es muy importante.<br><br>

4.- Coloca las cápsulas de madalena dentro de cada una de las cavidades de una bandeja para cupcakes. Puedes usar también moldes de silicona sobre una bandeja de horno. Llena 3/4 partes de los moldes y espolvorea un poco de azúcar encima, muy poco.<br><br>

5.- Lleva la bandeja al horno, precalentado a 220º C durante diez minutos. A los diez minutos, baja la temperatura a 200º C y sigue horneando cinco minutos más. Antes de retirarlas del horno, comprueba pinchando con un palito de brocheta y si sale limpio, retíralas del horno. Deja enfriar encima de una rejilla. Para guardarlas, una vez frías, mételas dentro de una bolsa de plástico y ciérrala.",
                'user_id' => 4,
                'votos' => 0,
                'categoria' => 'pastelería',
                'created_at' => new DateTime('2019-05-15'),
            ]);





                DB::table('recetas')->insert([
                'titulo' => 'Tarta Flor',
                'descripcion' => "La tarta flor con masa filo o ruffle milk pie, es una tarta de origen griego. Su forma caprichosa en forma de flor la hace llamativa y su preparación es de lo más sencilla. La base es la masa filo, muy sencilla y un flan. La masa filo resulta laboriosa de hacer y te recomiendo que uses una masa ya preparada.. Hoy en día se encuentra con facilidad en los supermercados y su precio es muy asequible, por no decir económico. Además de hacerla con un flan báscio como el de esta receta, puedes animarte a rellenarla con flan de queso, de café o el flan que más te guste. Si decides aprovechar algo de turrón que te ha sobrado, le darás un plus a tu receta.",
                'ingredientes' => "Masa Filo 250g, Leche 400ml, Huevos 3, Azúcar 125g, Piel Limón 1, Ramita Canela 1, Mantequilla 50g",
                'imagen' => "http://www.annarecetasfaciles.com/files/tarta-flor-img_4874-1-815x458.jpg",
                'elaboracion' => "1.- Precalienta el horno a 175 grados con calor arriba y abajo.<br><br>

2.- Calienta la mantequilla en el microondas durante 1 minuto para derretirla. Pincela el molde con la mantequilla derretida para que no se pegue la tarta.<br><br>

3.- Prepara la masa. Pincela cada una de las láminas con la mantequilla derretida. Arruga cada lámina como si estuvieras haciendo un abanico y, con cuidado de que no se rompa, ve formando las flores. (Mira en el vídeo cómo lo hago). Sencillamente hay que empezar con una tira enrollada en el centro e ir añadiendo las tiras alrededor, es muy sencillo hacer la flor con masa filo. Debes pincelar las láminas rápido porque la masa se rompe con facilidad. Ve formando todas las flores, cuanto más irregulares queden más bonita se verá.<br><br>
4.- Lleva la masa al horno precalentado a 175 grados. En 10 minutos tendrás la flor dorada.<br><br>
5.- Prepara el flan. Coloca un cazo al fuego con la leche, la canela, y unas pieles de limón. Baja el fuego en cuanto empiece a hervir y deja que hierva un minuto. Retira del fuego. Coloca los huevos en un bol, añade el azúcar y mezcla bien. Añade la leche a través de un colador para retirar la piel del limón y la canela.<br><br>
6.- Reparte el flan en la tarta con cuidado. Introduce en el horno a 175 grados con calor por la parte de abajo durante 20 minutos o hasta que, al pinchar con un palito, salga limpio.<br><br>

7.- Adorna la tarta. Espolvorea a través de un colador azúcar glass cuando la tarta esté fría.<br><br>
",
                'user_id' => 5,
                'votos' => 0,
                'categoria' => 'pastelería',
                'created_at' => new DateTime('2019-07-15'),
            ]);



                DB::table('recetas')->insert([
                'titulo' => 'Bizcocho de Calabaza',
                'descripcion' => "Este bizcocho de calabaza se prepara de manera muy fácil sin batir claras y yemas por separado. Queda alto y esponjoso y lo mejor de todo es que está buenísimo.",
                'ingredientes' => "Calabaza 300g, Harina de Trigo 300g, Aceite 200ml, Huevos 4, Azúcar 200g, Levadura 16g, Esencia Vainilla -",
                'imagen' => "http://www.annarecetasfaciles.com/files/bizcocho-de-calabaza-2-650x488.jpg",
                'elaboracion' => "
1.- Precalienta el horno a 160 grados con calor arriba y abajo.<br><br>

2.- Cuece la calabaza durante 5 minutos. Corta unos trozos de calabaza y llévalos a la cazuela al fuego. Un truco para conservar bien la calabaza es taparla con papel fil, que el papel esté en contacto con la calabaza, y guardarla en el frigorífico. A los 5 minutos, retira los trozos de calabaza a un plato para que se vayan enfriando.<br><br>

3.- Prepara el molde. Engrasa las paredes y la base del molde con un poco de mantequilla. Yo he utilizado un molde de 19 centímetros de ancho, por 24 de largo y 7 de profundidad. Coloca en la basa papel de horno previamente cortado con las medidas de la base del molde. Reserva el molde.<br><br>

4.- Coloca en un bol los 4 huevos y añade sal, la esencia de vainilla, el azúcar y la calabaza a la que debes quitarle la piel. También puedes trocear la calabaza un poco más. Tritura todo con la batidora de brazo o con la licuadora si dispones de ella. Cuando esté todo bien triturado, incorpora el aceite, la harina sin tamizar y la levadura química o polvo de hornear. Tritura todo de nuevo. Cuando tengas la mezcla sin grumos, vierte al molde.<br><br>

5.- Lleva el bizcocho al horno. Tras 55 minutos en el horno, tu bizcocho estará listo.<br><br>

6.- Desmolda el bizcocho. Pasa un cuchillo por todo el borde para que sea más fácil y retira el papel de horno de la base del bizcocho. Deja que se enfríe sobre una rejilla.<br><br>

7.- Por último, decóralo. Puedes decorarlo espolvoreando azúcar glas por encima o con una cobertura de chocolate. Lo mejor es hacerlo cuando el bizcocho esté frío.
                ",
                'user_id' => 5,
                'votos' => 0,
                'categoria' => 'pastelería',
                'created_at' => new DateTime('2019-09-15'),
            ]);



                DB::table('recetas')->insert([
                'titulo' => 'Pastel Mágico',
                'descripcion' => "El pastel mágico es un postre sorprendente, además de sencillo. Su nombre se debe a que con una sola preparación, en el horno sucede una especie de magia. Sí, tal como te digo, cuando se hornea, la masa se divide en tres capas perfectamente diferenciadas. En la parte baja queda un pudin, denso y riquísimo, en el centro aparece un flan suave y cremoso y en la parte superior se distingue un delicado y esponjoso bizcocho. Así de sencillo y así de espectacular es esta tarta. Sin necesidad de decorar, solamente una preparación y espolvorear con azúcar glass al final.",
                'ingredientes' => "Leche 500ml, Huevos 4, Azúcar 140g, Mantequilla 125g, Harina 115g, Ralladura Limón -, Esencia Vainilla -, Sal 3g",
                'imagen' => "http://www.annarecetasfaciles.com/files/pastel-inteligente-3-815x458.jpg",
                'elaboracion' => "
1.- Forra el molde. Utiliza un molde apto para horno. El que yo he utilizado mide 24 centímetros de largo, por 19 de ancho y 6 de profundidad. Humedece el papel de horno con agua del grifo. Despliega el papel, adáptalo al molde y reserva este molde. Precalienta el horno con calor arriba y abajo a 180 grados.<br><br>

2 .- Separa en dos boles las yemas de las claras y reserva las claras. Añade a las yemas la esencia de vainilla, la ralladura de limón y el azúcar. Bate todo con unas varillas hasta que las yemas hayan blanqueado y añade la mantequilla a temperatura ambiente. Bate todo otra vez y añade la leche poco a poco. Vuelve a batir y añade la harina a través de un colador. Mezcla todo bien y reserva.<br><br>

3.- Monta las claras. Añade una pizquita de sal al bol de las claras y, con las varillas bien lavadas y secas, monta las claras.<br><br>

4.- Incorpora las claras al resto de pastel. Mezcla con movimientos envolventes con mucho cuidado de no bajar las claras. Cuando esté mezclado, debe quedar con aspecto grumoso, pásalo al molde. Alisa la superficie y llévalo al horno previamente precalentado.<br><br>

5.- Hornea el pastel. Los primeros 10 minutos, hornea a 180 grados con calor arriba y abajo. Pasados los 10 minutos, baja la temperatura a 160 grados con calor arriba y abajo y déjalo otros 40 minutos.<br><br>

6.- Desmolda el pastel. Espera a que se enfríe para desmoldar. Puedes dejarlo sobre una rejilla para que enfríe antes. Separa el papel, pásalo al plato donde vayas a servirlo, y corta el sobrante.<br><br>
",
                'user_id' => 5,
                'votos' => 0,
                'categoria' => 'pastelería',
                'created_at' => new DateTime('2019-11-15'),
            ]);




                DB::table('recetas')->insert([
                'titulo' => 'Bizcocho 3 ingredientes',
                'descripcion' => "Con solo 3 ingredientes, te presento este bizcocho tan esponjoso que te servirá de basa para la torta tres 3 leches y tartas para rellenar. Se trata del clásico bizcocho genovés que se usa como base para tartas. Con huevos, harina y azúcar, no necesitas más para prepararlo. Lo curioso es que se usa el mismo peso de huevos que de azucar y harina y así tenemos 240 g de huevos (4 huevos tamaño L), 120 g de harina y 120 g de azúcar. Curioso a la vez que fácil de recordar.",
                'ingredientes' => "Huevos 4, Harina 120gr, Azúcar 120gr",
                'imagen' => "http://www.annarecetasfaciles.com/files/bizcocho-de-3-ingredientes-650x366.jpg",
                'elaboracion' => "
1.- Precalienta el horno con calor arriba y abajo a 160 grados centígrados.<br><br>

2.- Separa las claras y las yemas en dos boles diferentes.<br><br>

3.- Añade al bol de las claras la mitad del azúcar. Monta las claras con la batidora de varillas eléctrica o manual. Para de batir cuando veas que las claras ya dibujan trazo y eso te indicará que han alcanzado el punto de nieve.<br><br>

4.- Añade el resto del azúcar al bol de las yemas. Bate la mezcla sin necesidad de limpiar la batidora. Las yemas irán blanqueando y puedes dejar de batir cuando, al igual que con las claras, veas que se dibuja trazo.<br><br>

5.- Incorpora la harina poco a poco a través de un colador o un tamiz. Ahora, con movimientos envolventes, ve integrando la mezcla. Para que no baje el volumen alterna cucharadas de claras y harina tamizada. Ten cuidado de que no se baje la mezcla ya que no lleva ni levadura ni polvo de hornear. Añade más harina y cuando veas que te cuesta trabajar la mezcla, añade más claras. Sigue mezclando con movimientos envolventes hasta terminar de incorporar tanto claras como harina.<br><br>

6.- Coloca una hoja de papel vegetal en la base del molde y recorta el sobrante. Rocía un poco de spray desmoldante  todo el interior y vierte toda la masa del bizcocho. Alisa la superficie para nivelar la masa.<br><br>

7.- Lleva el bizcocho al horno precalentado a 160º C. Coloca el molde encima de la bandeja en el segundo de los niveles del horno. Observa y compara con el vídeo cómo crece en el horno. Llega un punto en el que el bizcocho deja de crecer y empieza a bajar, es momento de retíralo del horno. Puedes pinchar antes con un palito de brocheta y comprobar que sale limpio. En mi caso, lo he horneado durante 35 minutos.<br><br>

8.- Desmolda el bizcocho antes de que se enfríe. Déjalo encima de una rejilla para que se enfríe.
   ",
                'user_id' => 5,
                'votos' => 0,
                'categoria' => 'pastelería',
                'created_at' => new DateTime('2019-04-15'),
            ]);


                DB::table('recetas')->insert([
                'titulo' => 'Tarde de Queso Oreo',
                'descripcion' => "La tarta de queso o cheesecake Oreo te va a encantar por su sabor suave y cremoso, y por lo rápido y fácil que se prepara. Es una receta ideal si eres principiante en la cocina. Para su elaboración no es necesario el horno, de aquí que sea tan fácil ya que no tendrás que estar pendiente de tiempos ni de temperaturas. Lleva una base de galletas oreo y una crema de queso y nata que hará las delicias de todo el que la pruebe. Ya verás, seguro que dura un suspiro en la mesa. Anímate a prepararla y te aseguro que se volverá una tarta a la que recurras en muchas ocasiones en las que te apetece degustar algo delicioso, pero no dispones de mucho tiempo para dedicarlo a la cocina.",
                'ingredientes' => "Galletas Oreo 24, Nata 500ml, Leche 250ml, Philadelphia 400g, Azúcar 250g, Esencia Vainilla -, Mantequilla 100g, Hojas Gelatina 8",
                'imagen' => "http://www.annarecetasfaciles.com/files/tarta-de-queso-oreo-video-1miniatura-815x458.jpg",
                'elaboracion' => "
1.- Separa las galletas y la crema y colócalos en dos boles diferentes. Tritura las galletas en la picadora. Lo mejor es triturar primero la mitad y luego el resto. Cuando estén totalmente picadas, reserva dos o tres cucharadas soperas de la harina de galletas oreo, que emplearás en la decoración final de la tarta. Tamiza las galletas trituradas de la decoración para asegurarte de que el polvo de galleta es lo bastante fino.<br><br>

2.- Añade la mantequilla derretida a las galletas trituradas y mezcla bien hasta que la galleta quede empapada completamente. Pasa la mezcla al molde para tartas y repártelo bien con la espátula cubriendo toda la base. Ayúdate con una espátula o lengua de gato para conseguir una capa lo más lisa y uniforme posible. Lleva al frigorífico para que la mantequilla se endurezca de nuevo.<br><br>

3.- En un bol con agua, sumerge las láminas de gelatina para hidratarlas, antes de empezar a preparar la crema de queso.<br><br>

4.- Coloca un cazo al fuego y calienta la leche. Cuando esté caliente añade la gelatina escurrida y remueve con las varillas hasta que se disuelva. Incorpora el queso crema. Remueve hasta que quede integrado por completo. Una vez integrado, retira del fuego y añade la crema de las galletas oreo, que habíamos reservado al principio. Bate con unas varillas manuales y reserva.<br><br>

5.- Vierte la nata o crema de leche (crema para batir) en un bol y añade el azúcar. Para montar la nata con las varillas, empieza con una velocidad baja porque salpica mucho y poco a poco ve aumentando la intensidad. Cuando la nata dibuja el trazo, deja de batir o podría cortarse. Ya está la nata montada.<br><br>

6.- Coloca la crema de queso, que se habrá enfriado un poco, en un bol y añade una cucharadita de esencia de vainilla (opcional). La esencia de vainilla tiñe un poco el color blanco de la tarta. Ve incorporando poco a poco la nata con movimientos envolventes para evitar que pierda el aire que hemos introducido al montarla. Cuando la crema esté bien mezclada, viértela en el molde de tarta.<br><br>

7.-Lleva el molde a la nevera, mínimo 8 horas para que la gelatina actúe y cuaje la tarta de galletas oreo. Lo mejor es hacerla la víspera.<br><br>

8.- Una vez bien fría, retira de la nevera y, con la ayuda de un colador, cubre por toda la superficie de la tarta con la harina de galletas oreo. Procura que quede toda la superficie uniforme y completamente negra, sin zonas blancas.<br><br>

9.- Para retirar el molde, ayúdate de un cuchillo para despegar el borde de la tarta. Las paredes se despegarán con facilidad.


",
                'user_id' => 5,
                'votos' => 0,
                'categoria' => 'pastelería',
                'created_at' => new DateTime('2019-04-15'),
            ]);



                

    }
}
