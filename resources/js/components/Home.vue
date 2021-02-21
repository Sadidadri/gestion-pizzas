<template>
    <div id="content">
        <div id="imagenInicio">
            <h2 class="text-white lead">BIENVENIDO A ROLLPIZZA</h2>
        </div>

        <div id="pizzasContent">
            <h3 class="text-center my-5">Nuestras Pizzas</h3>
            <div id="pizzas">

                <div v-for="pizza in pizzas" class="card pizza-carta">
                    <img class="card-img-top pizza-imagen" :src="'images/pizzas/'+pizza.imagen" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title text-center mb-2">{{pizza.nombre}}</h4>
                        <p class="card-text">Precio: <b>{{pizza.precio_base}} €</b></p>
                        <p class="card-text">Ingredientes:</p>
                        <p class="card-text">Tamaño:</p>
                        <p> 
                            <input class="mx-2" :id="'pequegna'+pizza.nombre" :name="'tamagno'+pizza.nombre" type="radio"><label :for="'pequegna'+pizza.nombre">Pequeña</label>
                            <input class="mx-2" :id="'mediana'+pizza.nombre" :name="'tamagno'+pizza.nombre" type="radio"><label :for="'mediana'+pizza.nombre">Mediana</label>
                            <input class="mx-2" :id="'grande'+pizza.nombre" :name="'tamagno'+pizza.nombre" type="radio"><label :for="'grande'+pizza.nombre">Grande</label>
                        </p>
                        <div class="text-center">
                            <a href="#" class="btn btn-primary">Pedir</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                pizzas: {},
                rel_pi_ings: {},
                ingredientes: {},
                informacion: {}
            }
        },
        created() {

            this.getPizzas();
            
        },
        mounted(){

        },
        methods: {
            getPizzas(){
                this.axios
                .get('http://localhost:8000/api/pizzas/')
                .then(response => {
                    this.pizzas = response.data;
                })
                .catch(error => console.log(error));
            },
            getPizzaById (id) {
            return axios.get('/names/?ids=' + id)
                .then(response => {
                    this.response = response.data
                    return this.response[0].name
                })
            }
        }
            
    }
</script>