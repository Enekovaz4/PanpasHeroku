<template>
    <div>

        <!-- CONTENIDO a Mostrar :: ini -->

                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Recetas</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><router-link to="/admin/dashboard" title="Ir al Dashboard">Dashboard</router-link></li>
                                    <li class="breadcrumb-item active">Recetas</li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <section class="col-lg-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-middle p-0">
                                        <h3 class="card-title p-3">
                                            <i class="fas fa-book-open mr-1" title="Icono de usuarios"></i>
                                            <!-- >> SIN Paginación-->
                                            [<strong>{{ elems.length }}</strong> disponible(s)]
                                            <!-- >> CON Paginación
                                            Usuarios [<strong>{{ $valores->total() }}</strong> disponible(s)]-->
                                        </h3>

                                        <form @submit.prevent="search()" class="form-inline ml-5" method="post">
                                            <div class="input-group input-group-sm">
                                                <input type="text" v-model="term" name="term" placeholder="Término..." aria-label="Search" class="form-control form-control-navbar">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-navbar">
                                                        <i class="fa fa-search" title="Buscar"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

                                        <!--De este UL, se ha eliminado el CLASS de nav-pills para que el color
                                        del texto del botón salga en blanco por defecto-->
                                        <ul class="nav ml-auto p-2">
                                            <li class="nav-item">
                                                <button class="nav-link btn btn-primary txt_blanco" type="button" title="Insertar registro" @click="regInsModal"><i class="fas fa-plus-square"></i> Nuevo</button>
                                            </li>
                                        </ul>
                                    </div><!-- /.card-header -->
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th v-if="elemsTotNotifON == 0">
                                                        <span title="Sin novedad que notificar">
                                                            <i id="ico_notif" class="fas fa-bell"></i>
                                                        </span>
                                                    </th>
                                                    <th v-else>
                                                        <a href="javascript: void(0);" @click="updateField(0, 'notif_creation', 0)" class="text-primary" :title="'Marcar TODOS[' + elemsTotNotifON + '] como NOTIFICADO'">
                                                            <i id="ico_notif" class="fas fa-bell"></i>
                                                        </a>
                                                    </th>
                                                    <th class="text-center">Imagen</th>
                                                    <th>Título</th>
                                                    <th>Autor</th>
                                                    <th>Descripción</th>
                                                    <th>Categoría</th>
                                                    <th>Votos</th>
                                                    <th>Registro</th>
                                                    <th class="text-center">Modificar</th>
                                                </tr>
                                            </thead>
                                            <tbody v-if="elems.length == 0">
                                                <tr>
                                                    <td colspan="10" class="text-muted text-center">Ninguna receta registrada actualmente</td>
                                                </tr>
                                            </tbody>
                                            <tbody v-else>
                                                <tr class="lista-usuarios" v-for="(elem, index) in elems" :key="elem.id" style="vertical-align: middle;">
                                                    <!-- ORDEN ASC -->
                                                    <!--<td class="lista_indice text-center" v-if="(index + 1) < 10">{{ '0' + (index + 1) }}</td>
                                                    <td class="lista_indice text-center" v-else v-text="index + 1"></td>-->
                                                    <!-- ORDEN DESC -->
                                                    <td class="lista_indice text-center">
                                                        <span v-if="elem.deleted_at == null" class="reg-activo">{{ elems.length - index }}</span>
                                                        <span v-else class="reg-trashed">{{ elems.length - index }}</span>
                                                    </td>
                                                    <td>
                                                        <a v-if="elem.notif_creation" href="javascript: void(0);" @click="updateField(elem.id, 'notif_creation', 0)" class="text-primary" title="Notificando - Marcar como NOTIFICADO">
                                                            <i class="fas fa-circle i_reg_notifON"></i>
                                                        </a>
                                                        <a v-else href="javascript: void(0);" @click="updateField(elem.id, 'notif_creation', 1)" class="text-primary" title="Notificado - Marcar para NOTIFICAR">
                                                            <i class="fas fa-circle i_reg_notifOFF"></i>
                                                        </a>
                                                    </td>
                                                    <td class="text-center"><a :href="'/admin/recipes/' + elem.id" title="Ir al detalle" class="negrita"><img class="avatar" :src="elem.imagen" alt="Imagen de la receta"></a></td>
                                                    <td v-text="elem.titulo"></td>
                                                    <td>{{ elem.user.username }}</td>
                                                    <td>{{ elem.descripcion | resumenTxt }}</td>
                                                    <td>{{ elem.categoria }}</td>
                                                    <td>{{ elem.votos }}</td>
                                                    <td><small :title="elem.created_at">{{ elem.created_at | formatFHHaceTanto }}</small></td>
                                                    <td class="text-center">
                                                        <router-link :to="{ name: 'recipe_detail', params: {id: elem.id} }" class="text-success" :title="'Ficha completa [' + elem.id + ']'">
                                                            <i class="far fa-file-alt"></i>
                                                        </router-link> <a href="javascript: void(0);" @click="regEditModal(elem)" class="text-primary" :title="'Editar registro [' + elem.id + ']'">
                                                            <i class="fas fa-edit"></i>
                                                        </a> <a v-if="elem.deleted_at == null" href="javascript: void(0);" @click.prevent="trashDeleteElem(elem.id)" class="text-danger" :title="'A papelera / Borrar registro [' + elem.id + ']'">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a><a v-else href="javascript: void(0);" @click.prevent="restoreDeleteElem(elem.id)" class="text-warning-trash" :title="'Restaurar / Borrar registro [' + elem.id + ']'">
                                                            <i class="fas fa-trash-restore-alt"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div><!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </section>
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content -->

                <!-- Modal-inserto-edición :: ini -->
                <recipe-ins-edit-component @insModifRegEvent="getElems"></recipe-ins-edit-component>

        <!-- CONTENIDO a Mostrar :: fin -->

    </div>
