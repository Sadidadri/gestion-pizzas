<template>
    <div v-if="isAdmin()">
        <h3 class="text-center">Crear Nuevo Ingrediente</h3>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form @submit.prevent="addIngrediente">
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
                    <div class="text-center"> <button type="submit" class="btn btn-primary">Crear</button> </div>                    
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
        methods: {
            addIngrediente() {
                this.axios
                    .post('http://localhost:8000/api/ingredientes', this.ingrediente)
                    .then(response => (
                        this.$router.push({ name: 'Ingredientes' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            },
            isAdmin(){
                if (localStorage.getItem('userLogged')){
                    if(localStorage.getItem('userRole') === "admin"){
                    return true;
                    }
                }
                    return false;
                }
        }
    }
</script>