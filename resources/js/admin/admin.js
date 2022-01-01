require('./bootstrap');
import router from './router';
import store from './store'
require('./browserRefreshAuth');

Vue.component('index-component', require('../../components/index.vue').default);
Vue.component('nav-bar', require('../../components/partials/NavBar.vue').default);
Vue.component('footerx', require('../../components/partials/Footer.vue').default);
Vue.component('sidebar', require('../../components/partials/SideBar.vue').default);

const app = new Vue({
    el: '#app',
    router,
    store,
    created(){
        window.axios.defaults.headers.common['Authorization'] = 'Bearer '+this.$store.getters.getAccessToken;
        window.axios.interceptors.response.use(
            response => response,
            error => {
                if(error.response.status === 401){
                    this.$store.commit('clearAuthData');
                    this.$router.push('/admin/login')
                }
                return Promise.reject(error);
            }
        );
    },
});

