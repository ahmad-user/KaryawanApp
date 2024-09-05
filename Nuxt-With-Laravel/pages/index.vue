<template>
  <TheHeader />
 <div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./images/pertama.jpg" class="d-block w-100" style="height: 630px;">
      <div class="carousel-caption d-none d-md-block">
        <h5>Write</h5>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./images/kedua.jpg" class="d-block w-100"  style="height: 600px;">
      <div class="carousel-caption d-none d-md-block">
        <h5>Problem Solving</h5>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./images/ketiga.jpg" class="d-block w-100"  style="height: 600px;">
      <div class="carousel-caption d-none d-md-block">
        <h5>programming language</h5>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    </template>
    
    <script setup lang="ts">
        useHead({
        title: 'Home Page',
    
    })
    
    </script>
    
    <style>
    
    </style>