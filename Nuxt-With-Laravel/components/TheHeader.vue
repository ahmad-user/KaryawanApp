<template>
    <div>
      <nav class="navbar navbar-expand-lg bg-body-tertiary shadow">
        <div class="container">
          <NuxtLink class="navbar-brand" top="/">Application</NuxtLink>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

              <li class="nav-item">
                <NuxtLink class="nav-link active" to="/">Home</NuxtLink>
              </li>
              <li class="nav-item">
                <NuxtLink class="nav-link" to="/about">About</NuxtLink>
              </li>
              <li class="nav-item">
                <NuxtLink class="nav-link" to="/contact">Contact</NuxtLink>
              </li>
              <li class="nav-item">
                <NuxtLink class="nav-link" to="/login">Login</NuxtLink>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </template>
  