import Produtos from '../views/Produtos.vue';
import SobreNos from '../views/Sobre-Nos.vue';
import {createRouter, createWebHistory} from "vue-router";

const routes = [
    {
        path: '/',
        name: 'produtos',
        component: Produtos
    },

    {
        path: '/spa/sobre_nos',
        name: 'sobre_nos',
        component: SobreNos
    },
];

const router = new createRouter({
    history: createWebHistory(),
    routes
});

export default router;