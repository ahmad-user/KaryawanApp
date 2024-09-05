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
          <h1 class="fw-bold">Contact us</h1>

        </div>
      </div>
    </div>
  </section>

  <main>
    <div class="container py-5">
      <div class="row g-5">
        <!-- Contact Information Block -->
        <div class="col-xl-6">
          <div class="row row-cols-md-2 g-4">
            <div class="aos-item" data-aos="fade-up" data-aos-delay="200">
              <div class="aos-item__inner">
                <div class="bg-light hvr-shutter-out-horizontal d-block p-3">
                  <div class="d-flex justify-content-start">
                    <i class="fa-solid fa-envelope h3 pe-2"></i>
                    <span class="h5">Email</span>
                  </div>
                  <span>afadilah162@gmail.com</span>
                </div>
              </div>
            </div>
            <div class="aos-item" data-aos="fade-up" data-aos-delay="400">
              <div class="aos-item__inner">
                <div class="bg-light hvr-shutter-out-horizontal d-block p-3">
                  <div class="d-flex justify-content-start">
                    <i class="fa-solid fa-phone h3 pe-2"></i>
                    <span class="h5">Phone</span>
                  </div>
                  <span>+6285311320870</span>
                </div>
              </div>
            </div>
          </div>
          <div class="aos-item mt-4" data-aos="fade-up" data-aos-delay="600">

          </div>
          <div class="aos-item" data-aos="fade-up" data-aos-delay="800">
            <div class="mt-4 w-100 aos-item__inner">
                <iframe class="hvr-shadow" width="100%" height="345" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1980.0353721349595!2d106.5993345!3d-6.1710333!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ff16d3e4b6ef%3A0xec4aaaedec159343!2sSekolah%20Menengah%20Pertama%20Negeri%2012%20Tangerang!5e0!3m2!1sen!2sid!4v1691755867658!5m2!1sen!2sid"></iframe>

            </div>
          </div>
        </div>

        <!-- Contact Form Block -->
        <div class="col-xl-6">
          <h2 class="pb-4">Leave a message</h2>
          <div class="row g-4">
            <div class="col-6 mb-3">
              <label for="exampleFormControlInput1" class="form-label">First Name</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" >
            </div>
            <div class="col-6 mb-3">
              <label for="exampleFormControlInput1" class="form-label">Last Name</label>
              <input type="text" class="form-control" id="exampleFormControlInput1">
            </div>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" >
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Phone</label>
            <input type="tel" class="form-control" id="exampleFormControlInput1" >
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Country</label>
            <select class="form-select" aria-label="Default select example">
              <option value="1">Indonesia</option>
              <option value="2">Non Indonesia</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Message</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          <button type="button" class="btn btn-dark" @click="sendMessage">Kirim</button>
        </div>
      </div>
    </div>
  </main>

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
      title: 'Contact Page',
      
  
  })
  
  </script>
  
  <style>
  
  </style>