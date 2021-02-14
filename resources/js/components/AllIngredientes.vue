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
                <td>{{ ingrediente.id }}</td>
                <td>{{ ingrediente.nombre }}</td>
                <td>{{ ingrediente.imagen }}</td>
                <td>{{ ingrediente.precio_base }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: ingrediente.id }}" class="btn btn-success">Editar</router-link>
                        <button class="btn btn-danger" @click="deleteIngrediente(ingrediente.id)">Eliminar</button>
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
                });
        },
        methods: {
            deleteIngrediente(id) { 
                this.axios
                    .delete(`http://localhost:8000/api/ingredientes/${id}`)
                    .then(response => {
                        let i = this.ingredientes.map(data => data.id).indexOf(id);
                        this.ingredientes.splice(i, 1)
                    });
            }
        }
    }
</script>