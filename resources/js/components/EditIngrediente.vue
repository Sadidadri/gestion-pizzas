<template>
    <div>
        <h3 class="text-center">Editar Ingrediente</h3>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form @submit.prevent="updateIngrediente">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" v-model="ingrediente.nombre">
                    </div>
                    <div class="form-group">
                        <label>Categoría</label>
                        <input type="text" class="form-control" v-model="ingrediente.categoria">
                    </div>
                    <div class="form-group">
                        <label>Imagen</label>
                        <input type="text" class="form-control" v-model="ingrediente.imagen">
                    </div>
                    <div class="text-center"> <button type="submit" class="btn btn-primary">Editar</button> </div> 
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                ingrediente: {}
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/ingredientes/${this.$route.params.id}`)
                .then((res) => {
                    this.ingrediente = res.data;
                });
        },
        methods: {
            updateIngrediente() {
                this.axios
                    .patch(`http://localhost:8000/api/ingredientes/${this.$route.params.id}`, this.ingrediente)
                    .then((res) => {
                        this.$router.push({ name: 'Ingredientes' });
                    });
            }
        }
    }
</script>