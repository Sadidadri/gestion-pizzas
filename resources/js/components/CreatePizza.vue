<template>
    <div v-if="isAdmin()">
        <h3 class="text-center">Crear Nueva Pizza</h3>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form @submit.prevent="addPizza">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" v-model="pizza.nombre">
                    </div>
                    <div class="form-group">
                        <label>Imagen</label>
                        <input type="text" class="form-control" v-model="pizza.imagen">
                    </div>
                    <div class="form-group">
                        <label>Precio</label>
                        <input type="text" class="form-control" v-model="pizza.precio_base">
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
                pizza: {}
            }
        },
        methods: {
            addPizza() {
                this.axios
                    .post('http://localhost:8000/api/pizzas', this.pizza)
                    .then(response => (
                        this.$router.push({ name: 'Pizzas' })
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