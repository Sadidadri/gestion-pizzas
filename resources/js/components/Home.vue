<template>
    <div id="content">
        <cesta/>
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
                            <input class="mx-2" data-tipo="grande" :id="'grande'+pizza.nombre" :name="'tamagno'+pizza.nombre" value="grande" v-on:click="calculatePrice(pizza.precio_base,$event)" type="radio"><label :for="'grande'+pizza.nombre">Familiar</label>
                        </p>
                        <input name="nombrePizza" type="hidden" :value="pizza.nombre" readonly>
                        <input name="precioPizza" type="hidden" :value="pizza.precio_base" readonly>
                        <div class="text-center">
                            <a @click="addPizza($event)" type="submit" href="#" class="btn btn-primary">Pedir</a>
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
                    console.log(localStorage.getItem('pizzasPedidas'));
                } catch(e) {
                    localStorage.removeItem('pizzasPedidas');
                }
            }
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
                }else if (tamagno == "grande"){
                    precio_final += 7;
                }

                precioTag.text(precio_final.toFixed(2)+" €");
                precioInput.val(precio_final.toFixed(2));

            },
            addPizza(event) {
                //Primero obtenemos los valores del formulario, en este caso, la pizza seleccionada, su tamaño y precio
                
                //Buscamos el formulario que el usuario clickó:
                let boton = event.target; 
                let $form = $(boton).parent().parent();
                //Recopilamos la información que nos envía
                console.log($form.serializeArray());


                event.preventDefault();
                if (!this.newPizza) {
                    return;
                }
                this.pizzasPedidas.push(this.newPizza);
                this.newPizza = '';
                this.savePizzas();
            },
            removePizza(x) {
                this.pizzasPedidas.splice(x, 1);
                this.savePizzas();
            },
            savePizzas() {
                const parsed = JSON.stringify(this.pizzasPedidas);
                localStorage.setItem('pizzasPedidas', parsed);
            }
        }
            
    }
</script>