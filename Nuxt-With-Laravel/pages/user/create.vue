<template>
    <div class="mt-5 container">
        <div class="card">
            <div class="card-header">
                <h4>Create User
                    <NuxtLink to="/user" class="btn btn-danger float-end">Back</NuxtLink>
                </h4>
            </div>
            <div class="card-body">
                <div v-if="isLoading">
                    <Loading :title="isLoadingTitle" />
                </div>
                <div v-else>
                    <form @submit.prevent="saveUpdate">
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" v-model="user.name" class="form-control">
                            <span class="text-danger" v-if="errorList.name">{{ errorList.name[0] }}</span>
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="text" v-model="user.email" class="form-control">
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
                            <label>Profile Image</label>
                            <input type="file" @change="handleFileChange" class="form-control">
                            <span class="text-danger" v-if="errorList.gambar">{{ errorList.gambar[0] }}</span>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
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
    name: "UserUpdate",
    data() {
        return {
            user: {},
            isLoading: false,
            isLoadingTitle: 'Loading',
            errorList: {},
            image: null
        };
    },
    

    mounted() {
        const token = localStorage.getItem('token');
        if (!token) {
            this.$router.push('/login');
        }
    },

    methods: {

        handleFileChange(event) {
            const file = event.target.files[0];
            this.image = file; 
        },

        saveUpdate() {
            this.isLoading = true;
            this.isLoadingTitle = "Updating";

            let formData = new FormData();
            formData.append('name', this.user.name);
            formData.append('email', this.user.email);
            formData.append('password', this.user.password);
            formData.append('confirm_password', this.user.confirm_password);

            if (this.image) {
                formData.append('gambar', this.image);
            }

            axios.post(`http://localhost:8000/api/register`, formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
            .then(res => {
                alert(res.data.message);
                this.isLoading = false;
                this.isLoadingTitle = "Loading";
                this.errorList = {};
            })
            .catch(error => {
                if (error.response) {
                    if (error.response.status == 422) {
                        this.errorList = error.response.data.errors;
                    }
                }
                this.isLoading = false;
            });
        }
    }
}
</script>

<style>
/* Tambahkan style jika diperlukan */
</style>
