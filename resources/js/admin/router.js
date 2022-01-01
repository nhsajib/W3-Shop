window.Vue = require('vue').default;
import VueRouter from "vue-router";
import store from './store';
Vue.use(VueRouter);

const routes = [
    { path: '/admin/login',
      component: require('../../components/page/Login.vue').default,
      meta:{
        title: 'Login',
        isAuth: false
      },
      beforeEnter: (to, from, next) => {
        if(store.getters.isAuthenticated){
          next({ path: '/admin'})
        }
        else next()
      }
    },
    { path: '/admin',
      component: require('../../components/page/Dashboard.vue').default,
      meta:{
        title: 'Dashboard',
        isAuth: true,
      },
    },
];

const router = new VueRouter({
    routes,
    mode: 'history',
});

router.beforeEach((to, from, next) => {
  if(to.meta.isAuth === true && store.getters.isAuthenticated === false){
    next({ path: '/admin/login' })
  }

  next();
});


export default router;