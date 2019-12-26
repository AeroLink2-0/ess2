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
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Other Personal Information</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Employment Details</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Work Experience</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Training/Seminars Attended</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
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
                      </div>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Name</label>

                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName2" class="col-sm-2 control-label">Name</label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
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