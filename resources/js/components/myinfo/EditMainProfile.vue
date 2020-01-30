<template>
    <div id="app">
       <form @submit.prevent="UpdateMainProfile" @keydown="form.onKeydown($event)">
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
                    <option v-for="gender in gender" v-bind:value="gender.id">{{ gender.sex }}</option>
                </select>
                 <has-error :form="form" field="sex_id"></has-error>
            </div>
            <div class="form-group">
                <label>Citizenship</label>
                <input v-model="form.citizenship.citizenship" type="text" class="form-control" name="citizenship_id" :class="{ 'is-invalid': form.errors.has('citizenship_id') }">
                <has-error :form="form" field="citizenship_id"></has-error><br>
                <h6 v-if="form.citizenship.have_dual_citizenship == 1">Have Dual Citizenship?<br><br>
                    <div class="row">
                        <div class="col-md-6">
                            <template v-if="form.citizenship.relation == 'by_birth'">
                                <input type="radio" name="relation" v-model="pick" v-bind:value="by_birth">By Birth?<br><br>
                                <input type="radio" name="relation" v-bind:value="by_naturalization">By Naturalization?<br>
                            </template>
                            <template v-else-if="form.citizenship.relation == 'by_naturalization'">
                                <input type="radio" name="relation" v-bind:value="by_birth">By Birth?<br><br>
                                <input type="radio" name="relation" v-model="pick" v-bind:value="by_naturalization">By Naturalization?<br>
                            </template>
                        </div>
                        <div class="col-md-6">
                            Country
                            <input v-model="form.citizenship.country" type="text" class="form-control" name="country" :class="{ 'is-invalid': form.errors.has('country') }">
                        </div>
                    </div>
                </h6>   
            </div>
            <div class="form-group">
                <label>Civil Status</label>
                <select v-model="form.civil_status_id" class="form-control" name="civil_status_id" :class="{ 'is-invalid': form.errors.has('civil_status_id') }">
                    <option v-for="civil_status in civil_status" v-bind:value="civil_status.id">{{ civil_status.civil_status }}</option>
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
  props: ["userdata"],
  data() {
    return {
       users: {
            gender : {},
            civil_status: {},
       },
      form: new Form({
        date_of_birth: "",
        place_of_birth: "",
        sex_id: "",
        civil_status_id: "",
        citizenship_id: "",
        height: "",
        weight: "",
        blood_type: "",
        contact_number: ""
      })
    };
  },
  watch: {
    userdata: function(newValue, pastValue) {
        this.form = new Form(newValue);
    }
  },
  methods: {
    UpdateMainProfile() {
      // Submit the form via a POST request
      this.form.post("UpdateMainProfile").then(({ data }) => {
        console.log(data);
      });
    },
    loadGender(){
        axios.get('gender').catch(err => console.log(err)).then(data => {
            this.gender = data.data;
        })
    },
    loadCivilStatus(){
        axios.get('civil_status').catch(err => console.log(err)).then(data => {
            this.civil_status = data.data;
        })
    }
    
  },
  mounted() {
    this.form = this.userdata;
    this.loadGender();
    this.loadCivilStatus();
  }
};
</script>

