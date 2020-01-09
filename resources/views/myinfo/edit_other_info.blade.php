
<script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{url('js/MultiStep.min.js')}}"></script>
<script type="text/javascript">
        $(document).ready(function() {
        $('.modal').MultiStep({
            title:'Other Information',
            data:[{
                content:
                `
                  <form action="" method="post" id="myform">
                      @csrf
                      <h5>Residential Address</h5>
                      <div class="row">
                          <div class="col-sm-12 col-md-3">
                              <div class="form-group">
                                <label>House/Block/Lot No.</label>
                                <input type="text" class="form-control" value="{{$myinfo->emp_address->house_block_lot_no}}">
                              </div>
                          </div>
                          <div class="col-sm-12 col-md-3">
                              <div class="form-group">
                                <label>Subdivision/Village</label>
                                <input type="text" class="form-control" value="{{$myinfo->emp_address->subdivision_or_village}}">
                              </div>
                          </div>
                          <div class="col-sm-12 col-md-3">
                              <div class="form-group">
                                <label>Street</label>
                                <input type="text" class="form-control" value="{{$myinfo->emp_address->street}}">
                              </div>
                          </div>
                          <div class="col-sm-12 col-md-3">
                              <div class="form-group">
                                <label>Region</label><br>
                                <select name="city_id" id="edit_region" class="form-control">
                                    <option selected value="{{$myinfo->emp_address->region->id}}">{{$myinfo->emp_address->region->regDesc}}</option>
                                </select>
                              </div>
                          </div>
                          <div class="col-sm-12 col-md-3">
                              <div class="form-group">
                                <label>Province</label><br>
                                <select name="city_id" id="edit_province" class="form-control">
                                    <option selected value="{{$myinfo->emp_address->province->id}}">{{$myinfo->emp_address->province->provDesc}}</option>
                                </select>
                              </div>
                          </div>
                          <div class="col-sm-12 col-md-3">
                              <div class="form-group">
                                <label>City/Municipality</label><br>
                                <select name="city_id" id="edit_citymun" class="form-control">
                                    <option selected value="{{$myinfo->emp_address->citymun->id}}">{{$myinfo->emp_address->citymun->citymunDesc}}</option>
                                </select>
                              </div>
                          </div>
                          <div class="col-sm-12 col-md-3">
                              <div class="form-group">
                                <label>Barangay</label><br>
                                <select name="city_id" id="edit_barangay" class="form-control">
                                    <option selected value="{{$myinfo->emp_address->barangay->id}}">{{$myinfo->emp_address->barangay->brgyDesc}}</option>
                                </select>
                              </div>
                          </div>
                          <div class="col-sm-12 col-md-3">
                              <div class="form-group">
                                <label>Permanent Address?</label><br>
                                <select name="is_permanent_address" id="is_permanent_address" class="form-control">
                                    @if($myinfo->emp_address->is_permanent_address == 0)
                                      <option selected value="0">No</option>
                                      <option value="1">Yes</option>
                                    @else
                                      <option value="0">No</option>
                                      <option selected value="1">Yes</option>
                                    @endif
                                </select>
                              </div>
                          </div>
                      </div><hr>
                      
                      <h5 id="paform">Permanent Address</h5>
                      <div class="row" id="permanent_address">
                          <div class="col-sm-12 col-md-3">
                              <div class="form-group">
                                <label>House/Block/Lot No.</label>
                                <input type="text" class="form-control" value="{{$myinfo->emp_address->house_block_lot_no}}" name="house_block_lot_no">
                              </div>
                          </div>
                          <div class="col-sm-12 col-md-3">
                              <div class="form-group">
                                <label>Subdivision/Village</label>
                                <input type="text" class="form-control" value="{{$myinfo->emp_address->subdivision_or_village}}" name="subdivision_or_village">
                              </div>
                          </div>
                          <div class="col-sm-12 col-md-3">
                              <div class="form-group">
                                <label>Street</label>
                                <input type="text" class="form-control" value="{{$myinfo->emp_address->street}}" name="street">
                              </div>
                          </div>
                          <div class="col-sm-12 col-md-3">
                              <div class="form-group">
                                <label>Region</label><br>
                                <select name="city_id" id="edit_region" class="form-control">
                                    <option selected value="{{$myinfo->emp_address->region->id}}" name="region">{{$myinfo->emp_address->region->regDesc}}</option>
                                </select>
                              </div>
                          </div>
                          <div class="col-sm-12 col-md-3">
                              <div class="form-group">
                                <label>Province</label><br>
                                <select name="province" id="edit_province" class="form-control">
                                    <option selected value="{{$myinfo->emp_address->province->id}}">{{$myinfo->emp_address->province->provDesc}}</option>
                                </select>
                              </div>
                          </div>
                          <div class="col-sm-12 col-md-3">
                              <div class="form-group">
                                <label>City/Municipality</label><br>
                                <select name="citymun" id="edit_citymun" class="form-control">
                                    <option selected value="{{$myinfo->emp_address->citymun->id}}">{{$myinfo->emp_address->citymun->citymunDesc}}</option>
                                </select>
                              </div>
                          </div>
                          <div class="col-sm-12 col-md-3">
                              <div class="form-group">
                                <label>Barangay</label><br>
                                <select name="barangay" id="edit_barangay" class="form-control">
                                    <option selected value="{{$myinfo->emp_address->barangay->id}}">{{$myinfo->emp_address->barangay->brgyDesc}}</option>
                                </select>
                              </div>
                          </div>
                      </div>
                  </form>
                `,
                label:`Address`,
            },{
                content:'This is a multi-step modal',
                label: 'Educational Background'
            },{
                content:`You can have skip options`,
                skip:true
            },{
                content:`<small>You can include html content as well!</small><br><br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                `,
                skip:true
            },{
                content:`This is the end<br>Hold your breath and count to ten`,
            }],
            final:'You can have your own final message',
            modalSize:'lg'
        });

            $("#is_permanent_address").on('change',function(){
              console.log($("#is_permanent_address").val());
            });     
});
</script>