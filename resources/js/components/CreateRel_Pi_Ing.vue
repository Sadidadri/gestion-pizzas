<template>
    <div v-if="isAdmin()">
        <h3 class="text-center">Insertar nuevo ingrediente en una pizza</h3>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form @submit.prevent="addIngrediente">
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
                relacion: {},
                ingredientes: {},
                pizzas: {},
                ingrediente: "",
                pizza: ""
            }
        },
        methods: {
            addIngrediente() {
                this.axios
                    .post('http://localhost:8000/api/ingredientes_pizza', this.relacion)
                    .then(response => (
                        this.$router.push({ name: 'Ingredientes_Pizza' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }
            ,
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
            },
            isAdmin(){
                if (localStorage.getItem('userLogged')){
                    if(localStorage.getItem('userRole') === "admin"){
                    return true;
                    }
                }
                    return false;
                }
        },
        created() {
            
            //Cargamos tanto pizzas como ingredientes en nuestra variable de datos
            this.loadPizzas();
            this.loadIngredientes();
                
        }
    }
</script>