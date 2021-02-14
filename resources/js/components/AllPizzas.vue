<template>
    <div>
        <h2 class="text-center">Listado de Pizzas</h2>
 
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Precio Base</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="pizza in pizzas" :key="pizza.id">
                <td>{{ pizza.id }}</td>
                <td>{{ pizza.nombre }}</td>
                <td>{{ pizza.imagen }}</td>
                <td>{{ pizza.precio_base }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: pizza.id }}" class="btn btn-success">Editar</router-link>
                        <button class="btn btn-danger" @click="deletePizza(pizza.id)">Eliminar</button>
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
                });
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
        }}
    }
</script>