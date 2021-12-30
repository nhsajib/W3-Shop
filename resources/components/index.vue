<template>

  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav-bar/>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

      <!-- partial:partials/_sidebar.html -->
       <sidebar/>
      <!-- partial -->
      <div class="main-panel">
        <router-view></router-view>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footerx/>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

</template>