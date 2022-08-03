
import { createRouter, createWebHistory } from "vue-router";

const routes = [

    {
        path: "/",
        name: "home",
        component: () => import("../views/pages/Home.vue"),
        meta: { title: "Dashboard" },
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
