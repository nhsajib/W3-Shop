<template>

  <div class="content-wrapper d-flex align-items-center auth px-0" id="login-page">
    <div class="row w-100 mx-0">
      <div class="col-lg-4 mx-auto">
        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
          <div class="brand-logo">
          <!-- <img src="../../../../images/logo.svg" alt="logo"> -->
          </div>
          <h4>Hello! let's get started</h4>
          <h6 class="font-weight-light">Sign in to continue.</h6>
          <form class="pt-3" @submit.prevent="login">
            <div class="form-group">
              <input type="email" v-model="loginData.email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" required>
            </div>
            <div class="form-group">
              <input type="password" v-model="loginData.password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" required>
            </div>
            <div v-if="error" class="error-message">
              <p class="text-danger text-center font-weight-bold">{{ error }}</p>
            </div>
            <div class="mt-3">
              <button type="submit" class="btn btn-block btn-primary font-weight-medium auth-form-btn">SIGN IN</button>
            </div>
            <div class="my-2 d-flex justify-content-end align-items-center">
              <a href="#" class="text-black">Forgot password?</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->

</template>
<script>
export default {
  data(){
    return {
      loginData: {
        email: 'admin@admin.com',
        password: 'password',
      },

      error: '',
    }
  },

  methods: {

    login(){

      axios.post('/api/admin/login', this.loginData)
        .then(res=>{
          this.$store.commit('setAuthData', res.data);
          this.$router.push('/admin')
        })
        .catch(e=>{
          this.error = e.response.data.message;
          console.log(e);
        })
    }
  }
}
</script>
<style scoped>
    #login-page{
        position: fixed;
        z-index: 2500;
        height: 100%;
        width: 100%;
        top: 0;
        left: 0;
    }
    .error-message{
      padding: 0.5rem;
      background: #ff474730;
      border-radius: 4px;
      border-left: 2px solid #ff4747;
    }
    .error-message p {
      margin-bottom: 0;
    }
</style>