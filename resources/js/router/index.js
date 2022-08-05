
import { createRouter, createWebHistory } from "vue-router";
import * as icons from "../Helpers/sgvIcons";

const routes = [

    {
        path: "/",
        name: "home",
        component: () => import("../views/Main/Home.vue"),
        meta: { title: "Dashboard", menuName: "Dashboard", icon: icons.homeIcon },
    },
    {
        path: "/test",
        name: "test",
        component: () => import("../views/Test/index.vue"),
        meta: { title: "Test", menuName: "Test", icon: icons.homeIcon },
    },
    {
        path: "/test2",
        name: "test2",
        component: () => import("../views/Test/index.vue"),
        meta: { title: "Test2", menuName: "Test2", icon: icons.homeIcon },
    },
    {
        path: "/adminstrations",
        name: "adminstrations",
        meta: { title: "Adminstrations", menuName: "Adminstrations", icon: icons.homeIcon },
        children: [
            {
                path: "role",
                name: "role",
                component : () => import("../views/Permission/Role/index.vue"),
                meta : {menuName: "Role"}
            }
        ]
    },

];

const router = createRouter({
    history: createWebHistory(),
    routes,
});
const accessableRoutes = ["home", "test", "role", "child"];

let modifyRoutes = router.options.routes.filter((route) => {
    if(route.children && route.children.length > 0){
        route.children = route.children.filter((child) => {
            return accessableRoutes.includes(child.name);
        })
    };
    return accessableRoutes.includes(route.name) || (route.children && route.children.length > 0);
});

router.options.routes = modifyRoutes;

router.beforeEach((to, from, next) => {
    document.title = to.meta.title;
    next()
});

export default router;
