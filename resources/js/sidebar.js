import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from './components/App'
import MyInfo from './components/MyInfo'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/dashboard', //home
            name: 'dashboard',
            component: Dashboard,
            props: { title: "This is the SPA home" }
        },
        {
            path: '/myinfo', //spa-page
            name: 'myinfo', // page
            component: MyInfo, //page
            props: { 
                title: "This is the SPA Second Page",
                author : {
                    name : "Fisayo Afolayan",
                    role : "Software Engineer",
                    code : "Always keep it clean"
                }
            }
        },    
    ],
})
const app = new Vue({
    el: '#app',
    components: { App },
    router,
});