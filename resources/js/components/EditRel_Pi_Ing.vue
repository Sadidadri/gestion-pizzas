<template>
    <div>
        <h3 class="text-center">Editar ingrediente asociado a una Pizza</h3>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form @submit.prevent="updateIngrediente">
                    <div class="form-group">
                        <label>Ingrediente</label>
                        <select class="form-control" v-model="relacion.id_ingrediente">
                            <option v-for="ingrediente in ingredientes" :value="ingrediente.id">{{ingrediente.nombre}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Pizza</label>
                        <select class="form-control" v-model="relacion.id_pizza">
                            <option v-for="pizza in pizzas" :value="pizza.id">{{pizza.nombre}}</option>
                        </select>
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
                relacion: {},
                pizzas: {},
                ingredientes: {}
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/ingredientes_pizza/${this.$route.params.id}`)
                .then((res) => {
                    this.relacion = res.data;
                });
            this.loadPizzas();
            this.loadIngredientes();

        },
        methods: {
            updateIngrediente() {
                this.axios
                    .patch(`http://localhost:8000/api/ingredientes_pizza/${this.$route.params.id}`, this.relacion)
                    .then((res) => {
                        this.$router.push({ name: 'Ingredientes_Pizza' });
                    });
            },
            loadIngredientes(){
                 this.axios
                .get('http://localhost:8000/api/ingredientes/')
                .then(response => {
                    this.ingredientes = response.data;
                })
                .catch(error => console.log(error));
            },
            loadPizzas(){
                 this.axios
                .get('http://localhost:8000/api/pizzas/')
                .then(response => {
                    this.pizzas = response.data;
                })
                .catch(error => console.log(error));
            }
        }
    }
</script>