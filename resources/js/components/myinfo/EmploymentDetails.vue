<template>
    <div>
        <h5>Aerolink Company</h5>
        <div class="row">
            <div class="col-md-4 mt-4">
                <b>Date of Hired</b>
                <p>{{ dateOfHired()}}</p>
            </div>
             <div class="col-md-4 mt-4">
                <b>Employee Type</b>
                <p>{{ employee_details.emp_details.emp_type.employee_type}}</p>
            </div>
            <div class="col-md-4 mt-4">
                <b>Job Title</b>
                <p>{{ employee_details.emp_details.emp_position.position}}</p>
            </div>
            <div class="col-md-4 mt-4">
                <b>Job Category</b>
                <p>{{ employee_details.emp_details.emp_position.job_category.job_category}}</p>
            </div>
            <div class="col-md-4 mt-4">
                <b>Department</b>
                <p>{{ employee_details.emp_details.emp_position.department.department}}</p>
            </div>
            <div class="col-md-4 mt-4">
                <b>Salary</b>
                <p>{{ employee_details.emp_details.salary}}</p>
            </div>
        </div><hr>

        <h5>Work Experience</h5>
        <div class="row">
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
                        <tr v-for="work_exp in employee_details.emp_details.work_experience" :key="work_exp.employee_id">
                            <td>{{work_exp.position }}</td>
                            <td>{{work_exp.department }}</td>  
                            <td>{{work_exp.company }}</td>
                            <td>{{work_exp.salary }}</td>
                            <td>{{work_exp.employee_type }}</td>
                            <td>{{work_exp.duration }}</td>
                        </tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>  
    </div>
</template>
<script>
    export default {
            data() {
                return {
                    employee_details: {
                       emp_details: {
                            emp_type: {},
                            emp_position: {
                                job_category: {},
                                department: {}
                            },
                            work_experience: {}
                       }
                    }
                }
            },
          methods: {
           loadEmploymentDetails(){
               axios.get('index').catch(err => console.log(err)).then(data => {
                   this.employee_details = data.data;
                   //console.log(data.data);
               })
           },
           dateOfHired: function(){
               return this.employee_details.emp_details.date_of_hired;
           }
        },  
        mounted() {
            this.loadEmploymentDetails();
        }
    }
    
</script>
