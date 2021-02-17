<template>
    <div>
        <h2 class="text-center">Listado de Ingredientes</h2>
        <div class="text-center"> 
            <router-link to="/ingredientes/new" class="btn btn-primary my-4 py-2">Crear ingrediente</router-link>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Categoría</th>
                <th class="text-center">Imagen</th>
                <th class="text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="ingrediente in ingredientes" :key="ingrediente.id">
                <td class="align-middle text-center">{{ ingrediente.id }}</td>
                <td class="align-middle text-center">{{ ingrediente.nombre }}</td>
                <td class="align-middle text-center">{{ ingrediente.categoria }}</td>
                <td class="align-middle text-center"><img :src="'images/ingredientes/'+ingrediente.imagen" alt="image" width="100" height="100" /></td>
                <td class="align-middle text-center">
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'Editar_ingrediente', params: { id: ingrediente.id }}" class="btn btn-success mx-1">Editar</router-link>
                        <button class="btn btn-danger mx-2" @click="deleteIngrediente(ingrediente.id)">Eliminar</button>
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
                ingredientes: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/ingredientes/')
                .then(response => {
                    this.ingredientes = response.data;
                })
                .catch(error => console.log(error));
                
        },
        methods: {
            deleteIngredientes(id) { 
                if(confirm("¿Estás seguro de que quieres eliminar el ingrediente con id "+id+"?")){

                this.axios
                    .delete(`http://localhost:8000/api/ingredientes/${id}`)
                    .then(response => {
                        let i = this.ingredientes.map(data => data.id).indexOf(id);
                        this.ingredientes.splice(i, 1)
                })
                .catch(error => {
                    console.log(error);
                })
            }
        }}
    }
</script>