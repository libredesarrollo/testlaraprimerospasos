import { createWebHistory, createRouter } from "vue-router";

import List from './components/List';
import Save from './components/Save';

export const routes = [
    {
        name: 'list',
        path: '/vue',
        component: List
    },
    {
        name: 'save',
        path: '/vue/save/:slug?',
        component: Save
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;