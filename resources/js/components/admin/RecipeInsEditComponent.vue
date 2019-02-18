<template>
    <div class="modal fade" id="regInsEditModal" tabindex="-1" role="dialog" aria-labelledby="regInsEditModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <form @submit.prevent="insMode ? storeReg() : updateReg()" novalidate>

                <div class="modal-header">
                    <h5 v-show="insMode" class="modal-title" id="regInsEditModalLabel">Insertar registro</h5>
                    <h5 v-show="!insMode" class="modal-title" id="regInsEditModalLabel">Actualizar registro</h5>
                    <button type="button" @click="restartPanel" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-md-10 mb-3">
                            <label for="titulo-id">Título*</label>
                            <input v-model="objReg.titulo" type="text" class="form-control" :class="{ 'is-invalid': errors.has('titulo') }" name="titulo" id="titulo-id" placeholder="Título" required>
                            <span v-if="errors.has('titulo')" class="block text-sm text-danger mt-2">{{ errors.get('titulo') }}</span>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="votos-id">Votos</label>
                            <input v-model="objReg.votos" type="text" class="form-control" :class="{ 'is-invalid': errors.has('votos') }" name="votos" id="votos-id" placeholder="Votos">
                            <span v-if="errors.has('votos')" class="block text-sm text-danger mt-2">{{ errors.get('votos') }}</span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="categ-id">Categoría*</label>
                            <select v-model="objReg.categoria" name="categoria" id="categ-id" class="custom-select" :class="{ 'is-invalid': errors.has('categoria') }" required>
                                <option value="">Seleccionar una</option>
                                <option value="panadería">Panadería</option>
                                <option value="pastelería">Pastelería</option>
                            </select>
                            <span v-if="errors.has('categoria')" class="block text-sm text-danger mt-2">{{ errors.get('categoria') }}</span>
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="user-id">Autor*</label>
                            <select v-model="objReg.user_id" name="user_id" id="user-id" class="custom-select" :class="{ 'is-invalid': errors.has('user_id') }" required>
                                <option value="">Seleccionar uno</option>
                                <option v-for="(elem, index) in elems" :key="index" :value="elem.id" :selected="objReg.user_id == elem.id">{{ elem.username }}</option>
                            </select>
                            <span v-if="errors.has('user_id')" class="block text-sm text-danger mt-2">{{ errors.get('user_id') }}</span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="descripcion-id">Descripción*</label>
                            <textarea v-model="objReg.descripcion" class="form-control" :class="{ 'is-invalid': errors.has('descripcion') }" name="descripcion" id="descripcion-id" placeholder="Descripción" required></textarea>
                            <span v-if="errors.has('descripcion')" class="block text-sm text-danger mt-2">{{ errors.get('descripcion') }}</span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="ingredientes-id">Ingredientes*</label>
                            <textarea v-model="objReg.ingredientes" class="form-control" :class="{ 'is-invalid': errors.has('ingredientes') }" name="ingredientes" id="ingredientes-id" placeholder="Ingredientes" required></textarea>
                            <span v-if="errors.has('ingredientes')" class="block text-sm text-danger mt-2">{{ errors.get('ingredientes') }}</span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="elaboracion-id">Elaboración*</label>
                            <textarea v-model="objReg.elaboracion" class="form-control" :class="{ 'is-invalid': errors.has('elaboracion') }" name="elaboracion" id="elaboracion-id" placeholder="Elaboración" required></textarea>
                            <span v-if="errors.has('elaboracion')" class="block text-sm text-danger mt-2">{{ errors.get('elaboracion') }}</span>
                        </div>
                    </div>
                    <!--<div class="form-row">
                        <div class="col-md-8 mb-3">
                            <label for="avatar-id">Avatar</label>
                            <input @change="onImgSelecc" type="file" class="form-control" name="avatar" id="avatar-id" placeholder="Avatar">
                             <div class="valid-feedback">
                                ¡OK!
                            </div>
                            <div class="invalid-feedback">
                                Por favor, escoge un AVATAR.
                            </div>
                        </div>
                    </div>-->

                    <!-- Sacando panel de errores - todos juntos -->
                    <!--<div class="col-xs|sm|md|lg|xl-1-12">
                        <div v-if="errors_length > 0" class="alert alert-danger">
                            <ul>
                                <li v-for="(error, index) in errors" :key="index">{{ error[0] }}</li>
                            </ul>
                        </div>
                    </div>-->
                </div>

                <div class="modal-footer">
                    <div><small class="text-white bg-danger">(*) campo requerido</small></div>
                    <div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="restartPanel">Cancelar</button>
                        <button v-show="insMode" class="btn btn-primary" type="submit" title="Insertar registro">Insertar</button>
                        <button v-show="!insMode" class="btn btn-success" type="submit" title="Actualizar registro">Actualizar</button>
                    </div>
                </div>

                </form>

            </div>
        </div>
    </div>
