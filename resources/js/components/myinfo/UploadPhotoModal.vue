<template>
    <div id="app">
        <center><img class="rounded" :src="profilePhoto()" height="200" width="200"></center><br>

                <input type="file" name="image" class="form-control" @change="onImageChange($event)">
                <button class="btn btn-success" @click="formSubmit()">Submit</button>

    </div>
</template>
<script>
    export default {
        data() {
            return {
                emp_img: {},
            }
        },
        methods: {
             onImageChange(e){
                console.log(e.target.files[0]);
                this.emp_img = e.target.files[0];
            },
            formSubmit() {

                let currentObj = this;
 
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
 
                let formData = new FormData();
                formData.append('image', this.emp_img);
 
              /*  axios.post('UpdatePhoto', formData, config)
                .then(function (response) {
                    currentObj.success = response.data.success;
                })
                .catch(function (error) {
                    currentObj.output = error;
                });*/
                axios.post('UpdatePhoto', formData, config)
                .then(res => {
                    console.log(res.data)
                }).catch(err => {
                console.log(err)
                })
                //console.log(formData.append('image', this.image));
            },
            profilePhoto(){
                return "uploads/eden.jpg";
            },
        },
    }

</script>