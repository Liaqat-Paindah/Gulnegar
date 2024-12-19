<template>

    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><router-link :to="{name: 'Home'}">Home</router-link> </li>
            <li><router-link :to="{name: 'Pendding'}">Pendding List</router-link> </li>
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
                  <p>Search String to Find orders:</p>
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
                            <th>Email</th>
                            <th>Whatsapp</th>
                            <th>Order</th>
                            <th colspan="2">State</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="order in orders.data" key="order.id">
                            <th>{{order.id}}</th>
                            <th>{{order.name}}</th>
                            <th>{{order.email}}</th>
                            <th>{{order.whatsapp}}</th>
                            <th>{{order.order}}</th>
                            <th> <router-link :to="{name: 'order_remove',params: {id:order.id} }"><i class="fa fa-trash fa-sm"></i> </router-link>  </th>
                        </tr>
                    </tbody>
                </table>
                <div class="row">
                  <div class="col-md-8 col-sm-8">
                    <ul class="pagination pull-right">
                      <Bootstrap4Pagination  :data="orders"  @pagination-change-page="fetchdata" ></Bootstrap4Pagination> 
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
              orders:{},
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
          axios.get('/api/orders?page='+page).then(res => {
          this.orders = res.data;
          this.isLoading=false;
          this.NotLoading=true;
        }).catch(err => {
          console.log(err);
        });
      }
      }
    }
      
  </script>