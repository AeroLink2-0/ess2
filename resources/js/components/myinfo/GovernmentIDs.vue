<template>
    <div>
        <div class="row">
            <div class="col-md-4">
                 <b>GSIS No</b>
                    <p v-if="!this.gov_ids.emp_ids.gsis_no== ''">{{ this.gov_ids.emp_ids.gsis_no}}</p>
                    <p v-else>-</p>
            </div>
            <div class="col-md-4">
                 <b>PAG-IBIG no</b>
                    <p v-if="!this.gov_ids.emp_ids.pag_ibig_no== ''">{{ this.gov_ids.emp_ids.pag_ibig_no}}</p>
                    <p v-else>-</p>
            </div>
              <div class="col-md-4">
                 <b>Philhealth no</b>
                    <p v-if="!this.gov_ids.emp_ids.philhealth_no== ''">{{ this.gov_ids.emp_ids.philhealth_no}}</p>
                    <p v-else>-</p>
            </div>
              <div class="col-md-4">
                 <b>SSS no</b>
                    <p v-if="!this.gov_ids.emp_ids.sss_id_no== ''">{{ this.gov_ids.emp_ids.sss_id_no}}</p>
                    <p v-else>-</p>
            </div>
            <div class="col-md-4">
                 <b>TIN number</b>
                    <p v-if="!this.gov_ids.emp_ids.tin_number== ''">{{ this.gov_ids.emp_ids.tin_number}}</p>
                    <p v-else>-</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
            data() {
                return {
                    gov_ids: {
                        emp_ids:{}
                    }
                }
            },
          methods: {
           loadEmployeeIDs(){
               axios.get('index').catch(err => console.log(err)).then(data => {
                   this.gov_ids = data.data;
               })
           },
        },  
        mounted() {
            this.loadEmployeeIDs();
        }
    }
    
</script>