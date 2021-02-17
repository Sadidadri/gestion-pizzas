import AllPizzas from './components/AllPizzas.vue';
import CreatePizza from './components/CreatePizza.vue';
import EditPizza from './components/EditPizza.vue';

import AllIngredientes from './components/AllIngredientes.vue';
import CreateIngrediente from './components/CreateIngrediente.vue';
import EditIngrediente from './components/EditIngrediente.vue';

import AllPedidos from './components/AllPedidos.vue';
import AllRel_Pi_Ing from './components/AllRel_Pi_Ing.vue';
import AllRel_Pe_Piz from './components/AllRel_Pe_Piz.vue';
 
export const routes = [
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
    {
        name: 'Pedidos',
        path: '/pedidos',
        component: AllPedidos
    },
    {
        name: 'Ingredientes_Pizza',
        path: '/ingredientes_pizza',
        component: AllRel_Pi_Ing
    },
    {
        name: 'Pizzas_Pedido',
        path: '/pizzas_pedido',
        component: AllRel_Pe_Piz
    },
];