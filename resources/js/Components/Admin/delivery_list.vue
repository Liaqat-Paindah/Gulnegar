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
                            <th>Country</th>
                            <th>Province</th>
                            <th>Region</th>
                            <th>Zip Code</th>
                            <th>Address</th>
                            <th>Home</th>
                            <th>Status</th>
                            <th>Product_ID</th>
                            <th>Customer</th>
                            <th colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="delivery in deliveries" key="delivery.id">
                            <th>{{delivery.id}}</th>
                            <th>{{delivery.Country}}</th>
                            <th>{{delivery.Province}}</th>
                            <th>{{delivery.District}}</th>
                            <th>{{delivery.City}}</th>
                            <th>{{delivery.Address}}</th>
                            <th>{{delivery.Home}}</th>
                            <th>{{delivery.Status}}</th>
                            <th>{{delivery.Product_ID}}</th>
                            <th>{{delivery.Customer_ID}}</th>
                            <th> <router-link :to="{name: 'delivery_remove',params: {id:delivery.id} }"><i class="fa fa-trash fa-sm"></i> </router-link>  </th>
                        </tr>
                    </tbody>
                </table>
                <div class="row">
                  <div class="col-md-8 col-sm-8">
                    <ul class="pagination pull-right">
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
              deliveries:{},
              Catagories:[]
          }
         },
         mounted()
         {
          this.fetchdata();
         },
         methods:
         {
         fetchdata()
         {
          axios.get('/api/deliveries').then(res => {
          this.deliveries = res.data;
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