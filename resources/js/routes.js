import AllPizzas from './components/AllPizzas.vue';
import CreatePizza from './components/CreatePizza.vue';
import EditPizza from './components/EditPizza.vue';

import AllIngredientes from './components/AllIngredientes.vue';
import CreateIngrediente from './components/CreateIngrediente.vue';
import EditIngrediente from './components/EditIngrediente.vue';

import AllPedidos from './components/AllPedidos.vue';


import AllRel_Pi_Ing from './components/AllRel_Pi_Ing.vue';
import CreateRel_Pi_Ing from './components/CreateRel_Pi_Ing.vue';
import EditRel_Pi_Ing from './components/EditRel_Pi_Ing.vue';

import AllRel_Pe_Piz from './components/AllRel_Pe_Piz.vue';
 
export const routes = [
    //CRUD Pizzas
    {
        name: 'Pizzas',
        path: '/pizzas',
        component: AllPizzas
    },
    {
        name: 'Create_pizza',
        path: '/pizzas/new',
        component: CreatePizza
    },
    {
        name: 'Editar_pizza',
        path: '/pizzas/:id/edit',
        component: EditPizza
    },
    //CRUD Ingredientes
    {
        name: 'Ingredientes',
        path: '/ingredientes',
        component: AllIngredientes
    },
    {
        name: 'Create_ingrediente',
        path: '/ingredientes/new',
        component: CreateIngrediente
    },
    {
        name: 'Editar_ingrediente',
        path: '/ingredientes/:id/edit',
        component: EditIngrediente
    },
    //CRUD Pedidos
    {
        name: 'Pedidos',
        path: '/pedidos',
        component: AllPedidos
    },
    //CRUD Ingredientes asociados a las pizzas
    {
        name: 'Ingredientes_Pizza',
        path: '/ingredientes_pizza',
        component: AllRel_Pi_Ing
    },
    {
        name: 'Create_ingrediente_pizza',
        path: '/ingredientes_pizza/new',
        component: CreateRel_Pi_Ing
    },
    {
        name: 'Editar_ingredientes_pizza',
        path: '/ingredientes_pizza/:id/edit',
        component: EditRel_Pi_Ing
    },
    //CRUD Pizzas asociadas a un pedido
    {
        name: 'Pizzas_Pedido',
        path: '/pizzas_pedido',
        component: AllRel_Pe_Piz
    },
];