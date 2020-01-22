<template>
    <div id="app">
       <form @submit.prevent="samp" @keydown="form.onKeydown($event)">
            <div class="form-group">
                <label>Birthday:</label>
                <input v-model="form.date_of_birth" type="date" name="date_of_birth" class="form-control" :class="{ 'is-invalid': form.errors.has('date_of_birth') }">
                 <has-error :form="form" field="date_of_birth"></has-error>
            </div>
            <div class="form-group">
                <label>Place of Birth:</label>
                <input v-model="form.place_of_birth" type="text" class="form-control" name="place_of_birth" :class="{ 'is-invalid': form.errors.has('place_of_birth') }">
                <has-error :form="form" field="place_of_birth"></has-error>
            </div>
            <div class="form-group">
                <label>Gender</label>
                <select v-model="form.sex_id" class="form-control" name="sex_id" :class="{ 'is-invalid': form.errors.has('sex_id') }">
                        <option value="" selected>Samp</option>
                   <!-- @foreach($myinfo->emp_sex->getSelectedGender($myinfo->sex_id) as $gender)
                        <option value="{{$gender->id}}">{{$gender->sex}}</option>
                    @endforeach -->
                </select>
                 <has-error :form="form" field="sex_id"></has-error>
            </div>
            <div class="form-group">
                <label>Citizenship</label>
                <input v-model="form.citizenship_id" type="text" class="form-control" name="citizenship_id" :class="{ 'is-invalid': form.errors.has('citizenship_id') }">
                <has-error :form="form" field="citizenship_id"></has-error><br>
                <!--<div class="row">
                    <div class="col-md-6">
                    <h6>Have Dual Citizenship?</h6> 
                        @if($myinfo->citizenship->relation == 'by_birth') 
                        <input type="radio" name="relation" value="by_birth" checked> By Birth? <br>
                        <input type="radio" name="relation" value="by_naturalization"> By Naturalization <br>
                        @elseif($myinfo->citizenship->relation == 'by_naturalization')
                        <input type="radio" name="relation" value="by_birth"> By Birth? <br>
                        <input type="radio" name="relation" value="by_naturalization" checked> By Naturalization <br>
                        @endif
                    </div>
                    <div class="col-md-6">
                    <h6>Country</h6> 
                    <input type="text" class="form-control" name="country" value="{{ $myinfo->citizenship->country}}"><br>
                    </div>
                </div>
                @else
                <input type="text" class="form-control" name="citizenship" value="{{ $myinfo->citizenship->citizenship}}">
                @endif-->
            </div>
            <div class="form-group">
                <label>Civil Status</label>
                <select v-model="form.civil_status_id" class="form-control" name="civil_status_id" :class="{ 'is-invalid': form.errors.has('civil_status_id') }">
                        <option value="" selected>Samp</option>
                  <!--  @foreach($myinfo->civil_status->getSelectedCivilStatus($myinfo->civil_status_id) as $civil_status)
                    <option value="{{$civil_status->id}}">{{$civil_status->civil_status}}</option>
                    @endforeach -->
                </select>
                 <has-error :form="form" field="civil_status_id"></has-error>
            </div>
            <div class="form-group">
                <label>Height</label>
                <input v-model="form.height" type="text" class="form-control" name="height" :class="{ 'is-invalid': form.errors.has('height') }">
                <has-error :form="form" field="height"></has-error>
            </div>
            <div class="form-group">
                <label>Weight</label>
                <input v-model="form.weight" type="text" class="form-control" name="weight" :class="{ 'is-invalid': form.errors.has('weight') }">
                <has-error :form="form" field="weight"></has-error>
            </div>
            <div class="form-group">
                <label>Blood Type</label>
                <input v-model="form.blood_type" type="text" class="form-control" name="blood_type" :class="{ 'is-invalid': form.errors.has('blood_type') }">
                <has-error :form="form" field="blood_type"></has-error>
            </div>
            <div class="form-group">
                <label>Contact Number</label>
                <input v-model="form.contact_number" type="text" class="form-control" name="contact_number" :class="{ 'is-invalid': form.errors.has('contact_number') }">
                <has-error :form="form" field="contact_number"></has-error>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</template>

<script>
    export default {
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
                        contact_number:'',
                    })
                }
            },
          methods: {
            samp () {
            // Submit the form via a POST request
            this.form.post('samp')
                .then(({ data }) => { console.log(data) })
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

