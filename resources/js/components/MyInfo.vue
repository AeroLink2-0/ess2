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

                    <!-- Profile Image -->
                    <div class="card card-success card-outline">
                        <div class="card-body box-profile">
                        <div class="text-center">
                        </div>

                        <h3 class="profile-username text-center">
                        {{  }}
                        </h3>

                        <p class="text-muted text-center">
                        {{  }}
                        </p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                            <b>Employee No.</b> <a class="float-right"></a>
                            </li>
                            <li class="list-group-item">
                            <b>Birthday</b> <a class="float-right"></a>
                            </li>
                            <li class="list-group-item">
                            <b>Employee Type</b> <a class="float-right">}</a>
                            </li>
                            <li class="list-group-item">
                            <b>Place of Birth</b> <a class="float-right"></a>
                            </li>
                            <li class="list-group-item">
                            <b>Sex</b> <a class="float-right"></a>
                            </li>
                            <li class="list-group-item">
                            <b>Civil Status</b> <a class="float-right"></a>
                            </li>
                            <li class="list-group-item">
                            <b>Citizenship</b> <a class="float-right"></a>
                            </li>
                            <li class="list-group-item">
                            <b>Height</b> <a class="float-right"></a> 
                            </li>
                            <li class="list-group-item">
                            <b>Weight</b> <a class="float-right"></a> 
                            </li>
                            <li class="list-group-item">
                            <b>Blood Type</b> <a class="float-right"></a> 
                            </li>  
                            <li class="list-group-item">
                            <b>Contact Number</b> <a class="float-right"></a> 
                            </li>
                        </ul>

                        <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#EditMainProfile">
                            Edit
                        </button>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
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
                        <edit-main-profile></edit-main-profile>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import EditMainProfile from './EditMainProfile.vue';
    export default {
        components{
            'edit-main-profile':EditMainProfile
        }
         data() {
                return {
                    form: new Form({
                        date_of_birth: '',
                        sex_id: '',
                        civil_status_id: '',
                        citizenship_id: '',
                        height: '',
                        weight:'',
                        blood_type:'',
                        contact_number
                    })
                }
        },
        
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
