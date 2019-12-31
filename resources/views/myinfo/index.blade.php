@extends('layouts.sidebar')



@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
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
                  <img class="profile-user-img img-fluid img-circle"
                       src="../../dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">
                {{ $myinfo->fullname }}
                </h3>

                <p class="text-muted text-center">
                {{ $myinfo->emp_details->emp_position->position }}
                </p>

                <ul class="list-group list-group-unbordered mb-3">
                   <li class="list-group-item">
                    <b>Employee No.</b> <a class="float-right">{{ $myinfo->employee_id }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Birthday</b> <a class="float-right">{{ $myinfo->birthday }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Employee Type</b> <a class="float-right">{{ $myinfo->emp_details->employee_type->employee_type }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Place of Birth</b> <a class="float-right">{{ $myinfo->place_of_birth }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Sex</b> <a class="float-right">{{ $myinfo->emp_sex->sex }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Civil Status</b> <a class="float-right">{{ $myinfo->civil_status->civil_status }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Citizenship</b> <a class="float-right">{{ $myinfo->citizenship->citizenship }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Height</b> <a class="float-right">{{ $myinfo->height() }}</a> 
                  </li>
                  <li class="list-group-item">
                    <b>Weight</b> <a class="float-right">{{ $myinfo->weight() }}</a> 
                  </li>
                  <li class="list-group-item">
                    <b>Blood Type</b> <a class="float-right">{{ $myinfo->blood_type() }}</a> 
                  </li>  
                  <li class="list-group-item">
                    <b>Contact Number</b> <a class="float-right">{{ $myinfo->contact_number }}</a> 
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
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#info" data-toggle="tab">Other Personal Information</a></li>
                  <li class="nav-item"><a class="nav-link" href="#employment_details" data-toggle="tab">Employment Details</a></li>
                  <li class="nav-item"><a class="nav-link" href="#trainings" data-toggle="tab">Training/Seminars Attended</a></li>
                  <li class="nav-item"><a class="nav-link" href="#IDs" data-toggle="tab">IDs</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="info">
                    @include('myinfo.other_info')
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="employment_details">
                    @include('myinfo.employment_details')
                  </div>              

                  <div class="tab-pane" id="trainings">
                      <div class="col-md-12">
                        <div class="table-responsive-sm">
                          <table id="work_experience" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                              <th>Title of Training</th>
                              <th>Duration</th>
                              <th>Conducted by</th>
                            </tr>
                            </thead>
                            <tbody>
                              @foreach($myinfo->emp_trainings as $emp_trainings)
                                <tr>
                                  <td>{{$emp_trainings->title_of_training }}</td>
                                  <td>{{$emp_trainings->getTrainingDuration()}}</td>  
                                  <td>{{$emp_trainings->conducted_by }}</td>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                  </div>

                   <div class="tab-pane" id="IDs">
                    <div class="row">
                      <div class="col-sm-12 col-md-4">
                        <h6>GSIS No.</h6><p><?= ($myinfo->emp_ids) ? $myinfo->emp_ids->gsis_no : '-' ?></p>
                      </div>
                      <div class="col-sm-12 col-md-4">
                        <h6>SSS No.</h6><p><?= ($myinfo->emp_ids) ? $myinfo->emp_ids->sss_id_no : '-' ?></p>
                      </div>
                      <div class="col-sm-12 col-md-4">
                        <h6>PAGIBIG No.</h6><p><?= ($myinfo->emp_ids) ? $myinfo->emp_ids->pag_ibig_no : '-' ?></p>
                      </div>
                      <div class="col-sm-12 col-md-4">
                        <h6>Philhealth_No.</h6><p><?= ($myinfo->emp_ids) ? $myinfo->emp_ids->philhealth_no : '-' ?></p>
                      </div>
                      <div class="col-sm-12 col-md-4">
                        <h6>TIN No.</h6><p><?= ($myinfo->emp_ids) ? $myinfo->emp_ids->tin_number : '-' ?></p>
                      </div>
                    </div>
                  </div>

                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>

  <!--Modals -->
  <div class="modal fade" id="EditMainProfile">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Profile</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
         @include('myinfo.edit_main_profile') 
        </div>
      </div>
    </div>
</div>
@endsection
