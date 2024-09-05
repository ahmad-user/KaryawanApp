<template>
  <div>
    <TheHeader />
    <div class="card">
      <div class="card-body">
        <div v-if="isLoading">
          <Loading :title="isLoadingTitle" />
        </div>
        <div v-else>
          <form @submit.prevent="saveLogin">
            <section class="vh-100" style="background-color: #508bfc;">
              <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                  <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                      <div class="card-body p-5 text-center">
                        <h3 class="mb-5">Sign in</h3>

                        <div class="form-outline mb-4">
                          <input v-model="email" type="email" class="form-control form-control-lg" placeholder="Email" />
                        </div>

                        <div class="form-outline mb-4">
                          <input v-model="password" type="password" class="form-control form-control-lg" placeholder="Password" />
                        </div>

                        <!-- Checkbox -->
                        <div class="form-check d-flex justify-content-start mb-4">
                          <input v-model="remember" class="form-check-input" type="checkbox" id="rememberMe" />
                          <label class="form-check-label" for="rememberMe">&nbsp; Remember password </label>
                        </div>

                        <button class="btn btn-primary btn-lg btn-block" type="submit">
                          Login
                        </button>
                        <br><br>
                        Belum punya akun? <NuxtLink to="/register">Daftar Disini</NuxtLink>

                        <!-- Menampilkan daftar kesalahan -->
                        <div v-if="errorList.length" class="mt-3">
                          <ul>
                            <li v-for="(error, index) in errorList" :key="index" class="text-danger">
                              {{ error }}
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
export default {
  data() {
    return {
      email: '',
      password: '',
      remember: false,
      isLoading: false,
      isLoadingTitle: 'Loading',
      errorList: []
    };
  },
  methods: {
  async saveLogin() {
    this.isLoading = true;
    this.isLoadingTitle = 'Saving';

    try {
      const response = await axios.post('http://localhost:8000/api/login', {
        email: this.email,
        password: this.password
      });

      console.log('Response Data:', response.data);

      if (response.data && response.data.data && response.data.data.token) {
        console.log('Login Successful:', response.data);
        alert(response.data.message);

        this.email = '';
        this.password = '';

        localStorage.setItem('token', response.data.data.token);
        console.log('Stored Token:', localStorage.getItem('token'));

        this.$router.push('/admin');
      } else {
        console.error('Unexpected response structure:', response.data);
        alert('Unexpected response structure');
      }
    } catch (error) {
      if (error.response) {
        console.error('Login Failed:', error.response.data);
        alert(`Error: ${error.response.data.message || 'An unexpected error occurred.'}`);
      } else if (error.request) {
        console.error('No response received:', error.request);
        alert('No response received from the server.');
      } else {
        console.error('Error setting up request:', error.message);
        alert(`Error setting up request: ${error.message}`);
      }
    } finally {
      this.isLoading = false;
      this.isLoadingTitle = 'Loading';
    }
  }
}


};
</script>

<style>

</style>
