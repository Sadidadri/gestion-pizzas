<template>
    <div>
        <h2 class="text-center">Listado de Ingredientes</h2>
 
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="ingrediente in ingredientes" :key="ingrediente.id">
                <td class="align-middle">{{ ingrediente.id }}</td>
                <td class="align-middle">{{ ingrediente.nombre }}</td>
                <td class="align-middle">{{ ingrediente.categoria }}</td>
                <td class="align-middle"><img :src="'images/ingredientes/'+ingrediente.imagen" alt="image" width="100" height="100" /></td>
                <td class="align-middle">
                    <div class="btn-group" role="group">
                        <!-- <router-link :to="{name: 'edit', params: { id: ingrediente.id }}" class="btn btn-success">Editar</router-link> -->
                        <button class="btn btn-danger" @click="deleteIngredientes(ingrediente.id)">Eliminar</button>
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