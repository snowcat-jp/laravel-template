import Vue from "vue";
import VueRouter from "vue-router";
 
Vue.use(VueRouter);
 
import About from "../components/pages/common/About.vue";
import Top from "../components/pages/top/Top.vue";
import Login from "../components/pages/user/Login.vue";
import Register from "../components/pages/user/Register.vue";
import Mypage from "../components/pages/user/Mypage.vue";
 
const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "top",
            component: Top
        },
        {
            path: "/login",
            name: "login",
            component: Login,
            meta: { guestOnly: true }
        },
        {
            path: "/register",
            name: "register",
            component: Register,
            meta: { guestOnly: true }
        },
        {
            path: "/mypage",
            name: "mypage",
            component: Mypage,
            meta: { authOnly: true }
        },
        {
            path: "/about",
            name: "about",
            component: About
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