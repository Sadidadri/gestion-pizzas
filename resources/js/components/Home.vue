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
                        <p data-p="precio" class="card-text">Precio: <b>{{pizza.precio_base}} €</b></p>
                        <p class="card-text ingredientes">Ingredientes: {{formatIngredientes(pizza.ingredientes)}}</p>
                        <p class="card-text"><label for="cantidad">Cantidad: </label><select name="cantidad" @change="calculatePrice(pizza.precio_base,$event)"><option value=1>1</option><option value=2>2</option><option value=3>3</option><option value=4>4</option><option value=5>5</option><option value=6>6</option><option value=7>7</option><option value=8>8</option><option value=9>9</option></select></p>
                        <p class="card-text">Tamaño:</p>
                        <p class="tamagnos"> 
                            <input class="mx-2" data-tipo="pequegna" :id="'pequegna'+pizza.nombre" :name="'tamagno'+pizza.nombre" value="pequegna" v-on:click="calculatePrice(pizza.precio_base,$event)" type="radio" checked  ><label :for="'pequegna'+pizza.nombre">Pequeña</label>
                            <input class="mx-2" data-tipo="mediana" :id="'mediana'+pizza.nombre" :name="'tamagno'+pizza.nombre" value="mediana" v-on:click="calculatePrice(pizza.precio_base,$event)" type="radio"><label :for="'mediana'+pizza.nombre">Mediana</label>
                            <input class="mx-2" data-tipo="familiar" :id="'familiar'+pizza.nombre" :name="'tamagno'+pizza.nombre" value="familiar" v-on:click="calculatePrice(pizza.precio_base,$event)" type="radio"><label :for="'familiar'+pizza.nombre">Familiar</label>
                        </p>
                        <input name="nombrePizza" type="hidden" :value="pizza.nombre" readonly>
                        <input name="precioPizza" type="hidden" :value="pizza.precio_base" readonly>
                        <input name="idPizza" type="hidden" :value="pizza.id" readonly>
                        <div class="text-center">
                            <a v-if="userIsLogged()" @click="addPizza($event)" v-on:click="calculatePrice(pizza.precio_base,$event)" type="submit" href="#" class="btn btn-primary">Añadir</a>
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
                pizzas: [],
                ingredientes: {},
                pizzasPedidas: [],
                newPizza:null,
                cleanIngredientes:false,
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


        
        },
        updated(){

            
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
            formatIngredientes(ingredientes){ //Para darle buen formato a los ingredientes a la hora de mostrarlos
                let cadena_ingredientes = "";

                for (let ingrediente of ingredientes) {
                    cadena_ingredientes += ingrediente["nombre"]+", ";
                }

                return cadena_ingredientes.substring(0,cadena_ingredientes.length-2);
            },
            calculatePrice(precioPizza,event){
                //Para poder actualizar el precio segun cambie un input, vamos a buscar primero al formulario mediante el event target
                let $inputSeleccionado = $(event.target);
                let $form = $inputSeleccionado.parent().parent();
                //Una vez con el formulario, obtenemos la informacion necesaria de sus elementos hijos
                let $pTamagno = $form.find("p[class=tamagnos]");
                let inputTamagno = $pTamagno.find("input:checked");
                let tamagno = inputTamagno.val();
                let precio_final = parseFloat(precioPizza);
                let precioTag = $form.find("p[data-p=precio]").children();
                let precioInput = $form.find("input[name=precioPizza]");
                let cantidad = $form.find("select[name=cantidad]").val();

                //Segun el tamagno modificamos el precio
                if (tamagno == "mediana"){
                    precio_final += 4;
                }else if (tamagno == "familiar"){
                    precio_final += 7;
                }

                precio_final = precio_final * cantidad;

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
                let nombrePizza = formValues[2].value;
                let precioPizza = formValues[3].value;
                let idPizza = formValues[4].value;
                let tamagnoPizza = formValues[1].value;
                let cantidadPizza = formValues[0].value;
                //Implementar más tarde validación:


                //Enviamos esta información a la Cesta
                let pizzaSolicitada = {id:idPizza,nombre:nombrePizza,cantidad:cantidadPizza,tamagno:tamagnoPizza,precio:precioPizza};
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
            async callApiPedidos(newPedido){
                
                let resPedidoID = 0

                //Primero realizamos un Post con la informacion del pedido
                const pedidoEnviado = await this.axios
                    .post('http://localhost:8000/api/pedidos', newPedido)
                    .then(response => (
                        resPedidoID = response.data.id
                    ))
                    .catch(err => console.log(err))


                let contenidoPedidoMail = {"user":localStorage.getItem("userMail"),"pizzas":[],"precio_final":newPedido["precio_final"]};

                //Recorremos los items de la cesta y lo añadimos a la relacion del pedido
                for (let pizza of this.pizzasPedidas) {
                    //Aqui creamos la estructura del mail que mandaremos despues:
                    let lineaPedido = pizza.cantidad+"x - "+pizza.nombre+" - "+pizza.tamagno+" - "+pizza.precio+"€";
                    contenidoPedidoMail["pizzas"].push(lineaPedido);

                    //Aqui actualizamos nuestra BD con la info recibida del pedido
                    let newRelPePiz = {"id_pedido":resPedidoID,"id_pizza":pizza.id,"cantidad":pizza.cantidad,"tamagno":pizza.tamagno,"tipo_masa":"Clasica"};
                    const pizza_pedidoEnviada = await this.axios
                    .post('http://localhost:8000/api/pizzas_pedido', newRelPePiz)
                    .then(response => (
                        console.log(response)
                    ))
                    .catch(err => console.log(err))
                }


                //Enviamos nuestra informacion al gestor de mails de laravel
                this.axios
                    .post('http://localhost:8000/api/pizzas_pedido/send_mail', contenidoPedidoMail)
                    .then(response => (
                        console.log(response)
                    ))
                    .catch(err => console.log(err))

            },
            async realizarPedido(event){
                event.preventDefault();
                
                //Creamos ticket del pedido que enviaremos a la API:
                let newPedido = {"id_usuario":localStorage.getItem("userID"),"precio_final":localStorage.getItem("precioPedido")};
                await this.callApiPedidos(newPedido);

                //Borramos los items de la cesta y el precio del pedido
                localStorage.removeItem('pizzasPedidas');
                localStorage.removeItem('precioPedido');
                this.pizzasPedidas = []

                window.alert("¡Su pedido ha sido realizado con éxito! Le enviamos un email con toda la información :)");
            }
        }
            
    }
</script>