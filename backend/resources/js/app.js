require("./bootstrap");
 
window.Vue = require("vue");
 
import Vue from "vue";
import router from "./routes/router";
 
const app = new Vue({
    el: "#app",
    router: router
});
