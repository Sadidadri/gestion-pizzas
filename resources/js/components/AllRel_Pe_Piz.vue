<template>
    <div>
        <h2 class="text-center">Listado de Relaciones Pedido y Pizzas</h2>
 
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>ID Pedido</th>
                <th>Solicitante del Pedido</th>
                <th>Fecha</th>
                <th>Pizza</th>
                <th>Cantidad</th>
                <th>Tamaño</th>
                <th>Masa</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="rel in rel_pe_pizs">
                <td class="align-middle">{{ rel.id }}</td>
                <td class="align-middle">{{ rel.pedido.id }}</td>
                <td class="align-middle">{{ rel.usuario }}</td>
                <td class="align-middle">{{ getDate(rel.pedido.created_at) }}</td>
                <td class="align-middle">{{ rel.pizza.nombre }}</td>
                <td class="align-middle">{{ rel.cantidad }}</td>
                <td class="align-middle">{{ rel.tamagno }}</td>
                <td class="align-middle">{{ rel.tipo_masa }}</td>
                <td class="align-middle">
                    <div class="btn-group" role="group">
                        <!-- <router-link :to="{name: 'edit', params: { id: rel.id }}" class="btn btn-success">Editar</router-link> -->
                        <button class="btn btn-danger" @click="deleteRel_Pe_Piz(rel.id)">Eliminar</button>
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
                rel_pe_pizs: []
            }
        },
        beforeCreate() {

            this.axios
                .get('http://localhost:8000/api/pizzas_pedido/')
                .then(response => {
                    let relaciones = response.data;
                    //Recorremos todas las relaciones devueltas por la api para darle un mejor formato y más legible para el usuario
                    for (const relacion of relaciones) {
                        let info = {"id":0,"pedido":{"id":0,"created_at":""},"pizza":{"nombre":""},"cantidad":0,"tamagno":"","tipo_masa":"","usuario":""};
                        
                        //Insertamos id de la relacion:
                        info["id"] = relacion.id
                        //Obtenemos informacion sobre el pedido
                        this.axios
                            .get('http://localhost:8000/api/pedidos/'+relacion.id_pedido)
                            .then(r_pedido => {
                                info["pedido"] = r_pedido.data;
                                //Añadimos info del usuario
                                this.axios
                                    .get('http://localhost:8000/api/usuarios/'+info["pedido"]["id_usuario"])
                                    .then( usuario => {
                                        info["usuario"] = usuario.data.name; 
                                });
                            });
                        //Obtenemos las pizzas asociadas a ese pedido
                        this.axios
                            .get('http://localhost:8000/api/pizzas/'+relacion.id_pizza)
                            .then(r_pizza => {
                                info["pizza"] = r_pizza.data;
                            });

                    //Completamos la informacion de la relacion:
                    info["cantidad"] = relacion.cantidad;
                    info["tamagno"] = relacion.tamagno;
                    info["tipo_masa"] = relacion.tipo_masa;

                    //Finalmente añadimos nuestro array más completo al array de relaciones
                    this.rel_pe_pizs.push(info);
                    }
                
                })
                .catch(error => console.log(error));

        },
        mounted(){
            console.log(this.rel_pe_pizs)
        },
        methods: {
            deleteRel_Pe_Piz(id) { 
                if(confirm("¿Estás seguro de que quieres eliminar la relacion de pizzas-pedido con id "+id+"?")){

                this.axios
                    .delete(`http://localhost:8000/api/pizzas_pedido/${id}`)
                    .then(response => {
                        let i = this.rel_pe_pizs.map(data => data.id).indexOf(id);
                        this.rel_pe_pizs.splice(i, 1)
                })
                .catch(error => {
                    console.log(error);
                });
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