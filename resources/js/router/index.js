import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Layout from '../components/Layout/Layout'
const Dashboard = () => import('../views/Dashboard.vue');
const Users = () => import('../views/pages/users/Users.vue');
const CreateUser = () => import('../views/pages/users/CreateUser.vue');

export default new VueRouter({
    routes: [
        {
            path: '/',
            component: Layout,
            children: [
                {
                    path: '/dashboard',
                    component: Dashboard,
                }
            ]
        },
        {
            path: '/users',
            component: Layout,
            children: [
                {
                    path: '/',
                    component: Users,
                },
                {
                    path: "create",
                    component: CreateUser
                }
            ]
        }
    ],
});