<template>
    <div v-if="isAdmin()">
        <h2 class="text-center">Listado de Relaciones Pizzas e ingredientes</h2>
        <div class="text-center">
            <router-link to="/administrador/ingredientes_pizza/new" class="btn btn-primary my-4 py-2">Insertar nuevo ingrediente en Pizza</router-link>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Ingrediente</th>
                <th>Imagen Ingrediente</th>
                <th>Pizza</th>
                <th>Imagen Pizza</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="rel in rel_pi_ings">
                <td class="align-middle">{{ rel.id }}</td>
                <td class="align-middle">{{ rel.ingrediente.nombre }}</td>
                <td class="align-middle"><img :src="'../images/ingredientes/'+rel.ingrediente.imagen" alt="image" width="100" height="100" /></td>
                <td class="align-middle">{{ rel.pizza.nombre }}</td>
                <td class="align-middle"><img :src="'../images/pizzas/'+rel.pizza.imagen" alt="image" width="100" height="100" /></td>
                <td class="align-middle">
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'Editar_ingredientes_pizza', params: { id: rel.id }}" class="btn btn-success mx-1">Editar</router-link>
                        <button class="btn btn-danger" @click="deleteRel_Pi_Ing(rel.id)">Eliminar</button>
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
                rel_pi_ings: []
            }
        },
        beforeCreate() {

            this.axios
                .get('http://localhost:8000/api/ingredientes_pizza/')
                .then(response => {
                    let relaciones = response.data;
                    //Recorremos todas las relaciones devueltas por la api para darle un mejor formato y más legible para el usuario
                    for (const relacion of relaciones) {
                        let info = {"id":0,"pizza":"","ingrediente":""};
                        
                        //Insertamos id de la relacion:
                        info["id"] = relacion.id
                        //Obtenemos la pizza
                        this.axios
                            .get('http://localhost:8000/api/pizzas/'+relacion.id_pizza)
                            .then(r_pizza => {
                                info["pizza"] = r_pizza.data;
                            });
                        //Obtenemos el ingrediente asociado a esa pizza
                        this.axios
                            .get('http://localhost:8000/api/ingredientes/'+relacion.id_ingrediente)
                            .then(r_ingrediente => {
                                info["ingrediente"] = r_ingrediente.data;
                            });
                    //Finalmente añadimos nuestro array más completo al array de relaciones
                    this.rel_pi_ings.push(info);
                    console.log(info)
                    }
                
                })
                .catch(error => console.log(error));
        },
        methods: {
            deleteRel_Pi_Ing(id) { 
                if(confirm("¿Estás seguro de que quieres eliminar la relación con id "+id+"?")){

                this.axios
                    .delete(`http://localhost:8000/api/ingredientes_pizza/${id}`)
                    .then(response => {
                        let i = this.rel_pi_ings.map(data => data.id).indexOf(id);
                        this.rel_pi_ings.splice(i, 1)
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