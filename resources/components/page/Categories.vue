<template>
    <div class="content-wrapper">
        <div class="row justify-content-end mb-3">
            <div class="col-lg-6">
                <h3>All Categories</h3>
            </div>
            <div class="col-lg-6 text-md-right">
                <button class="btn btn-primary" @click="showCreateForm">New Category</button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-end">
                            <div class="col-md-8 col-sm-12">
                                <h4>Categories</h4>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="search-input">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Profile</th>
                                        <th>VatNo.</th>
                                        <th>Created</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Jacob</td>
                                        <td>53275531</td>
                                        <td>12 May 2017</td>
                                        <td><label class="badge badge-danger">Pending</label></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <form class="form" @submit.prevent>
                    <div class="card">
                            <div class="card-header">
                            <h4 class="card-title" v-if="editMood">Update Category</h4>
                            <h4 class="card-title" v-else>Add New Category</h4>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="name">name</label>
                                <input type="text" class="form-control" v-model="category.name" id="name"/>
                                <div class="error" v-if="category.errors.has('name')" v-html="category.errors.get('name')" />
                            </div>

                            <div class="form-group">
                                <label for="type" class="mb-0">Subject</label>
                                <v-select :options="parentCategories" v-model="category.parent_category" label="name" :reduce="name => name.id" :selectOnTab="true">
                                    <template #search="{attributes, events}">
                                        <input
                                        class="vs__search"
                                        v-bind="attributes"
                                        v-on="events"
                                        />
                                    </template>
                                </v-select>
                                <div class="error" v-if="category.errors.has('parent_category')" v-html="category.errors.get('parent_category')" />
                            </div>

                            <div class="form-group">
                                <label for="ordering_number">ordering number</label>
                                <input type="number" class="form-control" v-model="category.ordering_number" id="ordering_number"/>
                                <div class="error" v-if="category.errors.has('ordering_number')" v-html="category.errors.get('ordering_number')" />
                            </div>

                            <div class="form-group">
                                <label for="image">image</label>
                                <file-upload :dataModel.sync="category.image" serverAPI="/api/admin/upload/temp/image/file-pond/300/200" />
                                <div class="error" v-if="category.errors.has('image')" v-html="category.errors.get('image')" />
                            </div>

                            <div class="form-group">
                                <label for="meta_title">meta title</label>
                                <input type="text" class="form-control" v-model="category.meta_title" id="meta_title"/>
                                <div class="error" v-if="category.errors.has('meta_title')" v-html="category.errors.get('meta_title')" />
                            </div>

                            <div class="form-group">
                                <label for="meta_description">meta description</label>
                                <textarea class="form-control" v-model="category.meta_title" id="meta_description"/>
                                <div v-if="category.errors.has('meta_description')" v-html="category.errors.get('meta_description')" />
                            </div>

                            <div class="form-group">
                                <label for="image">meta image</label>
                                <file-upload :dataModel.sync="category.meta_image" serverAPI="/api/admin/upload/temp/image/file-pond/1200/630" />
                                <div class="error" v-if="category.errors.has('meta_image')" v-html="category.errors.get('meta_image')" />
                            </div>

                            <div class="form-group">
                                <label for="type" class="mb-0">filtering attributes</label>
                                <v-select :options="filtering_attributes" v-model="category.filtering_attributes" multiple label="name" :reduce="name => name.id" :selectOnTab="true">
                                    <template #search="{attributes, events}">
                                        <input
                                        class="vs__search"
                                        v-bind="attributes"
                                        v-on="events"
                                        />
                                    </template>
                                </v-select>
                                <div class="error" v-if="category.errors.has('parent_category')" v-html="category.errors.get('parent_category')" />
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" v-if="editMood" @click="update">Update</button>
                        <button type="submit" class="btn btn-primary" v-else @click="store">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
export default {

    data(){
        return {
            category: new Form({
                id: '',
                name: '',
                parent_category: '',
                ordering_number: '',
                image: '',
                meta_title: '',
                meta_description: '',
                meta_image: '',
                filtering_attributes: [],
            }),

            editMood: false,

            //Form Dependency
            parentCategories: [],
            filtering_attributes: []
        }
    },
    methods: {
        async update(){

        },

        async store(){
            await this.category.post('/api/admin/categories')
            .then(res=>{
                console.log(res);
            })
            .catch(e=>{
                console.log(e);
            })
        },

        showCreateForm(){
            this.editMood = false;
            this.category.reset();
            this.category.clear();
            $("#defaultModal").modal({backdrop: 'static', keyboard: false});
        }
    },
}
</script>