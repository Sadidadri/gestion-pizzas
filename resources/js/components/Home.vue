<template>
    <div id="content">
        <cesta v-if="userIsLogged()" v-bind:pizzasCesta="this.pizzasPedidas" />
        <div id="imagenInicio">
            <h2 class="text-white lead">BIENVENIDO A ROLLPIZZA</h2>
        </div>

        <div id="pizzasContent">
            <h3 class="text-center my-5">Pide nuestras Pizzas</h3>
            <div id="pizzas">

                <div v-for="pizza in pizzas" class="card pizza-carta">
                    <img class="card-img-top pizza-imagen" :src="'images/pizzas/'+pizza.imagen" alt="Card image cap">
                    <form class="card-body">
                        <h4 class="card-title text-center mb-2">{{pizza.nombre}}</h4>
                        <p class="card-text">Precio: <b>{{pizza.precio_base}} €</b></p>
                        <p class="card-text">Ingredientes:</p>
                        <p class="card-text">Tamaño:</p>
                        <p> 
                            <input class="mx-2" data-tipo="pequegna" :id="'pequegna'+pizza.nombre" :name="'tamagno'+pizza.nombre" value="pequegna" v-on:click="calculatePrice(pizza.precio_base,$event)" type="radio" checked  ><label :for="'pequegna'+pizza.nombre">Pequeña</label>
                            <input class="mx-2" data-tipo="mediana" :id="'mediana'+pizza.nombre" :name="'tamagno'+pizza.nombre" value="mediana" v-on:click="calculatePrice(pizza.precio_base,$event)" type="radio"><label :for="'mediana'+pizza.nombre">Mediana</label>
                            <input class="mx-2" data-tipo="familiar" :id="'familiar'+pizza.nombre" :name="'tamagno'+pizza.nombre" value="familiar" v-on:click="calculatePrice(pizza.precio_base,$event)" type="radio"><label :for="'familiar'+pizza.nombre">Familiar</label>
                        </p>
                        <input name="nombrePizza" type="hidden" :value="pizza.nombre" readonly>
                        <input name="precioPizza" type="hidden" :value="pizza.precio_base" readonly>
                        <div class="text-center">
                            <a v-if="userIsLogged()" @click="addPizza($event)" type="submit" href="#" class="btn btn-primary">Pedir</a>
                            <p v-else>Para poder realizar un pedido, necesitas iniciar sesión.</p>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</template>
 
<script>
    import cesta from "./Cesta";
    export default {
        components: {
            cesta
        },
        data() {
            return {
                pizzas: {},
                rel_pi_ings: {},
                ingredientes: {},
                informacion: {},
                pizzasPedidas: [],
                newPizza:null
            }
        },
        created() {

            this.getPizzas();
            
        },
        mounted(){
            if (localStorage.getItem('pizzasPedidas')) {
                try {
                    this.pizzasPedidas = JSON.parse(localStorage.getItem('pizzasPedidas'));
                } catch(e) {
                    localStorage.removeItem('pizzasPedidas');
                }
            }
            //console.log(this.pizzasPedidas)
        },
        methods: {
            userIsLogged(){
                return this.$parent.userIsLogged();
            },
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
            },
            calculatePrice(precioPizza,event){
                let inputTamagno = event.target;
                let tamagno = inputTamagno.getAttribute("data-tipo");
                let precio_final = parseFloat(precioPizza);
                let precioTag = $(inputTamagno).parent().prev().prev().prev().children();
                let precioInput = $(inputTamagno).parent().next().next();

                //Segun el tamagno modificamos el precio
                if (tamagno == "mediana"){
                    precio_final += 4;
                }else if (tamagno == "familiar"){
                    precio_final += 7;
                }

                precioTag.text(precio_final.toFixed(2)+" €");
                precioInput.val(precio_final.toFixed(2));

            },
            addPizza(event) {
                event.preventDefault();
                //Primero obtenemos los valores del formulario, en este caso, la pizza seleccionada, su tamaño y precio
                
                //Buscamos el formulario que el usuario clickó:
                let boton = event.target; 
                let $form = $(boton).parent().parent();
                //Recopilamos la información que nos envía
                let formValues = $form.serializeArray();
                let nombrePizza = formValues[1].value;
                let precioPizza = formValues[2].value;
                let tamagnoPizza = formValues[0].value;
                //Implementar más tarde validación:


                //Enviamos esta información a la Cesta
                let pizzaSolicitada = {nombre:nombrePizza,tamagno:tamagnoPizza,precio:precioPizza};
                this.pizzasPedidas.push(pizzaSolicitada);
                this.savePizzas();
            },
            removePizza(x) {
                let index = this.pizzasPedidas.indexOf(x);
                this.pizzasPedidas.splice(index, 1);
                this.savePizzas();
            },
            savePizzas() {
                const parsed = JSON.stringify(this.pizzasPedidas);
                localStorage.setItem('pizzasPedidas', parsed);
            },
            realizarPedido(){
                //Recorremos los items de la cesta
                //for (let pizza of this.pizzasPedidas) {
                //    
                //}

                //Creamos ticket del pedido que enviaremos a la API:
                let newPedido = {"id_usuario":localStorage.getItem("userID"),"precio_final":localStorage.getItem("precioPedido")};
                this.axios
                    .post('http://localhost:8000/api/pedidos', newPedido)
                    .then(response => (
                        //Aqui mover a la vista de pedido realizado
                        console.log(response)
                        //this.$router.push({ name: 'Pizzas' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false);
                //Borramos los items de la cesta y el precio del pedido
                localStorage.removeItem('pizzasPedidas');
                localStorage.removeItem('precioPedido');
                this.pizzasPedidas = []
            }
        }
            
    }
</script>