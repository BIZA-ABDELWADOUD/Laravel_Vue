
// import bootstrap.js
require('./bootstrap');

// import vue.js
window.Vue = require('vue');
// import vue router
import VueRouter from 'vue-router';
Vue.use(VueRouter);

Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('add-task', require('./components/AddTask.vue').default);
Vue.component('add-user', require('./components/AddUser.vue').default);
Vue.component('edit-task', require('./components/EditTask.vue').default);
Vue.component('edit-user', require('./components/EditUser.vue').default);


// import components
import home from './components/HelloComponent.vue';
import tasks from './components/TaskComponent.vue';
import users from './components/UserComponent.vue';

// define routes
const routes = [
    { path: '/home', component: home },
    { path: '/tasks', component: tasks },
    { path: '/users', component: users }
  ]

  const router = new VueRouter({
     mode: 'hash', //we can use also the history mode
    routes
  })


const app = new Vue({
    // mother div id
    el: '#app',
    // router to use is router
    router : router
});
