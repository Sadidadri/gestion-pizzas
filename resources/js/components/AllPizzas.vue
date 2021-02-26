<template>
    <div v-if="isAdmin()">
        <h2 class="text-center">Listado de Pizzas</h2>
        <div class="text-center"> 
            <router-link to="/administrador/pizzas/new" class="btn btn-primary my-4 py-2">Crear pizza</router-link>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Imagen</th>
                <th class="text-center">Precio Base</th>
                <th class="text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="pizza in pizzas" :key="pizza.id">
                <td class="align-middle text-center">{{ pizza.id }}</td>
                <td class="align-middle text-center">{{ pizza.nombre }}</td>
                <td class="align-middle text-center"><img :src="'../images/pizzas/'+pizza.imagen" alt="image" width="100" height="100" /></td>
                <td class="align-middle text-center">{{ pizza.precio_base }}</td>
                <td class="align-middle text-center">
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'Editar_pizza', params: { id: pizza.id }}" class="btn btn-success mx-1">Editar</router-link>
                        <button class="btn btn-danger mx-2" @click="deletePizza(pizza.id)">Eliminar</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                pizzas: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/pizzas/')
                .then(response => {
                    this.pizzas = response.data;
                })
                .catch(error => console.log(error));
                
        },
        methods: {
            deletePizza(id) { 
                if(confirm("¿Estás seguro de que quieres eliminar la pizza con id "+id+"?")){

                    this.axios
                        .delete(`http://localhost:8000/api/pizzas/${id}`)
                        .then(response => {
                            let i = this.pizzas.map(data => data.id).indexOf(id);
                            this.pizzas.splice(i, 1)
                    })
                    .catch(error => {
                        console.log(error);
                    });
                }
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