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
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Últimos usuario(s) registrado(s)</h5>

                                        <p class="card-text">
                                            Kesi KEsi Kesito
                                        </p>

                                        <a href="#" class="card-link">Card link</a>
                                        <a href="#" class="card-link">Another link</a>
                                    </div>
                                </div>

                                <div class="card card-primary card-outline">
                                    <div class="card-body">
                                        <h5 class="card-title">Últimas receta(s)</h5>

                                        <p class="card-text">
                                            Pastel de mantequilla.
                                        </p>
                                        <a href="#" class="card-link">Card link</a>
                                        <a href="#" class="card-link">Another link</a>
                                    </div>
                                </div><!-- /.card -->
                            </div>
                            <!-- /.col-md-6 -->
                            <div class="col-lg-6">

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="m-0">Gráfica de alta de Recetas</h5>
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
                                        />
                                    </div>
                                </div>

                                <!--<div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h5 class="m-0">Featured</h5>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-title">Special title treatment</h6>

                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>-->
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
            this.getCharts();
        },

        components: {
            GChart
        },

        //datos devueltos por el componente:
        data() {
            return {
                urlBase: '/admin/dashboard',
                //variable para almacenar los datos del registro a almacenar
                objTotRecursos: {},

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
                    chart: {
                        title: 'Alta de Recetas en rango de Fechas',
                        subtitle: 'Recetas registradas en un rango',
                    },
                    colors: ['#fed136'],
                },
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
             * Carga de gráfica(s)
            */
            getCharts() {
                this.chartRecetasAltaXFechas();
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
