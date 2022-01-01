<template>
    <div class="content-wrapper">
        <h1>Dashboard Page</h1>

        <h1 class="text-success" v-if="$store.getters.isAuthenticated">Authenticate User</h1>
        <button @click="modalShow">Show Modal</button>
        <div class="modal-aria">

        <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#ml-select-file">Select File</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#ml-upload-file">Upload</a>
                            </li>
                        </ul>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Tab panes -->
                        <div class="tab-content border border-0">
                            <div class="tab-pane container active" id="ml-select-file">
                                files
                            </div>
                            <div class="tab-pane container fade" id="ml-upload-file">
                                upload
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>
</template>
<script>
export default {
    data(){
        return {
            user: {},
        }
    },
    methods: {
        modalShow(){
            $('#defaultModal').modal({backdrop: 'static', keyboard: false});
        }
    },
    async mounted(){
        this.user = this.$store.getters.loggedInUser;

        // console.log('dashbord user start');
        // await axios.get('/api/admin/me')
        // .then(res=>{
        //     console.log(res.data.id);
        // })
        // .catch(e=>{
        //     console.log(e.data);
        // })
        // console.log('dashboard user end');
    }
}
</script>