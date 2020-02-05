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
            }
        },
        methods: {
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
                }) 
                .catch(error => 
                {
                    console.log(error); //             
               // window.location.href = "/myinfo";
                })
            
            },
            profilePhoto(){
                return "uploads/eden.jpg";
            },
        },
    }

</script>