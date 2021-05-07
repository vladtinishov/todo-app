require('./bootstrap');

window.Vue = require('vue').default;

// регистрация компонента
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);


//импорт компонента
import App from './components/App.vue'
import Create from './components/CreateTodo.vue'
import Single from './components/SingleTodo.vue'
import VueRouter from 'vue-router'
import Vue from 'vue';
Vue.use(VueRouter)
const routes = [
    { path: '/', component: App },
    { path: '/create', component: Create},
    { path: '/single/:id', component: Single },
]

const router = new VueRouter({
    routes
})
const app = new Vue({
    
    // метод рендера объекта
    // render: h => h(App),
    router,
})
// рендер компонента в тег #app
.$mount('#app');
