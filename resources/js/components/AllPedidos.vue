<template>
    <div>
        <h2 class="text-center">Listado de Pedidos</h2>
 
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Email Usuario</th>
                <th>Precio Final</th>
                <th>Hora de creación</th>
                <th>Hora de modificación</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="pedido in pedidos" :key="pedido.id">
                <td class="align-middle">{{ pedido.id }}</td>
                <td class="align-middle">{{ pedido.nombre_usuario }}</td>
                <td class="align-middle">{{ pedido.correo_usuario }}</td>
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
        beforeCreate() {
            this.axios
                .get('http://localhost:8000/api/pedidos/')
                .then(response => {                    
                    //Obtenemos nombre de los usuarios para mostrarlos
                    for (const pedido of response.data) {
                        pedido["nombre_usuario"] = "loading...";
                        let info = pedido
                        this.axios
                            .get('http://localhost:8000/api/usuarios/'+pedido.id_usuario)
                            .then(usuario => {
                                info["nombre_usuario"] = usuario.data.name;
                                info["correo_usuario"] = usuario.data.email
                            }).catch(error => console.log(error));
                        this.pedidos.push(info);
                    }
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

                let dateString = this.cleanTime(date.getHours())+":"+this.cleanTime(date.getMinutes())+" "+this.cleanTime(date.getDate())+"/"+this.cleanTime((date.getMonth()+1))+"/"+date.getFullYear();

                return dateString
            },
            cleanTime(time){ //Funcion para colocar 0 delante del tiempo cuando es un numero entre 0-9
                if( time < 10){
                    return "0"+time;
                }
                return time;
            }
            
        }
    }

    
</script>