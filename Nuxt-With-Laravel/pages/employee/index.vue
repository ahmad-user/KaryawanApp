<template>
  <div>
    <TheFooter />
    <div class="card">
      <card class="card-header">
        <h4>
          <NuxtLink to="/employee/create" class="btn btn-primary">Add</NuxtLink>
          Employee
        </h4>

        <div class="float-end">
          <input
            v-model="searchQuery"
            type="text"
            placeholder="Cari Nama atau NIP"
          />
          &nbsp;
          <button @click="searchEmployee" class="btn btn-primary">Cari</button>
        </div>
      </card>
      <div class="card-body">
        <div v-if="isLoading">
          <Loading title="Loading..." />
        </div>
        <div v-else>
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nip</th>
                <th>Name</th>
                <th>birth</th>
                <th>Address</th>
                <th>Date</th>
                <th>Gender</th>
                <th>Gol</th>
                <th>Eselon</th>
                <th>Position</th>
                <th>Task</th>
                <th>Religion</th>
                <!-- <th>Unit</th>
                            <th>Number</th>
                            <th>Npwp</th> -->
                <th>Created At</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(employee, index) in employee" :key="index">
                <td>{{ employee.id }}</td>
                <td>{{ employee.nip }}</td>
                <td>{{ employee.name }}</td>
                <td>{{ employee.placeofbirth }}</td>
                <td>{{ employee.address }}</td>
                <td>{{ employee.dateofbirth }}</td>
                <td>{{ employee.gender }}</td>
                <td>{{ employee.gol }}</td>
                <td>{{ employee.eselon }}</td>
                <td>{{ employee.position }}</td>
                <td>{{ employee.placeoftask }}</td>
                <td>{{ employee.religion }}</td>
                <!-- <td>{{ employee.workunit }}</td>
                            <td>{{ employee.nohp }}</td>
                            <td>{{ employee.npwp }}</td> -->
                <td>{{ employee.created_at }}</td>
                <td>
                  <NuxtLink
                    :to="`/employee/${employee.id}`"
                    class="btn btn-success btn-sm mx-2"
                    >Edit</NuxtLink
                  >
                  <Button
                    type="button"
                    @click="deleteEmployee($event, employee.id)"
                    class="btn btn-danger btn-sm"
                    >Delete</Button
                  >
                </td>
              </tr>
            </tbody>
          </table>
          <button @click="printReport" class="btn btn-primary float-end">
            Cetak
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "employee",
  data() {
    return {
      employee: [],
      isLoading: true,
      token: "",
    };
  },
  mounted() {
    this.token = localStorage.getItem("token");
    if (!this.token) {
      this.$router.push("/login");
    }
    this.getEmployee();
    this.fetchEmployeeReport();
  },
  methods: {
    getEmployee() {
      this.isLoading = true;
      axios
        .get(`http://localhost:8000/api/employee`, {
          headers: {
            Authorization: `Bearer ${this.token}`,
          },
        })
        .then((res) => {
          this.isLoading = false;
          this.employee = res.data.employee;
        });
    },

    deleteEmployee(event, employeeId) {
      if (confirm("Are you sure, you want to delete data ?")) {
        event.target.innerText = "Deleting";
        axios
          .delete(`http://localhost:8000/api/employee/${employeeId}/delete`, {
            headers: {
              Authorization: `Bearer ${this.token}`,
            },
          })
          .then((res) => {
            event.target.innerText = "Delete";
            this.getEmployee();
          });
      }
    },
    searchEmployee() {
      this.isLoading = true;
      axios
        .get(`http://localhost:8000/api/employee/search`, {
          headers: {
            Authorization: `Bearer ${this.token}`,
          },
          params: { query: this.searchQuery },
        })
        .then((res) => {
          this.isLoading = false;
          this.employee = res.data.employee;
        })
        .catch((error) => {
          this.isLoading = false;
          console.log("Error:", error);
        });
    },

    fetchEmployeeReport() {
      axios
        .get("http://localhost:8000/api/reports/employees", {
          headers: {
            Authorization: `Bearer ${this.token}`,
          },
        })
        .then((response) => {
          this.employees = response.data;
        });
    },
    printReport() {
      window.print();
    },
  },
};
</script>

<style lang="scss" scoped></style>
