<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Agregar candidato</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a
                                        href="/candidatos"
                                        class="btn btn-sm btn-primary"
                                        >Regresar al listado</a
                                    >
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="row">
                                            <label
                                                class="col-sm-6 col-form-label"
                                                >Nombre</label
                                            >
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input
                                                        class="form-control"
                                                        type="text"
                                                        placeholder="Nombre"
                                                        v-model="
                                                            candidato.nombre
                                                        "
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label
                                                class="col-sm-6 col-form-label"
                                                >Apellido paterno</label
                                            >
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input
                                                        class="form-control"
                                                        type="text"
                                                        placeholder="Apellido paterno"
                                                        v-model="
                                                            candidato.apellido_paterno
                                                        "
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label
                                                class="col-sm-6 col-form-label"
                                                >Apellido materno</label
                                            >
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input
                                                        class="form-control"
                                                        type="text"
                                                        placeholder="Apellido materno"
                                                        v-model="
                                                            candidato.apellido_materno
                                                        "
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label
                                                class="col-sm-6 col-form-label"
                                                >Fecha nacimiento</label
                                            >
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input
                                                        class="form-control text-secondary"
                                                        type="date"
                                                        placeholder="Fecha nacimiento"
                                                        v-model="
                                                            candidato.fecha_nacimiento
                                                        "
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label
                                                class="col-sm-6 col-form-label"
                                                >Elección a participar</label
                                            >
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <select
                                                        id="cars"
                                                        class="form-control text-secondary"
                                                        v-model="
                                                            candidato.eleccion_id
                                                        "
                                                    >
                                                        <option value="1"
                                                            >Presidente</option
                                                        >
                                                        <option value="2"
                                                            >Asesor</option
                                                        >
                                                        <option value="3"
                                                            >Secretario</option
                                                        >
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label
                                                class="col-sm-6 col-form-label"
                                                >Propuestas</label
                                            >
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <textarea
                                                        class="form-control"
                                                        required="true"
                                                        v-model="
                                                            candidato.propuestas
                                                        "
                                                        id="w3mission"
                                                        rows="4"
                                                        cols="50"
                                                    ></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="hello">
                                            <picture-input
                                                ref="pictureInput"
                                                @change="onChange"
                                                width="250"
                                                height="250"
                                                margin="16"
                                                accept="image/jpeg, image/png"
                                                size="10"
                                                buttonClass="btn"
                                                :customStrings="{
                                                    upload: '<h1>Bummer!</h1>',
                                                    drag:
                                                        'Selecciona una imagen para el candidato'
                                                }"
                                            ></picture-input>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button
                                type="submit"
                                @click.prevent="create"
                                class="btn btn-primary"
                            >
                                Agregar candidato
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import PictureInput from "vue-picture-input";
import swal from "sweetalert";
export default {
    components: {
        PictureInput
    },
    data() {
        return {
            candidato: {}
        };
    },

    methods: {
        onChange(image) {
            console.log("New picture selected!");
            if (image) {
                console.log("Picture loaded.");
                this.image = image;
            } else {
                console.log(
                    "FileReader API not supported: use the <form>, Luke!"
                );
            }
        },
        create() {
            console.log(this.candidato);
            axios
                .post(`/api/candidatos/create`, this.candidato)
                .then(response => {
                    swal({
                        title: "Correcto",
                        text: "Se ha añadido al candidato",
                        icon: "success",
                        button: "Aceptar"
                    }).then(result => {
                        //location.href = "/candidatos";
                    });
                })
                .catch(error => {
                    console.log(error.message);
                });
        }
    }
};
</script>
