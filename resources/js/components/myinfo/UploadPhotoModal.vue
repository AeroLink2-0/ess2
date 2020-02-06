<template>
    <div id="app">
        <center><img class="rounded" :src="profilePhoto()" height="200" width="200"></center><br>
            <form @submit.prevent="formSubmit" method="POST" enctype="multipart/form-data">
                <input type="file" name="image" class="form-control" ref="image" @change="onImageChange($event)">
                <button class="btn btn-success">Submit</button>
            </form>

    </div>
</template>
<script>
    export default {
        data() {
            return {
                emp_img: '',
                emp_stored_image: {}
            }
        },
        methods: {
                    profilePhoto(){
                return "uploads/" + this.emp_stored_image.emp_img;
            },
             onImageChange(e){
                console.log(e.target.files[0]);
                this.emp_img = e.target.files[0];
            },
            formSubmit() {
                let data = new FormData(); 
                data.append('image', this.emp_img);
                data.append('_method', 'post');
                axios.post('UpdatePhoto',data) // change this to post )
                .then(res =>{
                console.log(res); 

                window.location.href = "/myinfo";

                }) 
                .catch(error => 
                {
                    console.log(error); //             
               // window.location.href = "/myinfo";.

                })
            
            },
               loadEmployeeData(){
               axios.get('index').catch(err => console.log(err)).then(data => {
                   this.emp_stored_image = data.data;
               })
           }
        },
        mounted() {
            this.loadEmployeeData();
        }
    }

</script>