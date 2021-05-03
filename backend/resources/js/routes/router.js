import Vue from "vue";
import VueRouter from "vue-router";
 
Vue.use(VueRouter);
 
import About from "../components/pages/common/About.vue";
import Top from "../components/pages/top/Top.vue";
import Login from "../components/pages/user/Login.vue";
 
const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "top",
            component: Top,
            meta: { guestOnly: true }
        },
        {
            path: "/login",
            name: "login",
            component: Login,
            meta: { guestOnly: true }
        },
        {
            path: "/about",
            name: "about",
            component: About,
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