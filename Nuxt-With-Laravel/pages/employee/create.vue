<template>
    <div class="mt-5 container">

        <div class="card">
            <div class="card-header">
                <h4>Add Employee
                <NuxtLink to="/employee" class="btn btn-danger float-end">Back</NuxtLink>
                 </h4>
            </div>
            <div class="card-body">
         
                <div v-if="isLoading">
                       <Loading :title="isLoadingTitle" />
                </div>
                <div v-else>
                <form @submit.prevent="saveEmployee">
  
                    <div class="mb-3">
                        <label>NIP</label>
                        <input type="text" v-model="employee.nip" class="form-control">
                        <span class="text-danger" v-if="this.errorList.nip">  {{ this.errorList.nip[0] }}</span>
                    </div>
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" v-model="employee.name" class="form-control">
                        <span class="text-danger" v-if="this.errorList.name">  {{ this.errorList.name[0] }}</span>
                    </div>
                    <div class="mb-3">
                        <label>Birth</label>
                        <input type="text" v-model="employee.placeofbirth" class="form-control">
                        <span class="text-danger" v-if="this.errorList.placeofbirth">  {{ this.errorList.placeofbirth[0] }}</span>
                    </div>
                    <div class="mb-3">
                        <label>Address</label>
                        <input type="text" v-model="employee.address" class="form-control">
                        <span class="text-danger" v-if="this.errorList.address">  {{ this.errorList.address[0] }}</span>
                    </div>

                    <div class="mb-3">
                        <label>date of birth</label>
                        <input type="date" v-model="employee.dateofbirth" class="form-control">
                        <span class="text-danger" v-if="this.errorList.dateofbirth">  {{ this.errorList.dateofbirth[0] }}</span>
                    </div>
                    <div class="mb-3">
              

                <div class="mb-3">
                    <label for="gender">Gender &nbsp;</label><br />
                    <select  v-model="employee.gender" class="form-control" @change="onChange()">
                        <option disabled>Pilih : </option>
                        <option >Laki-laki</option>
                        <option >Perempuan</option>
                    </select>
                    <span class="text-danger" v-if="this.errorList.gol">  {{ this.errorList.gol[0] }}</span>
                </div>
                </div> 

                    <div class="mb-3">
                        <label>Eselon</label>
                        <input type="text" v-model="employee.eselon" class="form-control">
                        <span class="text-danger" v-if="this.errorList.eselon">  {{ this.errorList.eselon[0] }}</span>
                    </div>
                    
                    <div class="mb-3">
                    <label for="gol">Gol &nbsp;</label><br />
                    <select  v-model="employee.gol" class="form-control" @change="onChange()">
                        <option disabled>Pilih : </option>
                        <option >IV/a</option>
                        <option >IV/b</option>
                        <option>IV/c</option>
                        <option >IV/d</option>
                        <option >IV/e</option>
                    </select>
                    <span class="text-danger" v-if="this.errorList.gol">  {{ this.errorList.gol[0] }}</span>
                </div>
                    <div class="mb-3">
                    <label for="position">Position &nbsp;</label><br />
                    <select  v-model="employee.position" class="form-control" @change="onChange()">
                        <option disabled>Pilih : </option>
                        <option >Web Developer</option>
                        <option >Front-End Developer</option>
                        <option>Backed Developer</option>
                        <option >QA</option>
                        <option >Fullstack Developer</option>
                    </select>
                    <span class="text-danger" v-if="this.errorList.gol">  {{ this.errorList.gol[0] }}</span>
                </div>
                    <div class="mb-3">
                    <label for="placeoftask">Place Of Task &nbsp;</label><br />
                    <select  v-model="employee.placeoftask" class="form-control" @change="onChange()">
                        <option disabled>Pilih : </option>
                        <option >Jakarta</option>
                        <option >Bandung</option>
                        <option>Bali</option>
                        <option >Surabaya</option>
                        <option >Bogor</option>
                    </select>
                    <span class="text-danger" v-if="this.errorList.placeoftask">  {{ this.errorList.gol[0] }}</span>
                </div>
                    <div class="mb-3">
                    <label for="religion">religion &nbsp;</label><br />
                    <select  v-model="employee.religion" class="form-control" @change="onChange()">
                        <option disabled>Pilih : </option>
                        <option >Islam</option>
                        <option >Hindu</option>
                        <option>Budha</option>
                        <option >Konghucu</option>
                    </select>
                    <span class="text-danger" v-if="this.errorList.placeoftask">  {{ this.errorList.gol[0] }}</span>
                </div>
                    <div class="mb-3">
                        <label>Work Unit</label>
                        <input type="text" v-model="employee.workunit" class="form-control">
                        <span class="text-danger" v-if="this.errorList.workunit">  {{ this.errorList.workunit[0] }}</span>
                    </div>
                    <div class="mb-3">
                        <label>No Hp</label>
                        <input type="text" v-model="employee.nohp" class="form-control">
                        <span class="text-danger"  v-if="this.errorList.nohp">{{ this.errorList.nip[0] }}</span>
                    </div>
                    <div class="mb-3">
                        <label>NPWP</label>
                        <input type="text" v-model="employee.npwp" class="form-control">
                        <span class="text-danger" v-if="this.errorList.npwp">  {{ this.errorList.npwp[0] }}</span>
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
        name: "EmployeeCreate",
        data() {
            return {
                employee: {
                    nip: '',
                    name: '',
                    placeofbirth: '',
                    address: '',
                    dateofbirth: '',
                    gender: '',
                    gol: '',
                    eselon: '',
                    position: '',
                    placeoftask: '',
                    religion: '',
                    workunit: '',
                    nohp: '',
                    npwp: '',
                },
                isLoading: false,
                isLoadingTitle: 'Loading',
                errorList:{}
            }
        },
        mounted(){
            const token = localStorage.getItem('token');
              if (!token) {
            this.$router.push('/login');
              }
        },
        methods:{
            saveEmployee(){
                this.isLoading = true;
                this.isLoadingTitle = "Saving";
                //alert('am here');

                var myThis = this;

                axios.post(`http://localhost:8000/api/employee`, this.employee).then(res => {

                   console.log(res, 'res');
                    alert(res.data.message);

                    this.employee.nip = '';
                    this.employee.name= '';
                    this.employee.placeofbirth= '';
                    this.employee.address= '';
                    this.employee.dateofbirth= '';
                    this.employee.gender= '';
                    this.employee.gol= '';
                    this.employee.eselon= '';
                    this.employee.position= '';
                    this.employee.placeoftask= '';
                    this.employee.religion= '';
                    this.employee.workunit= '';
                    this.employee.nohp= '';
                    this.employee.npwp= '';

                    this.isLoading = false;
                    this.isLoadingTitle = "Loading";
                })
                .catch(function (error){
                    console.log(error, "errors")
                    if(error.response){
                        if(error.response.status == 422){
                            myThis.errorList = error.response.data.errors;
                        }
                    }
                    myThis.isLoading = false;
                })
            }
        }
        
     }
    
    </script>
    
    <style>
    
    </style>