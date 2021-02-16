<template>
    <div>
        <h2 class="text-center">Listado de Pedidos</h2>
 
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Precio Final</th>
                <th>Hora de creación</th>
                <th>Hora de modificación</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="pedido in pedidos" :key="pedido.id">
                <td class="align-middle">{{ pedido.id }}</td>
                <td class="align-middle">{{ pedido.id_usuario }}</td>
                <td class="align-middle">{{ pedido.precio_final }}€</td>
                <td class="align-middle">{{ getDate(pedido.created_at) }}</td>
                <td class="align-middle">{{ getDate(pedido.updated_at) }}</td>
                <td class="align-middle">
                    <div class="btn-group" role="group">
                        <!-- <router-link :to="{name: 'edit', params: { id: pedido.id }}" class="btn btn-success">Editar</router-link> -->
                        <button class="btn btn-danger" @click="deletePedido(pedido.id)">Eliminar</button>
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
                pedidos: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/pedidos/')
                .then(response => {
                    this.pedidos = response.data;
                })
                .catch(error => console.log(error));
                
        },
        methods: {
            deletePedido(id) { 
                if(confirm("¿Estás seguro de que quieres eliminar el pedido con id "+id+"?")){

                this.axios
                    .delete(`http://localhost:8000/api/pedidos/${id}`)
                    .then(response => {
                        let i = this.pedidos.map(data => data.id).indexOf(id);
                        this.pedidos.splice(i, 1)
                })
                .catch(error => {
                    console.log(error);
                })
            }
                
            },
            getDate(datetime) {

                let date = new Date(datetime);

                let dateString = date.getHours()+":"+date.getMinutes()+" "+date.getDate()+"/"+(date.getMonth()+1)+"/"+date.getFullYear();

                return dateString
            }
        }
    }

    
</script>