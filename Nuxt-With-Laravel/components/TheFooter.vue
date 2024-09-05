<template>
    <div>
      
      <nav class="navbar navbar-expand-lg bg-body-tertiary shadow">
        <div class="container">
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
              <li class="nav-item">
                <NuxtLink class="nav-link active" to="/admin">Home</NuxtLink>
              </li>
              <li class="nav-item">
                <NuxtLink class="nav-link active" to="/user">User</NuxtLink>
              </li>
              <li class="nav-item">
                <NuxtLink class="nav-link" to="/employee">Employee</NuxtLink>
              </li>
              <li class="nav-item logout-item" @click="sendMessage">
                <NuxtLink class="nav-link active" to="/" >Logout</NuxtLink>
              </li>
              
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </template>
   <script>
   export default {
   methods: {
       sendMessage() {
       alert('Berhasil Logout');
       }
   }
   };
 useHead({
 title: 'Contact Page',
 

})

</script>
  <style scoped>
  .logout-item {
    margin-left: auto;
  }
  </style>
  