import AllPizzas from './components/AllPizzas.vue';
//import CreateProduct from './components/CreateProduct.vue';
//import EditProduct from './components/EditProduct.vue';
import AllIngredientes from './components/AllIngredientes.vue';
import AllPedidos from './components/AllPedidos.vue';
import AllRel_Pi_Ing from './components/AllRel_Pi_Ing.vue';
import AllRel_Pe_Piz from './components/AllRel_Pe_Piz.vue';
 
export const routes = [
    {
        name: 'Pizzas',
        path: '/pizzas',
        component: AllPizzas
    },
    //{
    //    name: 'create',
    //    path: '/create',
    //    component: CreateProduct
    //},
    //{
    //    name: 'edit',
    //    path: '/edit/:id',
    //    component: EditProduct
    //}
    {
        name: 'Ingredientes',
        path: '/ingredientes',
        component: AllIngredientes
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