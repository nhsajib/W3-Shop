<template>
    <file-pond
        name="w3image"
        ref="pond"
        label-idle="Drop files here..."
        v-bind:allow-multiple="false"
        accepted-file-types="image/jpeg, image/png"
        :server=serverAPI
        @processfile="updateDataModel"
        @removefile="removeData"
    />
</template>
<script>
// Import Vue FilePond
import vueFilePond from "vue-filepond";
import "filepond/dist/filepond.min.css";

const FilePond = vueFilePond();

export default {
    components: {
        FilePond,
    },

    props: {
        serverAPI: String,
        dataModel: String,
    },

    methods: {
        updateDataModel(err, file){
            this.$emit('update:dataModel', file.serverId);
        },

        removeData(){
            axios.put('/api/admin/upload/temp/file-pond/remove', {'path' : this.dataModel})
            .then(res=>{
                this.$emit('update:dataModel', '');
            })
            .catch(e=>{
                console.log(e);
            })
        }
    },

    beforeDestroy(){
        alert('hello');
        // console.log(this.dataModel);
    }
}
</script>
<style>
.filepond--credits{
    display: none;
}
</style>