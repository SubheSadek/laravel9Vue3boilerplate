
import { createRouter, createWebHistory } from "vue-router";
import * as icons from "../Helpers/sgvIcons"
const routes = [

    {
        path: "/",
        name: "home",
        component: () => import("../views/Main/Home.vue"),
        meta: { title: "Dashboard", menuName: "Dashboard", icon: icons.homeIcon, requiresAuth: true, menubar: true },
    },
    {
        path: "/roles",
        name: "roles",
        component: () => import("../views/Permission/Role/index.vue"),
        meta: { title: "Admin Role", menuName: "Admin Role", icon: icons.homeIcon, requiresAuth: true, menubar: true },
    },

];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    document.title = to.meta.title;
    next();
});

export default router;
