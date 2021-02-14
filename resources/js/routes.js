import AllPizzas from './components/AllPizzas.vue';
//import CreateProduct from './components/CreateProduct.vue';
//import EditProduct from './components/EditProduct.vue';
import AllIngredientes from './components/AllIngredientes.vue';
 
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
];