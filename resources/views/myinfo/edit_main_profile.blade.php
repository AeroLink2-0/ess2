<div class="container">
  <form action="https://www.w3schools.com/action_page.php" id="myform">
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
        <select class="form-control" name="gender" value="{{$myinfo->emp_sex->sex}}">
            @foreach($gender as $gender)
                <option value="{{$gender->id}}">{{$gender->sex}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Civil Status</label>
        <select class="form-control" name="civil_status" value="{{$myinfo->civil_status->civil_status}}">
            @foreach($civil_status as $civil_status)
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