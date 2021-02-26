<template>
    <div v-if="isAdmin()">
        <h3 class="text-center">Editar Pizza</h3>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form @submit.prevent="updatePizza">
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
                pizza: {}
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/pizzas/${this.$route.params.id}`)
                .then((res) => {
                    this.pizza = res.data;
                });
        },
        methods: {
            updatePizza() {
                this.axios
                    .patch(`http://localhost:8000/api/pizzas/${this.$route.params.id}`, this.pizza)
                    .then((res) => {
                        this.$router.push({ name: 'Pizzas' });
                    });
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