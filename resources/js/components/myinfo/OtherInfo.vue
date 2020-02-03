<template>
    <div>
        <h5>Address</h5>
        <div class="row">
            <div class="col-md-3 mt-4">
                <b>House/Block/Lot No.</b><p>{{ this.emp_other_info.emp_address.house_block_lot_no }}</p>
            </div>
            <div class="col-md-3 mt-4">
                <b>Subdivision/Village</b>
                    <p v-if="!this.emp_other_info.emp_address.subdivision_or_village == ''">{{ this.emp_other_info.emp_address.subdivision_or_village }}</p>
                    <p v-else>-</p>
            </div>
            <div class="col-md-3 mt-4">
                <b>Street</b>
                    <p v-if="!this.emp_other_info.emp_address.street == ''">{{ this.emp_other_info.emp_address.street}}</p>
                    <p v-else>-</p>
            </div>
            <div class="col-md-3 mt-4">
                <b>Barangay</b>
                    <p v-if="!this.emp_other_info.emp_address.barangay.brgyDesc == ''">{{ this.emp_other_info.emp_address.barangay.brgyDesc}}</p>
                    <p v-else>-</p>
            </div>
            <div class="col-md-3 mt-4">
                <b>City/Municipality</b>
                    <p v-if="!this.emp_other_info.emp_address.citymun.citymunDesc == ''">{{ this.emp_other_info.emp_address.citymun.citymunDesc}}</p>
                    <p v-else>-</p>
            </div>
            <div class="col-md-3 mt-4">
                <b>Province</b>
                    <p v-if="!this.emp_other_info.emp_address.province.provDesc == ''">{{ this.emp_other_info.emp_address.province.provDesc}}</p>
                    <p v-else>-</p>
            </div>
            <div class="col-md-3 mt-4">
                <h6>Region</h6>
                    <p v-if="!this.emp_other_info.emp_address.region.regDesc == ''">{{ this.emp_other_info.emp_address.region.regDesc}}</p>
                    <p v-else>-</p>
            </div>
            <div class="col-md-3 mt-4">
                <b>Is Your Permanent Address</b>
                    <p v-if="this.emp_other_info.emp_address.is_permanent_address == 1">YES</p>
                    <p v-else>No</p>
            </div>
        </div><hr>
        <h5>Educational Background</h5>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive-sm">          
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
                            <tr v-for="educ_bg in emp_other_info.emp_educ_background" :key="educ_bg.employee_id">
                                <td>{{educ_bg.educ_level.educ_level}}</td>
                                <td>{{educ_bg.name_of_school}}</td>
                                <td>{{educ_bg.course}}</td>
                                <td>{{educ_bg.date_from }} - {{educ_bg.date_to }}</td>
                                <template v-if="educ_bg.academic_honors.length > 0">
                                    <td>
                                        {{ honors(educ_bg.academic_honors) }}
                                    </td>
                                </template>
                                 <template v-else>
                                    <td>-</td>
                                </template>
                                 <td>{{educ_bg.year_graduated}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><hr>
         <h5>Family Background</h5>
        <div class="row">
            <div class="col-md-6 mt-4">
                <b>Spouse Name</b>
                <p v-if="!emp_other_info.emp_family_background.spouse_name == ''">{{emp_other_info.emp_family_background.spouse_name }}</p>
                <p v-else>-</p>
            </div>
            <div class="col-md-6 mt-4">
                <b>Spouse Occupation</b>
                   <p v-if="!emp_other_info.emp_family_background.spouse_occupation == ''">{{ emp_other_info.emp_family_background.spouse_occupation }}</p>
                    <p v-else>-</p>
            </div>
            <div class="col-md-6 mt-4">
                <b>Father Name</b>
                   <p v-if="!emp_other_info.emp_family_background.father_name == ''">{{ emp_other_info.emp_family_background.father_name }}</p>
                <p v-else>-</p>
            </div>
            <div class="col-md-6 mt-4">
                <b>Father Occupation</b>
                  <p v-if="!emp_other_info.emp_family_background.father_occupation == ''">{{ emp_other_info.emp_family_background.father_occupation }}</p>
                  <p v-else>-</p>
            </div>
            <div class="col-md-6 mt-4">
                <b>Mother Name</b>
                   <p v-if="!emp_other_info.emp_family_background.mother_name == ''">{{ emp_other_info.emp_family_background.mother_name }}</p>
                   <p v-else>-</p>
            </div>
            <div class="col-md-6 mt-4">
                <b>Mother Occupation</b>
                 <p v-if="!emp_other_info.emp_family_background.mother_occupation == ''">{{ emp_other_info.emp_family_background.mother_occupation }}</p>
                <p v-else>-</p>
            </div>
            <div class="col-md-3 mt-4">
                <b>Guardian Name</b>
                  <p v-if="!emp_other_info.emp_family_background.guardian_name == ''">{{ emp_other_info.emp_family_background.guardian_name }}</p>
                <p v-else>-</p>
            </div>
            <div class="col-md-3 mt-4">
                <b>Guardian Occupation</b>
                   <p v-if="!emp_other_info.emp_family_background.guardian_occupation == ''">{{ emp_other_info.emp_family_background.guardian_occupation }}</p>
                <p v-else>-</p>
            </div>
            <div class="col-md-3 mt-4">
                <b>Guardian Contact Number</b>
                  <p v-if="!emp_other_info.emp_family_background.guardian_cno == ''">{{ emp_other_info.emp_family_background.guardian_cno }}</p>
                <p v-else>-</p>
            </div>
        </div><hr>
        <h5>In Case of Emergency</h5>
        <div class="row">
            <div class="col-md-3 mt-4">
                <b>Complete Name</b>
                <p v-if="!emp_other_info.emp_family_background.incase_of_emergency == ''">{{ emp_other_info.emp_family_background.incase_of_emergency.complete_name}}</p>
                <p v-else>-</p>
            </div>
            <div class="col-md-3 mt-4">
                <b>Contact Number</b>
                  <p v-if="!emp_other_info.emp_family_background.incase_of_emergency == ''">{{ emp_other_info.emp_family_background.incase_of_emergency.contact_number}}</p>
                <p v-else>-</p>
            </div>
            <div class="col-md-3 mt-4">
                <b>Relationship</b>
                  <p v-if="!emp_other_info.emp_family_background.incase_of_emergency == ''">{{ emp_other_info.emp_family_background.incase_of_emergency.relationship}}</p>
                <p v-else>-</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
            data() {
                return {
                   emp_other_info: {
                       emp_address : {
                            barangay : {},
                            citymun : {},
                            province : {},
                            region: {},
                       },
                       emp_educ_background: [
                           {
                             educ_level: {},
                             academic_honors: {}     
                           }
                       ],
                       emp_family_background: {
                           incase_of_emergency: {}
                       }

                   }
                }
            },
          methods: {
           loadEmpOtherInfo(){
               axios.get('index').catch(err => console.log(err)).then(data => {
                   this.emp_other_info = data.data;
                   //console.log(data.data);
               })
           },
            honors(data) {
              return data.map(acad =>  {
                  return acad.honors;
              }).join();
            }
        },  
        mounted() {
            this.loadEmpOtherInfo();
        }
    }
    
</script>