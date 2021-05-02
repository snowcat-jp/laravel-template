import Vue from "vue";
import VueRouter from "vue-router";
 
Vue.use(VueRouter);
 
import top from "../components/top.vue";
import login from "../components/login.vue";
import about from "../components/about.vue";
 
const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "top",
            component: top,
            meta: { guestOnly: true }
        },
        {
            path: "/login",
            name: "login",
            component: login,
            meta: { guestOnly: true }
        },
        {
            path: "/about",
            name: "about",
            component: about,
            meta: { authOnly: true }
        }
    ]
});
 
function isLoggedIn() {
    return localStorage.getItem("auth");
}
 
router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.authOnly)) {
        if (!isLoggedIn()) {
            next("/login");
        } else {
            next();
        }
    } else if (to.matched.some(record => record.meta.guestOnly)) {
        if (isLoggedIn()) {
            next("/about");
        } else {
            next();
        }
    } else {
        next();
    }
});
 
export default router;