<template>
    <div>
      <TheHeader />
    <header id="site-header">
    
      <!-- Offcanvas Block -->
      <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
        <div class="container pt-5">
          <div class="offcanvas-header">
            <h2 class="fw-bold pb-3">Search here</h2>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <form class="position-relative" action="#" method="post">
              <input type="tel" class="form-control" id="exampleFormControlInput1" placeholder="Examples: posts, services,..">
              <button class="position-absolute top-0 end-0 border-0 bg-transparent py-2 pe-2 text-secondary" type="submit" name="search"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
          </div>
        </div>
      </div>
    </header>
  
    <!-- Breadcrumb Block -->
    <section class="mt-5">
      <div class="bg-light py-5">
        <div class="container">
          <div class="d-flex justify-content-between">
            <h1 class="fw-bold">About us</h1>
          </div>
        </div>
      </div>
    </section>
    <div class=" justify-content-center align-items-center vh-100">
    <div class="text-center">
        <p class="display-3 fw-bold">
            Hello, I'm M. Fadli
        </p>
        <p class="lead">
            I am a Fullstack developer I have expertise in developing web applications<br /> from front-end to back-end, 
            with great attention to detail and performance.<br /> If you need a developer who can turn 
            your ideas into cool<br /> digital products, I'm ready to help you!
        </p>
    </div>
</div>
    </div>
    </template>
    
    <script>
          export default {
          methods: {
              sendMessage() {
              alert('Berhasil Disimpan');
              }
          }
          };
        useHead({
        title: 'About Page',
        
    
    })
    
    </script>
    
    <style>
    
    </style>