<template>

    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><router-link :to="{name: 'Home'}">Home</router-link> </li>
            <li><router-link :to="{name: 'product_list'}">Product List</router-link> </li>
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
            <div class="content-search margin-bottom-20">
              <div class="row">
                <div class="col-md-6">
                  <p>Search String to Find Products:</p>
                </div>
                <div class="col-md-6">
                  <form action="#">
                    <div class="input-group">
                      <input type="text" placeholder="Search Image" class="form-control">
                      <span class="input-group-btn">
                        <button class="btn btn-info" type="submit">Search</button>
                      </span>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- BEGIN PRODUCT LIST -->
            <div class="row product-list">
              <!-- PRODUCT ITEM START -->
              <div class="col-md-12 table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Weight</th>
                            <th>Gender</th>
                            <th>Date</th>
                            <th>Model</th>
                            <th>Sewing</th>
                            <th>Fabric</th>
                            <th>Status</th>
                            <th colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="Product in Products.data" key="Product.id">
                            <th>{{Product.id}}</th>
                            <th>{{Product.Name}}</th>
                            <th>{{Product.Color}}</th>
                            <th>{{Product.Size}}</th>
                            <th>{{Product.Weight}}</th>
                            <th>{{Product.Gender}}</th>
                            <th>{{Product.Date}}</th>
                            <th>{{Product.Model_Name}}</th>
                            <th>{{Product.Sewing_Name}}</th>
                            <th>{{Product.fabric_Name}}</th>
                            <th>{{Product.Status}}</th>
                            <th> <router-link :to="{name: 'product_edit' ,params: {id:Product.id} }"><i class="fa fa-edit fa-sm"></i> </router-link>  </th>
                            <th> <router-link :to="{name: 'product_remove',params: {id:Product.id} }"><i class="fa fa-trash fa-sm"></i> </router-link>  </th>
                        </tr>
                    </tbody>
                </table>
                <router-link class="btn btn-primary btn-sm" :to="{name: 'add_product'}"> New Product </router-link>
                <div class="row">
                  <div class="col-md-8 col-sm-8">
                    <ul class="pagination pull-right">
                      <Bootstrap4Pagination  :data="Products"  @pagination-change-page="fetchdata" ></Bootstrap4Pagination> 
                    </ul>
                  </div>
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
  import { Bootstrap4Pagination } from 'laravel-vue-pagination';
  import axios from 'axios';
      export default
      {
        components:
  {
    Bootstrap4Pagination:Bootstrap4Pagination
  },
         data()
         {
          return {
            isLoading:true,
            NotLoading:false,
              Products:{},
              Catagories:[]
          }
         },
         mounted()
         {
          this.fetchdata();
         },
         methods:
         {
         fetchdata(page=1)
         {
          axios.get('/api/products?page='+page).then(res => {
          this.Products = res.data;
          this.isLoading=false;
          this.NotLoading=true;
        }).catch(err => {
          console.log(err);
        });
        axios.get('/api/catagories/').then(res => {
          this.Catagories = res.data;
        }).catch(err => {
          console.log(err);
        });
         }
         } 
      }
      
  </script>