<template>
    <div>

        <!-- CONTENIDO a Mostrar :: ini -->

                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Dashboard</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <div class="content">
                    <div class="container-fluid">

                        <!-- PANELES Resumen -->
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-tot_users">
                                    <div class="inner">
                                        <h3>{{ objTotRecursos.tot_users }}</h3>

                                        <p>Usuarios</p>
                                    </div>
                                    <div class="icon">
                                        <!-- <i class="ion ion-bag"></i> -->
                                        <i class="fa fa-users fa-1x"></i>
                                    </div>
                                    <router-link to="/admin/users" class="small-box-footer" title="Ir a Usuarios">Más info <i class="fa fa-arrow-circle-right"></i></router-link>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-tot_recetas">
                                    <div class="inner">
                                        <h3>{{ objTotRecursos.tot_recetas }}</h3>

                                        <p>Recetas</p>
                                    </div>
                                    <div class="icon">
                                        <!-- <i class="ion ion-stats-bars"></i> -->
                                        <i class="fas fa-book-open fa-1x"></i>
                                    </div>
                                    <router-link to="/admin/recipes" class="small-box-footer" title="Ir a Recetas">Más info <i class="fa fa-arrow-circle-right"></i></router-link>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-tot_comentarios">
                                    <div class="inner">
                                        <h3>{{ objTotRecursos.tot_comentarios }}</h3>

                                        <p>Comentarios</p>
                                    </div>
                                    <div class="icon">
                                        <!-- <i class="ion ion-person-add"></i> -->
                                        <i class="fa fa-comments fa-1x"></i>
                                    </div>
                                    <router-link to="/admin/comments" class="small-box-footer" title="Ir a Comentarios">Más info <i class="fa fa-arrow-circle-right"></i></router-link>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-tot_mens_contacto">
                                    <div class="inner">
                                        <h3>{{ objTotRecursos.tot_mens_contacto }}</h3>

                                        <p>Mensajes</p>
                                    </div>
                                    <div class="icon">
                                        <!-- <i class="ion ion-pie-graph"></i>
                                        <i class="fa fa-support fa-1x"></i>
                                        <i class="fas fa-question-circle fa-1x"></i> -->
                                        <i class="fas fa-envelope fa-1x"></i>
                                    </div>
                                    <router-link to="/admin/contacts" class="small-box-footer" title="Ir a Mensajes">Más info <i class="fa fa-arrow-circle-right"></i></router-link>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>

                        <!-- Otros apartados -->
                        <div class="row">
                            <div id="activity" class="col-lg-6">

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><i class="fas fa-users"></i> <strong>Último(s) usuario(s) registrado(s)</strong></h5>

                                        <div v-if="objActivReg.ultim_users == ''" class="callout callout-info user-block">
                                            <span class="img-circle img-bordered-sm" title="Icono genérico de usuario">
                                                <i class="fas fa-user i_ultim_ninguno"></i>
                                            </span>
                                            <span>
                                                Ninguno publicado aún
                                            </span>
                                        </div>
                                        <div v-else v-for="(user, index) in objActivReg.ultim_users" :key="index" class="callout callout-info user-block">
                                            <img class="img-circle img-bordered-sm" :src="user.avatar" alt="Imagen del usuario">
                                            <span class="username">
                                                <a href="#" class="tit_receta" target="_blank" title="Acceder al detalle">{{ user.name + ' ' + user.lastname + ' | @' + user.username }}</a>
                                            </span>
                                            <span class="description">Registrad@ - {{ user.created_at }}</span>
                                        </div>
                                    </div>
                                </div><!-- /.card -->

                                <div class="card card-primary card-outline">
                                    <div class="card-body">
                                        <h5 class="card-title"><i class="fas fa-book-open"></i> <strong>Última(s) receta(s) publicada(s)</strong></h5>

                                        <div v-if="objActivReg.ultim_recetas == ''" class="callout callout-info user-block">
                                            <span class="img-circle img-bordered-sm" title="Icono genérico de receta">
                                                <i class="fas fa-book-open i_ultim_ninguno"></i>
                                            </span>
                                            <span>
                                                Ninguna publicada aún
                                            </span>
                                        </div>
                                        <div v-else v-for="(receta, index) in objActivReg.ultim_recetas" :key="index" class="callout callout-info user-block">
                                            <img class="img-circle img-bordered-sm" :src="receta.imagen" alt="Foto de la receta">
                                            <span class="username">
                                                <a href="#" class="tit_receta" target="_blank" title="Acceder al detalle">{{ receta.titulo }}</a>, <small>por @{{ receta.user.username }}</small>
                                            </span>
                                            <span class="description">Publicada - {{ receta.created_at }}</span>
                                        </div>
                                    </div>
                                </div><!-- /.card -->

                                <div class="card card-outline">
                                    <div class="card-header">
                                        <h5 class="m-0"><i class="fas fa-chart-line"></i> Recetas por Tipo</h5>
                                    </div>
                                    <div class="card-body">
                                        <GChart
                                            type="PieChart"
                                            :data="chartRecetasXCateg_Data"
                                            :options="chartRecetasXCateg_Options"
                                            :resizeDebounce="500"
                                        />
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-md-6 -->
                            <div class="col-lg-6">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h5 class="m-0"><i class="fas fa-chart-line"></i> Usuarios en el Mundo</h5>
                                    </div>
                                    <div class="card-body">
                                        <GChart
                                            type="GeoChart"
                                            :data="chartUsuariosMundo_Data"
                                            :options="chartUsuariosMundo_Options"
                                            :resizeDebounce="500"
                                        />
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="m-0"><i class="fas fa-chart-line"></i> Gráfica de alta de Recetas</h5>
                                    </div>
                                    <div class="card-body">
                                        <form @submit.prevent="chartRecetasAltaXFechas()" novalidate>
                                        <div class="row">
                                            <div class="col-4">
                                                Fecha inicial
                                                <date-picker v-model="objRecetasAltaXFechas.fecha_ini" :config="options_fecha_ini" :class="{ 'is-invalid': errors.has('fecha_ini') }"></date-picker>
                                                <span v-if="errors.has('fecha_ini')" class="block text-sm text-danger mt-2">{{ errors.get('fecha_ini') }}</span>
                                            </div>
                                            <div class="col-4">
                                                Fecha final
                                                <date-picker v-model="objRecetasAltaXFechas.fecha_fin" :config="options_fecha_fin" :class="{ 'is-invalid': errors.has('fecha_fin') }"></date-picker>
                                                <span v-if="errors.has('fecha_fin')" class="block text-sm text-danger mt-2">{{ errors.get('fecha_fin') }}</span>
                                            </div>
                                            <div class="col-4">
                                                <button class="nav-link btn btn-primary txt_blanco" type="submit" title="Cargar gráfica con fechas elegidas"><i class="far fa-chart-bar"></i> Cargar</button>
                                            </div>
                                        </div>
                                        </form>

                                        <GChart
                                            type="ColumnChart"
                                            :data="chartRecetasAltaXFechas_Data"
                                            :options="chartRecetasAltaXFechas_Options"
                                            :resizeDebounce="500"
                                        />
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-md-6 -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content -->

        <!-- CONTENIDO a Mostrar :: fin -->

    </div>
