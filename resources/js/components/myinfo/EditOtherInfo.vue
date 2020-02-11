<template>
    <form-wizard color="#28a745">
        <h2 slot="title">Edit Other Information</h2> 
        <tab-content title="Address"  icon="fa fa-home">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label>Barangay</label>
                  <select v-model="form.barangay_id" class="form-control" name="barangay_id" :class="{ 'is-invalid': form.errors.has('barangay_id') }">
                      <option v-for="barangay in barangays" v-bind:value="barangay.id">{{ barangay.brgyDesc }}</option>
                  </select>
                  <has-error :form="form" field="barangay_id"></has-error>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label>Subdivision/Village</label>
                <input v-model="form.subdivision_or_village" type="text" class="form-control" name="subdivision_or_village" :class="{ 'is-invalid': form.errors.has('subdivision_or_village') }" placeholder="leave blank if none">
                  <has-error :form="form" field="subdivision_or_village"></has-error>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label>Street</label>
                <input v-model="form.street" type="text" class="form-control" name="street" :class="{ 'is-invalid': form.errors.has('street') }" placeholder="leave blank if none">
                  <has-error :form="form" field="street"></has-error>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label>House/Lot/Block/Unit_no</label>
                <input v-model="form.house_block_lot_no" type="text" class="form-control" name="house_block_lot_no" :class="{ 'is-invalid': form.errors.has('house_block_lot_no') }">
                  <has-error :form="form" field="house_block_lot_no"></has-error>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                  <label>Region</label>
                  <select v-model="form.region_id" class="form-control" name="region_id" :class="{ 'is-invalid': form.errors.has('region_id') }" @change="loadProvincesByRegion()">
                      <option v-for="region in regions" v-bind:value="region.regCode">{{ region.regDesc }}</option>
                  </select>
                  <has-error :form="form" field="region_id"></has-error>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                  <label>Province</label>
                  <select v-model="form.province_id" class="form-control" name="province_id" :class="{ 'is-invalid': form.errors.has('province_id') }">
                      <option v-for="province in provinces" v-bind:value="province.provCode">{{ province.provDesc }}</option>
                  </select>
                  <has-error :form="form" field="province_id"></has-error>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                  <label>City/Municipality</label>
                  <select v-model="form.citymun_id" class="form-control" name="citymun_id" :class="{ 'is-invalid': form.errors.has('citymun_id') }">
                      <option v-for="citymun in citymuns" v-bind:value="citymun.citymunCode">{{ citymun.citymunDesc }}</option>
                  </select>
                  <has-error :form="form" field="citymun_id"></has-error>
              </div>
            </div>
           
          </div>
        </tab-content>
        <tab-content title="Educational Background" icon="fa fa-user-graduate">
            Educational Background
        </tab-content>
          <tab-content title="Family Background" icon="fa fa-users">
            Family Background
        </tab-content>
        <tab-content title="In Case of Emergency" icon="fa fa-phone">
            Yuhuuu! This seems pretty damn simple
        </tab-content>
    </form-wizard>
</template>

<script>
export default {
  props: ["useraddress"],
  data() {
    return {
      otherinfo: {
        emp_address: {
          region: {},
          province: {},
          citymun: {},
          barangay: {}
        }
      },
      form: new Form({
        house_block_lot_no: "",
        street: "",
        subdivision_or_village: "",
        barangay_id: "",
        citymun_id: "",
        province_id: "",
        region_id: ""
      })
    };
  },
  watch: {
    useraddress: function(newValue, pastValue) {
      this.form = new Form(newValue.emp_address);
    }
  },
  methods: {
    loadRegions() {
      axios
        .get("regions")
        .catch(err => console.log(err))
        .then(data => {
          this.regions = data.data;
        });
    },
    loadProvinces() {
      axios
        .get("provinces")
        .catch(err => console.log(err))
        .then(data => {
          this.provinces = data.data;
        });
    },
    loadCitymun() {
      axios
        .get("citymun")
        .catch(err => console.log(err))
        .then(data => {
          this.citymuns = data.data;
        });
    },
    loadBarangays() {
      axios
        .get("barangays")
        .catch(err => console.log(err))
        .then(data => {
          this.barangays = data.data;
        });
    },
    loadProvincesByRegion(){
          axios.get('loadProvicesByRegion', {
            params: {
              regCode:this.useraddress.emp_address.region_id
            }
        })
        .then(function (response) {
          console.log(response);
        })
        .catch(function (error) {
          console.log(error);
        })
    }
  },
  mounted() {
    this.form = this.useraddress.emp_address;
    this.loadRegions();
    this.loadProvinces();
    this.loadCitymun();
    this.loadBarangays();
  }
};
</script>