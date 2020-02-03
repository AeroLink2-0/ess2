<template>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    <h1>Personal Information</h1>
                    </div>
                    <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Personal Information</li>
                    </ol>
                    </div>
                </div>
                </div><!-- /.container-fluid -->
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card card-success card-outline">
                                <div class="card-body box-profile">
                                <div class="text-center">
                                </div>

                                <h3 class="profile-username text-center">
                                    {{ this.users.fullname }}
                                </h3>

                                <p class="text-muted text-center">
                                
                                </p>

                                <ul  class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                    <b>Employee No.</b> <a class="float-right">{{ this.users.employee_id}}</a>
                                    </li>
                                    <li class="list-group-item">
                                    <b>Birthday</b> <a class="float-right">{{this.users.birthday}}</a>
                                    </li>
                                    <li class="list-group-item">
                                    <b>Employee Type</b> <a class="float-right">{{ this.users.emp_details.emp_type.employee_type }}</a>
                                    </li>
                                    <li class="list-group-item">
                                    <b>Place of Birth</b> <a class="float-right">{{ this.users.place_of_birth }}</a>
                                    </li>
                                    <li class="list-group-item">
                                    <b>Sex</b> <a class="float-right">{{ this.users.emp_sex.sex }}</a>
                                    </li>
                                    <li class="list-group-item">
                                    <b>Civil Status</b> <a class="float-right">{{ this.users.civil_status.civil_status }}</a>
                                    </li>
                                    <li class="list-group-item">
                                    <b>Citizenship</b> <a class="float-right">{{ this.users.citizenship.citizenship }}</a>
                                    </li>
                                    <li class="list-group-item">
                                    <b>Height</b> 
                                        <a class="float-right" v-if="this.users.height">{{ this.users.height }}</a> 
                                        <a class="float-right" v-else>-</a>
                                    </li>
                                    <li class="list-group-item">
                                    <b>Weight</b>
                                        <a class="float-right" v-if="this.users.weight">{{ this.users.weight }}</a> 
                                        <a class="float-right" v-else>-</a>
                                    </li>
                                    <li class="list-group-item">
                                    <b>Blood Type</b> 
                                        <a class="float-right" v-if="this.users.weight">{{ this.users.blood_type }}</a> 
                                        <a class="float-right" v-else>-</a>
                                    </li>  
                                    <li class="list-group-item">
                                    <b>Contact Number</b> <a class="float-right">{{ this.users.contact_number }}</a> 
                                    </li>
                                </ul>

                                <button type="button" class="btn btn-success btn-block" @click="EditMainProfileModal(users)">
                                    Edit
                                </button>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active" href="#info" data-toggle="tab">Other Personal Information</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#employment_details" data-toggle="tab">Employment Details</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#trainings" data-toggle="tab">Training/Seminars Attended</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#IDs" data-toggle="tab">IDs</a></li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="info">
                                            <other-info></other-info>     
                                        </div>
                                        <div class="tab-pane" id="employment_details">
                                            <employment-details></employment-details>    
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="modal fade" id="EditMainProfile">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Profile</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">
                            <edit-main-profile v-bind:userdata="users"></edit-main-profile>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
    export default {
            data() {
                return {
                   users: {
                       emp_details : {
                           emp_type: {}
                       },
                       emp_sex : {
                           sex: {}
                       },
                       civil_status: {
                           civil_status: ""
                       },
                       citizenship : {
                           citizenship: ""
                       }
                   }
                }
            },
          methods: {
           EditMainProfileModal(employee_data){
              this.users.place_of_birth = employee_data.place_of_birth;
               $("#EditMainProfile").modal('show');
           },
           loadEmployeeData(){
               axios.get('index').catch(err => console.log(err)).then(data => {
                   this.users = data.data;
               })
           }

        },
         
        mounted() {
            this.loadEmployeeData();
        }
    }

</script>