</template>

<script>
    //librería para tratar los errores capturados en el servidor
    import { Errors } from '../../libs/errors';
    import datePicker from 'vue-bootstrap-datetimepicker';
    import { GChart } from 'vue-google-charts';
    export default {
        mounted() {
            console.log('Component mounted.');

            //para cargar un listado de usuarios conectados actualizado
            BusEvent.$emit('notifCargaUsersOnlineEvent');

            //para cargar total de recursos al llegar al componente
            this.getTotRecursos();
            this.getLastRegisterUsersRecipes();
            this.getCharts();
        },

        components: {
            GChart
        },

        //datos devueltos por el componente:
        data() {
            return {
                urlBase: '/admin/dashboard',
                //variable para almacenar los datos totales de registros a mostrar
                objTotRecursos: {},
                //variable para almacenar los datos de última actividad a mostrar
                objActivReg: {},

                //Opciones para cada DatetimePicker
                //  >> Rellenando con una fecha fija
                //  >> Rellenando con la fecha actual
                ////fecha_fin: new Date(),
                ////fecha_ini: '01/02/2019',
                ////fecha_fin: new Date(),
                options_fecha_ini: {
                    ////format: 'DD/MM/YYYY',
                    ////format: 'YYYY/MM/DD',
                    format: 'DD-MM-YYYY',
                    useCurrent: false,
                    locale: 'es',
                },
                options_fecha_fin: {
                    ////format: 'DD/MM/YYYY',
                    ////format: 'YYYY/MM/DD',
                    format: 'DD-MM-YYYY',
                    useCurrent: false,
                    locale: 'es',
                },
                objRecetasAltaXFechas: {
                    ////'fecha_ini': '01/02/2019',
                    ////'fecha_ini': '2019/02/01',
                    'fecha_ini': '01-12-2018',
                    'fecha_fin': new Date(),
                },
                //carga previa de resultados para gráfica "Alta de Recetas"
                objRecetasAltaXFechas_previo: {},

                // Array will be automatically processed with visualization.arrayToDataTable function
                /*chartData: [
                    ['Día', 'Recetas'],
                    ['01/02/2019', 1000,],
                    ['02/02/2019', 1170,],
                    ['03/02/2019', 660,],
                    ['04/02/2019', 1030,],
                ],*/
                chartRecetasAltaXFechas_Data: [
                    ['Día', 'Recetas'],
                    ['0', 0,],
                ],
                chartRecetasAltaXFechas_Options: {
                    ////chart: {
                    ////    title: 'Alta de Recetas en rango de Fechas',
                    ////    subtitle: 'Recetas registradas en un rango',
                    ////},
                    title: 'Alta de Recetas en rango de Fechas',
                    subtitle: 'Recetas registradas en un rango',
                    colors: ['#fed136'],
                },
                //-------------------------------------------------
                //Gráfica Usuarios Registrados por el Mundo
                chartUsuariosMundo_Data: [
                    //Para poder traducir los nmbre de los lugares pasados
                    //el mapa necesita una referencia que le indique a qué lugar se refiere
                    //el texto traducido. Por ello, se debe pasar el código del país
                    //antes de su nombre traducido
                    //https://developers.google.com/chart/interactive/docs/gallery/geochart#continent-hierarchy-and-codes
                    /*['Code', 'País', 'Registros'],
                    ['FR', 'Francia', 1200],
                    ['US', 'United States', 300],
                    ['BR', 'Brazil', 400],
                    ['CA', 'Canada', 500],
                    ['RU', 'RU', 700],*/
                    //SIN traducción de nombres
                    ['País', 'Registros'],
                    ['France', 1200],
                    ['United States', 300],
                    ['Brazil', 400],
                    ['Canada', 500],
                    ['RU', 700],
                ],
                chartUsuariosMundo_Options: {
                    //Color de fondo del mapa
                    backgroundColor: '#81d4fa',
                    //Rango de colores para eje de valores (tantos colores como se desee)
                    //por defecto, de gris a verde
                    colorAxis: {colors: ['#fed136', '#00853f']},
                },
                //carga previa de resultados para gráfica "Usuarios en el Mundo"
                objUsuariosMundo_previo: {},
                //-------------------------------------------------
                //Gráfica Recetas por Categoría
                chartRecetasXCateg_Data: [
                    ['Categoría', 'Total'],
                    ['0', 0,],
                ],
                chartRecetasXCateg_Options: {
                    title: 'Cantidades Totales (tot y %)',
                    //Para hacerlo Tridimensional
                    is3D: true,
                },
                //carga previa de resultados para gráfica "Recetas por Categoría"
                objRecetasXCateg_previo: {},
                //-------------------------------------------------
                //posibles errores
                errors: new Errors(),
            }
        },

        methods: {

            /**
             * Cargando datos de resumen
            */
            getTotRecursos() {
                console.log('Cargando totales de los recursos disponibles');
                //Haciendo la petición de datos
                let url = this.urlBase + '/get-tots';
                axios.get(url)
                .then( response => {       //SI TODO OK
                    console.log(response.data)
                    this.objTotRecursos = response.data
                })
                .catch(error => {           //SI HAY ALGÚN ERROR
                    console.log(error.response.data.errors);
                });
            },

            /**
             * Cargando datos de última actividad de registro
            */
            getLastRegisterUsersRecipes() {
                console.log('Cargando última actividad de registro de usuarios/recetas');
                //Haciendo la petición de datos
                let url = this.urlBase + '/last-register';
                axios.get(url)
                .then( response => {       //SI TODO OK
                    console.log(response.data)
                    this.objActivReg = response.data
                })
                .catch(error => {           //SI HAY ALGÚN ERROR
                    console.log(error.response.data.errors);
                });
            },

            /**
             * Carga de gráfica(s)
            */
            getCharts() {
                this.chartRecetasXCateg();
                this.chartUsuariosMundo();
                this.chartRecetasAltaXFechas();
            },

            /**
             * Carga de gráfica de Recetas por Categoría
            */
            chartRecetasXCateg() {
                console.log(':: Se cargará la gráfica recetas por categoría ::');
                //Reiniciando datos antes de un nueva carga
                this.chartRecetasXCateg_Data = [
                    ['Categoría', 'Total'],
                ];

                let url = this.urlBase + '/search-recipes-x-categ';
                axios.get(url)
                .then((response) => {       //SI TODO OK
                    ////console.log('Resultados para Gráfica "Recetas por Categoría":', response.data)
                    this.objRecetasXCateg_previo = response.data

                    let elem_result;
                    Object.keys(this.objRecetasXCateg_previo).forEach((elemKey) => {
                        elem_result = this.objRecetasXCateg_previo[elemKey];
                        //country | total_users

                        this.chartRecetasXCateg_Data.push([
                            elem_result.categoria,
                            elem_result.total_recetas,
                        ]);
                    })
                })
                .catch(error => {           //SI HAY ALGÚN ERROR
                    console.log(error.response.data.errors);
                });
            },

            /**
             * Carga de gráfica de Altas de Recetas
             * dentro de un rango de fechas dado
            */
            chartUsuariosMundo() {
                console.log(':: Se cargará la gráfica usuarios registrados por el mundo ::');
                //Reiniciando datos antes de un nueva carga
                this.chartUsuariosMundo_Data = [
                    ['País', 'Registros'],
                    ['France', 1200],
                    ['United States', 300],
                    ['Brazil', 400],
                    ['Canada', 500],
                    ['RU', 700],
                ];

                let url = this.urlBase + '/search-users-world';
                axios.get(url)
                .then((response) => {       //SI TODO OK
                    ////console.log('Resultados para Gráfica "Usuarios por el Mundo":', response.data)
                    this.objUsuariosMundo_previo = response.data

                    let elem_result;
                    Object.keys(this.objUsuariosMundo_previo).forEach((elemKey) => {
                        elem_result = this.objUsuariosMundo_previo[elemKey];
                        //country | total_users

                        this.chartUsuariosMundo_Data.push([
                            elem_result.country,
                            elem_result.total_users,
                        ]);
                    })
                })
                .catch(error => {           //SI HAY ALGÚN ERROR
                    console.log(error.response.data.errors);
                });
            },

            /**
             * Carga de gráfica de Altas de Recetas
             * dentro de un rango de fechas dado
            */
            chartRecetasAltaXFechas() {
                console.log(':: Se cargará la gráfica según el rango de fechas seleccionado ::');
                //Reiniciando datos antes de un nueva carga
                this.chartRecetasAltaXFechas_Data = [
                    ['Día', 'Recetas'],
                ];

                ////this.chartRecetasAltaXFechas_Data.push(['01/02/2019', 1000,]);
                ////this.chartRecetasAltaXFechas_Data.push(['02/02/2019', 1170,]);
                ////this.chartRecetasAltaXFechas_Data.push(['03/02/2019', 660,]);
                ////this.chartRecetasAltaXFechas_Data.push(['04/02/2019', 1030,]);
                ////this.chartRecetasAltaXFechas_Data.push(['2019-02-15 11:16:24', 2040,]);


                let url = this.urlBase + '/search-recipes-date-range';
                axios.post(url, this.objRecetasAltaXFechas)
                .then((response) => {       //SI TODO OK
                    //vaciando los posibles errores que se produjeron
                    this.errors.clear();

                    ////console.log('Resultados para Gráfica "Alta de Recetas":', response.data)
                    this.objRecetasAltaXFechas_previo = response.data

                    let elem_result;
                    Object.keys(this.objRecetasAltaXFechas_previo).forEach((elemKey) => {
                        elem_result = this.objRecetasAltaXFechas_previo[elemKey];
                        //dia_alta | total_recetas

                        this.chartRecetasAltaXFechas_Data.push([
                            this.formatFechaDMY(elem_result.dia_alta),
                            elem_result.total_recetas,
                        ]);
                    })
                })
                .catch(error => {           //SI HAY ALGÚN ERROR
                    //registrando los errores recibidos
                    this.errors.record(error.response.data.errors);
                });
            },

            /**
             * Transformar fecha pasada a formato dd/mm/YYYY
             * fecha recibida (YYYY-mm-dd 00:00:00)
            */
            formatFechaDMY(fecha) {
                let fechaDMY = '';
                let separador = '/';

                //Capturando solo la parte de fecha
                let arr_fecha_hora = fecha.split(' ');
                fecha = arr_fecha_hora[0];
                //Separando partes de la fecha Y-m-d
                let arr_YMD_fecha = fecha.split('-');
                //Invirtiendo partes y añadiendo separador deseado
                fechaDMY = arr_YMD_fecha[2] + separador + arr_YMD_fecha[1] + separador + arr_YMD_fecha[0];

                return fechaDMY;
            },

        },
    }
</script>