</template>

<script>
    //librería para tratar los errores capturados en el servidor
    import { Errors } from '../../libs/errors';// '../../libs/errors.js';
    export default {
        mounted() {
            console.log('Component mounted.');

            //Carga de usuarios a asignar como autor
            this.getElems();

            //Recibiendo evento(s) si emitido(s) (en este caso, desde su componente Padre)
            BusEvent.$on('insModeChangeEvent', (status) => {
                this.insModeChange(status);
            });
            BusEvent.$on('fillFormEvent', (reg, status) => {
                this.fillEditReg(reg, status);
            });
        },

        //datos devueltos por el componente:
        data() {
            return {
                urlBase: '/api/recipes',
                urlSec: '/api/users',
                //variable que guarda el archivo seleccionado
                imgSelecc: null,
                //variable para almacenar los datos del registro a almacenar
                objReg: {
                    'titulo': '',
                    'descripcion': '',
                    'categoria': '',
                    'elaboracion': '',
                    'ingredientes': '',
                    'votos': '',
                    'user_id': '',
                    'imagen': '',
                    //para la edición
                    'id': '',
                },
                elems: {},  //variable contenedora de los registros a listar (usuarios > autor)
                //útil para condicionar el muestreo del modal para crear o editar registro
                insMode: true,
                //posibles errores
                errors: new Errors(),
            }
        },

        methods: {

            insModeChange(status) {
                //Cambiando estado
                this.insMode = status;
                console.log('insMode ACTUAL: ' + this.insMode);
            },

            /**
             * En el evento de seleccionar archivo, se captura el archivo elegido
             * guardándolo en la variable correspondiente
            */
            onImgSelecc(evento) {
                console.log(evento);
                ////this.imgSelecc = evento.target.files[0];
                //this.objReg.imagen = evento.target.files[0];
            },

            /**
             * Almacenando nuevo registro
            */
            storeReg() {
                console.log('Registrando nuevo registro...');
                let url = this.urlBase;
                axios.post(url, this.objReg)
                .then((response) => {       //SI TODO OK
                    ////document.location = '/';

                    //reseteando panel
                    this.restartPanel();

                    //Lanzando notificación satisfactoria
                    toast({
                        type: 'success',
                        title: 'Nuevo registro creado'
                    });

                    //ocultando la ventana modal de creación de registro
                    $('#regInsEditModal').modal('hide');

                    //Emitiendo solicitud de recarga del listado
                    this.$emit('insModifRegEvent');
                })
                .catch(error => {           //SI HAY ALGÚN ERROR
                    //registrando los errores recibidos
                    this.errors.record(error.response.data.errors);
                });
            },

            /**
             * Mostrando registro para editar
            */
            fillEditReg(reg, status) {
                //rellenando la variable de datos para la edición
                this.objReg = {
                    'titulo': reg.titulo,
                    'descripcion': reg.descripcion,
                    'categoria': reg.categoria,
                    'elaboracion': reg.elaboracion,
                    'ingredientes': reg.ingredientes,
                    'votos': reg.votos,
                    'user_id': reg.user_id,
                    //'imagen': reg.imagen,
                    //para la edición
                    'id': reg.id,
                };
                //desactivando el modo de inserto
                console.log('STATUS recibido por evento: ' + status);
                this.insModeChange(status);
            },

            /**
             * Obteniendo listado de registros de posibles autores
            */
            getElems() {
                //URL hacia la ruta del listado de registros
                let url = this.urlSec;
                axios.get(url).then( response => {
                    ////console.log(response.data)
                    this.elems = response.data
                });
            },

            /**
             * Actualizando registro
            */
            updateReg() {
                console.log('Actualizando registro... [' + this.objReg.id + ']');
                let url = this.urlBase + '/' + this.objReg.id;
                axios.put(url, this.objReg)
                .then((response) => {       //SI TODO OK

                    //reseteando panel
                    this.restartPanel();

                    //Lanzando notificación satisfactoria
                    toast({
                        type: 'success',
                        title: 'Registro actualizado'
                    });

                    //ocultando la ventana modal de creación de registro
                    $('#regInsEditModal').modal('hide');

                    //Emitiendo solicitud de recarga del listado
                    this.$emit('insModifRegEvent');
                })
                .catch(error => {           //SI HAY ALGÚN ERROR
                    //registrando los errores recibidos
                    this.errors.record(error.response.data.errors);
                });/**/
            },

            restartPanel() {
                //reseteando a vacío la variable de datos
                this.objReg = {
                    'titulo': '',
                    'descripcion': '',
                    'categoria': '',
                    'elaboracion': '',
                    'ingredientes': '',
                    'votos': '',
                    'user_id': '',
                    'imagen': '',
                    'id': '',
                };

                //vaciando los posibles errores que se produjeron
                this.errors.clear();
            },

        },
    }
</script>
