<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive-sm">
                    <table id="work_experience" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Training</th>
                        <th>Training Duration</th>
                        <th>Conducted By</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr v-for="empTrainings in trainings.emp_trainings" :key="empTrainings.employee_id">
                            <td>{{empTrainings.title_of_training }}</td>
                            <td>{{empTrainings.TrainingDuration}}</td>  
                            <td>{{empTrainings.conducted_by }}</td>
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
                    trainings: {
                        emp_trainings:{}
                    }
                }
            },
          methods: {
           loadEmployeeTrainings(){
               axios.get('index').catch(err => console.log(err)).then(data => {
                   this.trainings = data.data;
                   //console.log(data.data);
               })
           },
        },  
        mounted() {
            this.loadEmployeeTrainings();
        }
    }
    
</script>