window.Vue = require('vue').default;
import VueRouter from "vue-router";
Vue.use(VueRouter);

const routes = [
    { path: '/admin/login',
      component: require('../../components/page/Login.vue').default,
      meta:{
        title: 'Login',
        isAuth: false
      },
    },
    { path: '/admin',
      component: require('../../components/page/Dashboard.vue').default,
      meta:{
        title: 'Dashboard',
        isAuth: false,
      },
    },
];

const router = new VueRouter({
    routes,
    mode: 'history',
});

export default router;