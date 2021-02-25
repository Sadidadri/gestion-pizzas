import Home from './components/Home.vue';
import Login from './components/Login.vue';
import Logout from './components/Logout.vue';
import Register from './components/Register.vue';
import RegisterComplete from './components/RegisterComplete.vue';


//Vista Administrador
import Admin from './components/Admin.vue';
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
 

  
import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);


const guest = (to, from, next) => {
    if (!localStorage.getItem("authToken")) {
      return next();
    } else {
      return next("/");
    }
  };

  const auth = (to, from, next) => {
    if (localStorage.getItem("authToken")) {
      return next();
    } else {
      return next("/login");
    }
  };


export const routes = [
    //Vista Principal Home/Inicio
    {
        name: 'Home',
        path: '/',
        component: Home
    },
    {
        name: 'Login',
        path: '/login',
        beforeEnter: guest,
        component: Login
    },
    {
      name: 'Logout',
      path: '/logout',
      component: Logout
    },
    {
        path: "/register",
        name: "Register",
        beforeEnter: guest,
        component: Register
      },
      {
        path: "/register/complete",
        name: "RegisterComplete",
        beforeEnter: guest,
        component: RegisterComplete
      },

    //Dashboard Admin
    {
      path: "/admin",
      name: "Admin",
      beforeEnter: auth,
      props: true,
      component: Admin
    },
    //CRUD Pizzas
    {
        name: 'Pizzas',
        path: '/admin/pizzas',
        component: AllPizzas
    },
    {
        name: 'Create_pizza',
        path: '/admin/pizzas/new',
        component: CreatePizza
    },
    {
        name: 'Editar_pizza',
        path: '/admin/pizzas/:id/edit',
        component: EditPizza
    },
    //CRUD Ingredientes
    {
        name: 'Ingredientes',
        path: '/admin/ingredientes',
        component: AllIngredientes
    },
    {
        name: 'Create_ingrediente',
        path: '/admin/ingredientes/new',
        component: CreateIngrediente
    },
    {
        name: 'Editar_ingrediente',
        path: '/admin/ingredientes/:id/edit',
        component: EditIngrediente
    },
    //CRUD Pedidos
    {
        name: 'Pedidos',
        path: '/admin/pedidos',
        component: AllPedidos
    },
    //CRUD Ingredientes asociados a las pizzas
    {
        name: 'Ingredientes_Pizza',
        path: '/admin/ingredientes_pizza',
        component: AllRel_Pi_Ing
    },
    {
        name: 'Create_ingrediente_pizza',
        path: '/admin/ingredientes_pizza/new',
        component: CreateRel_Pi_Ing
    },
    {
        name: 'Editar_ingredientes_pizza',
        path: '/admin/ingredientes_pizza/:id/edit',
        component: EditRel_Pi_Ing
    },
    //CRUD Pizzas asociadas a un pedido
    {
        name: 'Pizzas_Pedido',
        path: '/admin/pizzas_pedido',
        component: AllRel_Pe_Piz
    },
];