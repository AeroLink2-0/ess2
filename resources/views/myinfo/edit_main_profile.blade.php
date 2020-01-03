<div class="container">
  <form action="{{url('/myinfo/updatemainprofile/'.$myinfo->employee_id)}}" id="myform" method="POST">
    @csrf
    <div class="form-group">
      <label>Birthday:</label>
      <input type="date" class="form-control" name="date_of_birth" value="{{ $myinfo->date_of_birth}}">
    </div>
    <div class="form-group">
      <label>Place of Birth:</label>
      <input type="text" class="form-control" name="place_of_birth" value="{{ $myinfo->place_of_birth}}">
    </div>
    <div class="form-group">
        <label>Gender</label>
        <select class="form-control" name="gender">
                <option value="{{$myinfo->sex_id}}" selected>{{$myinfo->emp_sex->sex}}</option>
            @foreach($myinfo->emp_sex->getSelectedGender($myinfo->sex_id) as $gender)
                <option value="{{$gender->id}}">{{$gender->sex}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
      <label>Citizenship</label>
      @if($myinfo->citizenship->citizenship == 1) 
        <input type="text" class="form-control" name="citizenship" value="{{ $myinfo->citizenship->citizenship}}">
      @else
        <input type="text" class="form-control" name="citizenship" value="{{ $myinfo->citizenship->citizenship}}">
      @endif
    </div>
    <div class="form-group">
        <label>Civil Status</label>
        <select class="form-control" name="civil_status">
            <option value="{{$myinfo->civil_status->civil_status}}" selected>{{$myinfo->civil_status->civil_status}}</option>
            @foreach($myinfo->civil_status->getSelectedCivilStatus($myinfo->civil_status_id) as $civil_status)
              <option value="{{$civil_status->id}}">{{$civil_status->civil_status}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
      <label>Blood Type</label>
      <input type="text" class="form-control" name="blood_type" value="{{ $myinfo->blood_type}}">
    </div>
    <div class="form-group">
      <label>Contact Number</label>
      <input type="text" class="form-control" name="contact_number" value="{{ $myinfo->contact_number}}">
    </div>
    <button type="submit" class="btn btn-success">Update</button>
  </form>
</div>