<template>
  <div>
    <TheFooter />
    <div class="card">
      <div class="card-header">
        <h4>
          <NuxtLink to="/user/create" class="btn btn-primary">Add</NuxtLink>
          User
        </h4>

        <div class="float-end">
          <input
            v-model="searchQuery"
            type="text"
            placeholder="Cari Nama atau Email"
          />
          &nbsp;
          <button @click="searchUser" class="btn btn-primary">Cari</button>
        </div>
      </div>
      <div class="card-body">
        <div v-if="isLoading">
          <Loading title="Loading..." />
        </div>
        <div v-else>
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gambar</th>
                <th>Created At</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(user, index) in users" :key="index">
                <td>{{ user.id }}</td>
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <td>{{ user.gambar }}</td>
                <td>{{ user.created_at }}</td>
                <td>
                  <NuxtLink
                    :to="`/user/${user.id}`"
                    class="btn btn-success btn-sm mx-2"
                    >Edit</NuxtLink
                  >
                  <Button
                    type="button"
                    @click="deleteUser($event, user.id)"
                    class="btn btn-danger btn-sm"
                    >Delete</Button
                  >
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "user",
  data() {
    return {
      users: [],
      isLoading: true,
      searchQuery: "",
      token: "",
    };
  },
  mounted() {
    this.token = localStorage.getItem("token");
    if (!this.token) {
      this.$router.push("/login");
    }
    this.getUser();
  },
  methods: {
    getUser() {
      this.isLoading = true;
      axios
        .get(`http://localhost:8000/api/user`, {
          headers: {
            Authorization: `Bearer ${this.token}`,
          },
        })
        .then((res) => {
          this.isLoading = false;
          this.users = res.data.user;
        })
        .catch((error) => {
          console.error("Error fetching data:", error);
          this.isLoading = false;
        });
    },

    deleteUser(event, userId) {
      if (confirm("Are you sure, you want to delete data?")) {
        event.target.innerText = "Deleting";
        axios
          .delete(`http://localhost:8000/api/user/${userId}/delete`, {
            headers: {
              Authorization: `Bearer ${this.token}`,
            },
          })
          .then((res) => {
            console.log("Data deleted", res);
            event.target.innerText = "Delete";
            this.getUser();
          })
          .catch((error) => {
            console.error("Error deleting data:", error);
          });
      }
    },

    searchUser() {
      this.isLoading = true;
      axios
        .get(`http://localhost:8000/api/user/search`, {
          headers: {
            Authorization: `Bearer ${this.token}`,
          },
          params: { query: this.searchQuery },
        })
        .then((res) => {
          this.isLoading = false;
          this.users = res.data.users;
        })
        .catch((error) => {
          this.isLoading = false;
          console.log("Error:", error);
        });
    },
  },
};
</script>

<style lang="scss" scoped></style>
