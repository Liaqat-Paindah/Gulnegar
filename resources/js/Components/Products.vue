<template>
  <div class="title-wrapper">
    <div class="container"><div class="container-inner">
      <h1>All Catagory</h1>
      <em>Modern Products are available here</em>
    </div></div>
  </div>
  <div class="main">
    <div class="container">
      <ul class="breadcrumb">
          <li><router-link :to="{name: 'Home'}">Home</router-link> </li>
          <li><router-link :to="{name: 'Products'}">Products</router-link> </li>
      </ul>
      <!-- BEGIN SIDEBAR & CONTENT -->
      <div class="isloading" v-if="isLoading">
        <p>Loading....</p>
      </div>
      <div class="Notloading" v-if="NotLoading">
      <div class="row margin-bottom-40">

        <!-- BEGIN SIDEBAR -->
        <div class="sidebar col-md-3 col-sm-5">
            <!-- BEGIN Catagories -->
    
            <ul class="list-group margin-bottom-25 sidebar-menu">
              <h4>Catagories</h4>
              <li v-for="Catagory in Catagories" :key="Catagory.id" class="list-group-item clearfix dropdown">
                <router-link :to="{name:'Home'}">
                  <i class="fa fa-angle-right"></i>
                  {{ Catagory.name }}
  
                </router-link>
              </li>
            </ul>
          <div class="sidebar-filter margin-bottom-25">
            <h2>Filter</h2>
            <h3>Availability</h3>
            <div class="checkbox-list">
              <label><div class="checker"><span><input type="checkbox"></span></div> Not Available </label>
              <label><div class="checker"><span><input type="checkbox"></span></div> In Stock </label>
            </div>
          </div>
        </div>
        <!-- END SIDEBAR -->
        <!-- BEGIN CONTENT -->
        <div class="col-md-9 col-sm-7">
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
            <div class="col-md-4 col-sm-6 col-xs-12" v-for="Product in Products.data" key="Product.id">
              <div class="product-item">
                <div class="pi-img-wrapper" >
                  <img :src="Product.Images" class="img-responsive" >
                  <div>
                    <router-link :to="{ name: 'ShopItem', params: { id: Product.id } }" class="btn btn-default fancybox-fast-view">View</router-link>
                  </div>
                </div>
                <h3><router-link :to="{ name: 'ShopItem', params: { id: Product.id } }">{{ Product.Name }}</router-link></h3>
                <div class="pi-price">{{Product.Price}}AF</div>
                <router-link :to="{ name: 'ShopItem', params: { id: Product.id } }" class="btn btn-default add2cart">Shop Now</router-link>
              </div>
            </div>
            <!-- PRODUCT ITEM END -->
          </div>

          <!-- END PRODUCT LIST -->
          <!-- BEGIN PAGINATOR -->
          <div class="row">
            <div class="col-md-8 col-sm-8">
              <ul class="pagination pull-right">
                <Bootstrap4Pagination  :data="Products"  @pagination-change-page="fetchdata" ></Bootstrap4Pagination> 
              </ul>
            </div>
          </div>
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