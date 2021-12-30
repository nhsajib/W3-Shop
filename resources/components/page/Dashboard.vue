<template>
    <div class="content-wrapper">
        <h1>Dashboard Page</h1>

        <h1 class="text-success" v-if="$store.getters.isAuthenticated">Authenticate User</h1>
    </div>
</template>
<script>
export default {
    data(){
        return {
            user: {},
        }
    },

    async mounted(){
        this.user = this.$store.getters.loggedInUser;

        console.log('dashbord user start');
        await axios.get('/api/admin/me')
        .then(res=>{
            console.log(res.data.id);
        })
        .catch(e=>{
            console.log(e.data);
        })
        console.log('dashboard user end');
    }
}
</script>