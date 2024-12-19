<template>
    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><router-link :to="{ name: 'Home' }">Home</router-link> </li>
                <li><router-link :to="{ name: 'add_product' }">New Product </router-link> </li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="isloading" v-if="isLoading">
                <p>Loading....</p>
            </div>
            <div class="Notloading" v-if="NotLoading">
                <div class="row margin-bottom-40">

                    <!-- BEGIN SIDEBAR -->
                    <!-- END SIDEBAR -->
                    <!-- BEGIN CONTENT -->
                    <div class="col-md-12 col-sm-7">

                        <!-- BEGIN PRODUCT LIST -->
                        <div class="row product-list">
                            <!-- PRODUCT ITEM START -->
                            <div class="col-md-12 table-responsive">
                                <div class="row">
                                    <div class="col-md-2"></div>

                                    <div class="col-md-8">
                                        <h2>New Image</h2>
                                    </div>
                                </div>
                                <div class="row">

                                    <form v-on:submit.prevent="submit" class="default-form" method="post" role="form"
                                        enctype="multipart/form-data">

                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="name">Product Name: <span class="require">*</span></label>
                                                    <select v-model="Images.Name" class="form-control">
                                                        <option v-for="Product in Products.data" :key="Product.id"
                                                            :value="Product.id"> {{ Product.Name }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="name">Product ID: <span class="require">*</span></label>
                                                    <select v-model="Images.Product_ID" class="form-control">
                                                        <option v-for="Product in Products.data" :key="Product.id"
                                                            :value="Product.id"> {{ Product.id }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="name">Photo: <span class="require">*</span></label>
                                                    <input type="file" v-on:change="Changes" class="form-control" required
                                                        id="Photo">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <button class="btn btn-primary btn-sm" type="submit" id="button-confirm"> <i
                                                        class="fa fa-save"></i> Save</button>
                                                <router-link class="btn btn-danger btn-sm" :to="{ name: 'img_list' }">Return
                                                    Back</router-link>
                                            </div>
                                        </div>
                                    </form>
                                    <br> <br>
                                </div>
                            </div>
                            <!-- PRODUCT ITEM END -->
                        </div>

                        <!-- END PRODUCT LIST -->
                        <!-- BEGIN PAGINATOR -->

                        <!-- END PAGINATOR -->
                    </div>
                    <!-- END CONTENT -->
                </div>
            </div>
            <!-- END SIDEBAR & CONTENT -->
        </div>
    </div>
</template>
<script>
import axios from "axios";
import { Bootstrap4Pagination } from 'laravel-vue-pagination';

export default {
    components:
    {
        Bootstrap4Pagination: Bootstrap4Pagination
    },
    data() {
        return {
            Products: [],
            NotLoading: true,
            isLoading: false,
            Images: {
                Name: "",
                Product_ID: ""
            },
            Image: null,
        };
    },
    mounted() {
        this.FetchData();
    },
    methods: {
        FetchData(page = 1) {
            axios.get('/api/products?page=' + page).then(res => {
                this.Products = res.data;
            }).catch(err => {
                console.log(err);
            });
        },
        Changes(e) {
            this.Image = e.target.files[0];
        },
        submit() {
            const FileUpload = new FormData;
            FileUpload.append('Product_ID', this.Images.Product_ID);
            FileUpload.append('Name', this.Images.Name);
            FileUpload.append('Image', this.Image);
            axios.post("/api/Image", FileUpload).then((res) => {
                this.$router.push({ name: "img_list" }).catch((error) => {
                    console.log(error);
                });
            });
        },
    },
};
</script>