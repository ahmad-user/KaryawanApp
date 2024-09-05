<template>
    <div class="mt-5 container">
        <div class="card">
            <div class="card-header">
                <h4>User Registration
                <NuxtLink to="/login" class="btn btn-danger float-end">Back to Login</NuxtLink>
                </h4>
            </div>
            <div class="card-body">
                <div v-if="isLoading">
                    <Loading :title="isLoadingTitle" />
                </div>
                <div v-else>
                    <form @submit.prevent="saveRegister">
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" v-model="user.name" class="form-control">
                            <span class="text-danger" v-if="errorList.name">{{ errorList.name[0] }}</span>
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" v-model="user.email" class="form-control">
                            <span class="text-danger" v-if="errorList.email">{{ errorList.email[0] }}</span>
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" v-model="user.password" class="form-control">
                            <span class="text-danger" v-if="errorList.password">{{ errorList.password[0] }}</span>
                        </div>
                        <div class="mb-3">
                            <label>Confirm Password</label>
                            <input type="password" v-model="user.confirm_password" class="form-control">
                            <span class="text-danger" v-if="errorList.confirm_password">{{ errorList.confirm_password[0] }}</span>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary " @click="sendMessage">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: "UserCreate",
    data() {
        return {
            user: {
                name: '',
                email: '',
                password: '',
                confirm_password: '',
            },
            isLoading: false,
            isLoadingTitle: 'Loading',
            errorList: {}
        };
    },
    methods: {
        sendMessage() {
            alert('Berhasil Disimpan');
            },
        saveRegister() {
            this.isLoading = true;
            this.isLoadingTitle = "Saving";

            axios.post(`http://localhost:8000/api/register`, this.user)
                .then(res => {
                    console.log(res, 'res');
                    alert(res.data.message);

                    // Clear form fields
                    this.user.name = '';
                    this.user.email = '';
                    this.user.password = '';
                    this.user.confirm_password = '';

                    this.isLoading = false;
                    this.isLoadingTitle = "Loading";
                })
                .catch(error => {
                    console.log(error, "errors");
                    if (error.response) {
                        if (error.response.status === 422) {
                            this.errorList = error.response.data.data;
                        }
                    }
                    this.isLoading = false;
                });
        }
    }
};
</script>

<style>
</style>
