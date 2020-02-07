/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');

import VueRouter from 'vue-router'
import {Form, HasError, AlertError} from 'vform';
import VueSweetalert2 from 'vue-sweetalert2';
import VueFormWizard from 'vue-form-wizard'
import 'vue-form-wizard/dist/vue-form-wizard.min.css'
window.Form = Form;

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
Vue.component('edit-main-profile', require('./components/myinfo/EditMainProfile.vue').default);
Vue.component('other-info', require('./components/myinfo/OtherInfo.vue').default);
Vue.component('employment-details', require('./components/myinfo/EmploymentDetails.vue').default);
Vue.component('trainings-seminars', require('./components/myinfo/TrainingsSeminars.vue').default);
Vue.component('government-ids', require('./components/myinfo/GovernmentIDs.vue').default);
Vue.component('upload-photo-modal', require('./components/myinfo/UploadPhotoModal.vue').default);
Vue.component('edit-other-info', require('./components/myinfo/EditOtherInfo.vue').default);
Vue.use(VueRouter)
Vue.use(VueSweetalert2);
Vue.use(VueFormWizard);


let routes = [
    {path: '/dashboard', component:require('./components/Dashboard.vue').default, meta: { middlewareAuth: true }},
    {path: '/myinfo', component:require('./components/myinfo/MyInfo.vue').default, meta: { middlewareAuth: true }}
]

const router = new VueRouter({
    mode: 'history',
    routes //short for routes
})
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
