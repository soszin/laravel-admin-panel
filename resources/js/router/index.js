import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Layout from '../components/Layout/Layout'
const Dashboard = () => import('../views/Dashboard.vue');

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
        }
    ],
});