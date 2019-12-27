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

                <a href="#" class="btn btn-success btn-block"><i class="fa fa-pencil"></i><b>Edit</b></a>
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
                    <b>Address</b>
                      <div class="row">
                        <div class="col-md-3 mt-4">
                          <h6>House/Block/Lot No.</h6><p>{{ $myinfo->emp_address->house_block_lot_no }}</p>
                        </div>
                        <div class="col-md-3 mt-4">
                          <h6>Subdivision/Village</h6>
                          <p><?php echo ($myinfo->emp_address->subdivision_or_village) ?  $this->blood_type : '-' ?></p>
                        </div>
                        <div class="col-md-3 mt-4">
                          <h6>Street</h6>
                          <p><?php echo ($myinfo->emp_address->street) ?  $myinfo->emp_address->street : '-' ?></p>
                        </div>
                        <div class="col-md-3 mt-4">
                          <h6>Barangay</h6>
                          <p><?php echo ($myinfo->emp_address->barangay->brgyDesc) ?  $myinfo->emp_address->barangay->brgyDesc : '-' ?></p>
                        </div>
                        <div class="col-md-3 mt-4">
                          <h6>City/Municipality</h6>
                          <p><?php echo ($myinfo->emp_address->citymun->citymunDesc) ?  $myinfo->emp_address->citymun->citymunDesc : '-' ?></p>
                        </div>
                        <div class="col-md-3 mt-4">
                          <h6>Province</h6>
                          <p><?php echo ($myinfo->emp_address->province->provDesc) ?  $myinfo->emp_address->province->provDesc : '-' ?></p>
                        </div>
                        <div class="col-md-3 mt-4">
                          <h6>Region</h6>
                          <p><?php echo ($myinfo->emp_address->region->regDesc) ?  $myinfo->emp_address->region->regDesc : '-' ?></p>
                        </div>
                        <div class="col-md-3 mt-4">
                          <h6>Is Your Permanent Address</h6>
                          <p><?php echo ($myinfo->emp_address->is_permanent_address == 0) ?  'No' : 'Yes' ?></p>
                        </div>
                      </div><hr>
                      <div class="row">
                        <b>Educational Background</b>
                          <div class="col-md-12">
                            <div class="table-responsive-sm table-borderless">          
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th>Level</th>
                                    <th>School</th>
                                    <th>Course</th>
                                    <th>School Year</th>
                                    <th>Honors/Awards</th>
                                    <th>Year Graduated</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($myinfo->emp_educ_background as $emp_educ_bg)
                                  <tr>
                                    <td>{{$emp_educ_bg->educ_level->educ_level }}</td>
                                    <td>{{$emp_educ_bg->name_of_school }}</td>
                                    <td><?php echo ($emp_educ_bg->course) ?  $emp_educ_bg->course : '-' ?></td>
                                    <td>{{$emp_educ_bg->date_from }} - {{$emp_educ_bg->date_to }}</td>
                                    <td>
                                      @if(count($emp_educ_bg->academic_honors) > 0)
                                        @foreach($emp_educ_bg->academic_honors as $honors)
                                          {{$honors->honors}}
                                        @endforeach
                                      @else
                                        <p>-</p>
                                      @endif
                                    </td>
                                    <td>{{$emp_educ_bg->year_graduated }}</td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                            </div>
                          </div>
                      </div><hr>
                        <b>Citizenship</b>
                      <div class="row">
                        <div class="col-md-3 mt-4">
                          <h6>Citizenship</h6>
                          {{ $myinfo->citizenship->citizenship}}
                        </div>
                        <div class="col-md-3 mt-4">
                          <h6>Have Dual Citizenship?</h6>
                          <?php echo ($myinfo->citizenship->have_dual_citizenship == 0) ?  'No' : 'Yes' ?>
                        </div>
                        @if($myinfo->citizenship->have_dual_citizenship == 1)
                          <div class="col-md-2 mt-4">
                            <h6>By Birth?</h6>
                            <?php echo ($myinfo->citizenship->by_birth == 0) ?  'No' : 'Yes' ?>
                          </div>
                          <div class="col-md-2 mt-4">
                            <h6>By Naturalization?</h6>
                            <?php echo ($myinfo->citizenship->by_birth == 0) ?  'No' : 'Yes' ?>
                          </div>
                          <div class="col-md-2 mt-4">
                            <h6>Country</h6>
                              {{$myinfo->country}}
                          </div>
                          @endif
                      </div><hr>
                        <b>Family Background</b>
                        <div class="row">
                          <div class="col-md-6 mt-4">
                            <h6>Spouse Name</h6>
                            <?php echo ($myinfo->emp_family_background) ?  $myinfo->emp_family_background->spouse_name : '-' ?>
                          </div>
                          <div class="col-md-6 mt-4">
                            <h6>Spouse Occupation</h6>
                            <?php echo ($myinfo->emp_family_background) ?  $myinfo->emp_family_background->spouse_occupation: '-' ?>
                          </div>
                          <div class="col-md-6 mt-4">
                            <h6>Father Name</h6>
                            <?php echo ($myinfo->emp_family_background) ?  $myinfo->emp_family_background->father_name : '-' ?>
                          </div>
                          <div class="col-md-6 mt-4">
                            <h6>Father Occupation</h6>
                            <?php echo ($myinfo->emp_family_background) ?  $myinfo->emp_family_background->father_occupation: '-' ?>
                          </div>
                          <div class="col-md-6 mt-4">
                            <h6>Mother Name</h6>
                            <?php echo ($myinfo->emp_family_background) ?  $myinfo->emp_family_background->mother_name : '-' ?>
                          </div>
                          <div class="col-md-6 mt-4">
                            <h6>Mother Occupation</h6>
                            <?php echo ($myinfo->emp_family_background) ?  $myinfo->emp_family_background->mother_occupation: '-' ?>
                          </div>
                          <div class="col-md-3 mt-4">
                            <h6>Guardian Name</h6>
                            <?php echo ($myinfo->emp_family_background) ?  $myinfo->emp_family_background->guardian_name : '-' ?>
                          </div>
                          <div class="col-md-3 mt-4">
                            <h6>Guardian Occupation</h6>
                            <?php echo ($myinfo->emp_family_background) ?  $myinfo->emp_family_background->guardian_occupation: '-' ?>
                          </div>
                          <div class="col-md-3 mt-4">
                            <h6>Guardian Contact Number</h6>
                            <?php echo ($myinfo->emp_family_background) ?  $myinfo->emp_family_background->guardian_cno: '-' ?>
                          </div>
                        </div><hr>
                        <b>In Case of Emergency</b>
                          <div class="row">
                            <div class="col-md-3 mt-4">
                              <h6>Complete Name</h6>
                              <?php echo ($myinfo->emp_family_background->incase_of_emergency) ?  $myinfo->emp_family_background->incase_of_emergency->complete_name: '-' ?>
                            </div>
                            <div class="col-md-3 mt-4">
                              <h6>Contact Number</h6>
                              <?php echo ($myinfo->emp_family_background->incase_of_emergency) ?  $myinfo->emp_family_background->incase_of_emergency->contact_number: '-' ?>
                            </div>
                            <div class="col-md-3 mt-4">
                              <h6>Relationship</h6>
                              <?php echo ($myinfo->emp_family_background->incase_of_emergency) ?  $myinfo->emp_family_background->incase_of_emergency->relationship : '-' ?>
                            </div>
                          </div>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="employment_details">
                    <b>Aerolink Company</b>
                    <div class="row">
                      <div class="col-md-4 mt-4">
                        <h6>Date of Hired</h6>
                        {{ $myinfo->emp_employment_details->date_of_hired()}}
                      </div>
                      <div class="col-md-4 mt-4">
                        <h6>Employee Type</h6>
                        {{ $myinfo->emp_employment_details->employee_type->employee_type}}
                      </div>
                      <div class="col-md-4 mt-4">
                        <h6>Job Title</h6>
                        {{ $myinfo->emp_employment_details->emp_position->position}}
                      </div>
                      <div class="col-md-4 mt-4">
                        <h6>Job Category</h6>
                        {{ $myinfo->emp_employment_details->emp_position->job_category->job_category}}
                      </div>
                      <div class="col-md-4 mt-4">
                        <h6>Department</h6>
                        {{ $myinfo->emp_employment_details->emp_position->department->department}}
                      </div>
                      <div class="col-md-4 mt-4">
                        <h6>Salary</h6>
                        {{ $myinfo->emp_employment_details->salary}}
                      </div>
                    </div><hr>
                    <div class="row">
                      <b>Work Experience</b>
                      <div class="col-md-12">
                        <div class="table-responsive-sm">
                          <table id="work_experience" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                              <th>Position</th>
                              <th>Department/Office/Division</th>
                              <th>Company</th>
                              <th>Salary</th>
                              <th>Employee Type</th>
                              <th>Duration</th>
                            </tr>
                            </thead>
                            <tbody>
                              @foreach($myinfo->emp_employment_details->work_experience as $work_experience)
                                <tr>
                                  <td>{{$work_experience->position }}</td>
                                  <td>{{$work_experience->department }}</td>  
                                  <td>{{$work_experience->company }}</td>
                                  <td>{{$work_experience->salary }}</td>
                                  <td>{{$work_experience->employee_type->employee_type }}</td>
                                  <td>{{$work_experience->getDuration() }}</td>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>   
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
@endsection
