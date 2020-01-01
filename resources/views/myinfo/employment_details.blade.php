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