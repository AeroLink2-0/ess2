<button class="btn btn-sm btn-success float-md-right" data-toggle="modal" data-target="#submitModal">Edit</button>
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


         
    <div id="submitModal" class="multi-step">
            @include('myinfo.edit_other_info')
    </div>