</template>

<script>
    export default {
        created() {
            //console.log('Component mounted.')

            //para cargar un listado de usuarios conectados actualizado
            BusEvent.$emit('notifCargaUsersOnlineEvent');

            //para cargar el listado de registros al llegar al componente
            this.getElems();
            //para volverlo a cargar en cada intervalo de X tiempo
            //aunque esta forma de recarga va en contra del rendimiento
            ////setInterval(() => this.getElems(), 3000);

            //Recibiendo notificación de borrado emitida por RecipeDetailComponent
            BusEvent.$on('notifRecipeDelRegEvent', (elemDelID) => {
                this.notifDelReg(elemDelID);
            });
        },

        //datos devueltos por el componente:
        data() {
            return {
                urlBase: '/api/recipes',
                //Puede ser también     >>      elems: [],
                elems: {},  //variable contenedora de los registros a listar
                elemsTotNotifON: 0,   //total de registros con Notif en ON
                term: '',   //término por el que filtrar resultados
            }
        },

        //propiedades computadas
        /**
         * Servirán para establecer el estilo adecuado:
         *    => cuando se esté o no en la página actual.
         *    => a las diferentes opciones de paginado:
         *      >> números, siguiente, anterior, ...
        */
        computed: {
            //
        },

        methods: {

            /**
             * Obteniendo listado de registros
            */
            getElems() {
                //URL hacia la ruta del listado de registros
                //  >> SIN paginación
                let url = this.urlBase;
                //Empleado el método GET de Axios, el cliente AJAX,
                //que es el método referido a la ruta llamada
                //  -> Si es correcto, se recogen los datos
                //  dentro del contenedor definido
                axios.get(url).then( response => {
                    ////console.log(response.data)
                    this.elems = response.data
                    //Total de notif_creation
                    this.getElemsTOTNotifON();
                });
            },

            /**
             * Obteniendo total de registros
             * en estado de notificación ON
             *
             * Se obtiene cada dimensión del array "elemKey" gracias al cuál
             * se pueden examinar los valores de cada uno de los objetos "elem_reg"
             * recorridos en el bucle
            */
            getElemsTOTNotifON() {
                //Reiniciando total
                this.elemsTotNotifON = 0;
                let elem_reg;
                Object.keys(this.elems).forEach((elemKey) => {
                    elem_reg = this.elems[elemKey];

                    if(elem_reg.notif_creation) {
                        this.elemsTotNotifON++;
                    }
                })
            },

            /**
             * Obteniendo listado de registros filtrados por término de búsqueda
            */
            search() {
                console.log('Enviando filtrado de búsqueda...por [' + this.term + ']');
                //URL hacia la ruta del listado de registros
                //  >> SIN paginación
                let url = this.urlBase + '/search';
                //Empleado el método POST de Axios, el cliente AJAX,
                //que es el método referido a la ruta llamada
                //  -> Si es correcto, se recogen los datos
                //  dentro del contenedor definido
                //  -> IMPORTANTE
                //  Todo lo que se manda como parámetro debe ser dentro de un OBJETO
                //  El término de búsqueda se debe mandar dentro de un objeto
                axios.post(url, {
                    term: this.term
                }).then( response => {  //SI TODO OK
                    ////console.log(response.data)
                    this.elems = response.data
                })
                .catch(error => {           //SI HAY ALGÚN ERROR
                    console.log(error.response.data.errors);
                });
            },

            /**
             * Actualizando campo
            */
            updateField(id, field, newValue) {
                let msg_success = '';
                if(id == 0) {
                    msg_success = 'Registros marcados como NOTIFICADOS';

                } else {
                    msg_success = 'Registro marcado como ';
                    if(newValue == 0)
                        msg_success += 'NOTIFICADO'
                    else
                        msg_success += 'PARA NOTIFICAR'
                }

                console.log('Actualizando campo del registro... [' + id + ']');
                let url = this.urlBase + '/editar/' + id + '/' + field + '/' + newValue;
                axios.get(url)
                .then((response) => {       //SI TODO OK

                    //refrescando listado
                    this.getElems();

                    //Lanzando notificación satisfactoria
                    toast({
                        type: 'success',
                        title: msg_success
                    });

                    //Emitiendo evento de recarga de total
                    BusEvent.$emit('notifRecargaLeidosNoTotEvent');

                })
                .catch(error => {           //SI HAY ALGÚN ERROR
                    console.log(error.response.data.errors);
                });/**/
            },

            /**
             * Abriendo ventana modal para crear registro
            */
            regInsModal() {
                //Emitiendo evento global para cargar, en el componente hijo,
                //la ventana de edición
                //  >> con el objeto pasado
                //  >> deshabilitando el insMode
                BusEvent.$emit('insModeChangeEvent', true);

                //Abriendo modal para la creación de registro
                $('#regInsEditModal').modal('show');
            },

            /**
             * Abriendo ventana modal para editar registro
            */
            regEditModal(reg) {
                console.log('Abriendo MODAL para editar registro [' + reg + ', ' + false + '].');

                //Emitiendo evento global para cargar, en el componente hijo,
                //la ventana de edición
                //  >> con el objeto pasado
                //  >> deshabilitando el insMode
                BusEvent.$emit('fillFormEvent', reg, false);

                //Abriendo modal con los datos cargados para su edición
                $('#regInsEditModal').modal('show');
            },

            /**
             * Mandar a papelera / Borrado definitivo del registro
            */
            trashDeleteElem(id) {
                /* BORRADO CON CONFIRMACIÓN */
                /**/
                Swal.fire({
                    title: 'Elección de Borrado',
                    text: 'El ELIMINAR no es reversible',
                    ////type: 'warning',
                    type: 'question',
                    showCloseButton: true,
                    showCancelButton: true,
                    confirmButtonColor: '#f6993f',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'A papelera',
                    cancelButtonText: 'Eliminar',
                }).then((result) => {

                    //Pulsando el botón equivalente a CONFIRMAR la acción
                    if (result.value) {

                        /**/
                        console.log('Se efectuará un Soft Delete...');
                        //URL hacia la ruta de borrado temporal de registro
                        let url = this.urlBase + '/' + id;
                        //Empleado el método DELETE de Axios, el cliente AJAX,
                        //que es el método referido a la ruta llamada
                        axios.delete(url)
                        .then(response => {       //SI TODO OK
                            //tras borrado temporal, si todo OK, se muestra
                            //el listado tras recargarlo
                            this.getElems();
                            let server_msg_del = response.data.message;
                            console.log(server_msg_del);

                            //Lanzando notificación satisfactoria
                            Swal.fire(
                                '¡A la papelera!',
                                'El registro con ID [' + id + '] fue mandado a la papelera correctamente.',
                                'success'
                            )
                        })
                        .catch(error => {           //SI HAY ALGÚN ERROR
                            //Lanzando notificación errónea
                            toast({
                                type: 'warning',
                                title: 'ERROR al querer mandar a la papelera el registro con ID [' + id + ']'
                            });
                        });

                    //Pulsando el botón equivalente a CANCELAR la acción
                    } else if ( result.dismiss === Swal.DismissReason.cancel ) {

                        //Borrado definitivo del registro
                        this.deleteTotalElem(id);

                    //Pulsando cualquier otra equivalencia (ESC, fuera de la ventana,...)
                    } else {
                        console.log('Acción cancelada');
                    }
                })
            },

            /**
             * Restaurar / Borrado definitivo del registro
            */
            restoreDeleteElem(id) {
                /* BORRADO CON CONFIRMACIÓN */
                /**/
                Swal.fire({
                    title: 'Eliminar o Restaurar',
                    text: 'El ELIMINAR no es reversible',
                    type: 'question',
                    showCloseButton: true,
                    showCancelButton: true,
                    confirmButtonColor: '#3490dc',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Restaurar',
                    cancelButtonText: 'Eliminar',
                }).then((result) => {

                    //Pulsando el botón equivalente a CONFIRMAR la acción
                    if (result.value) {

                        /**/
                        //URL hacia la ruta de restaurar de la papelera el registro
                        let url = this.urlBase + '/restore-delete/' + id;
                        //Empleado el método GET de Axios, el cliente AJAX,
                        //que es el método referido a la ruta llamada
                        axios.get(url)
                        .then(response => {       //SI TODO OK
                            //tras restaurar de la papelera, si todo OK, se muestra
                            //el listado tras recargarlo
                            this.getElems();
                            let server_msg_del = response.data.message;
                            console.log(server_msg_del);

                            //Lanzando notificación satisfactoria
                            Swal.fire(
                                '¡Activado!',
                                'El registro con ID [' + id + '] fue restaurado de la papelera correctamente.',
                                'success'
                            )
                        })
                        .catch(error => {           //SI HAY ALGÚN ERROR
                            //Lanzando notificación errónea
                            toast({
                                type: 'warning',
                                title: 'ERROR al querer restaurar de la papelera el registro con ID [' + id + ']'
                            });
                        });

                    //Pulsando el botón equivalente a CANCELAR la acción
                    } else if ( result.dismiss === Swal.DismissReason.cancel ) {

                        //Borrado definitivo del registro
                        this.deleteTotalElem(id);

                    //Pulsando cualquier otra equivalencia (ESC, fuera de la ventana,...)
                    } else {
                        console.log('Acción cancelada');
                    }
                })
            },

            /**
             * Borrado definitivo del registro
            */
            deleteTotalElem(id) {

                //URL hacia la ruta de borrado definitivo de registro
                let url = this.urlBase + '/force-delete/' + id;
                //Empleado el método GET de Axios, el cliente AJAX,
                //que es el método referido a la ruta llamada
                axios.get(url)
                .then(response => {       //SI TODO OK
                    //tras borrado definitivo, si todo OK, se muestra
                    //el listado tras recargarlo
                    this.getElems();
                    let server_msg_del = response.data.message;
                    console.log(server_msg_del);

                    //Lanzando notificación satisfactoria
                    Swal.fire(
                        '¡Borrado!',
                        'El registro con ID [' + id + '] fue eliminado correctamente.',
                        'success'
                    )
                })
                .catch(error => {           //SI HAY ALGÚN ERROR
                    //Lanzando notificación errónea
                    toast({
                        type: 'warning',
                        title: 'ERROR al querer eliminar totalmente el registro con ID [' + id + ']'
                    });
                });

            },

            /**
             * Notificando borrado definitivo desde la ficha de perfil completo
            */
            notifDelReg(id) {
                //Lanzando notificación satisfactoria
                Swal.fire(
                    '¡Borrado!',
                    'El registro con ID [' + id + '] fue eliminado correctamente.',
                    'success'
                )
            }

        },
    }
</script>
