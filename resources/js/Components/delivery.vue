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
        <div class="row margin-bottom-40">
          <!-- BEGIN SIDEBAR -->
          <div class="sidebar col-md-3 col-sm-5">
              <!-- BEGIN Catagories -->
      
              <ul class="list-group margin-bottom-25 sidebar-menu">
                <h4>Catagories</h4>
                <li v-for="Catagory in Catagories" :key="Catagory.id" class="list-group-item clearfix dropdown">
                  <a href="shop-product-list.html">
                    <i class="fa fa-angle-right"></i>
                    {{ Catagory.name }}
    
                  </a>
                </li>
              </ul>
            <div class="sidebar-filter margin-bottom-25">
              <h2>Filter</h2>
              <h3>Availability</h3>
              <div class="checkbox-list">
                <label><div class="checker"><span><input type="checkbox"></span></div> Not Available (3)</label>
                <label><div class="checker"><span><input type="checkbox"></span></div> In Stock (26)</label>
              </div>
            </div>
          </div>
          <!-- END SIDEBAR -->
          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-7">
            <div class="row list-view-sorting clearfix">
              <div class="col-md-2 col-sm-2 list-view">
                <a href="javascript:;"><i class="fa fa-th-large"></i></a>
                <a href="javascript:;"><i class="fa fa-th-list"></i></a>
              </div>
              <div class="col-md-10 col-sm-10">
                <div class="pull-right">
                  <label >Show:</label>
                  <select class="form-control">
                    <option value="#?limit=24">24</option>
                    <option value="#?limit=25">25</option>
                    <option value="#?limit=50">50</option>
                    <option value="#?limit=75">75</option>
                    <option value="#?limit=100">100</option>
                  </select>
                </div>
                <div class="pull-right">
                  <label >Sort&nbsp;By:</label>
                  <select class="form-control">
                    <option value="">Default</option>
                    <option value="">Name (A - Z)</option>
                    <option value="">Name (Z - A)</option>
                    <option value="">Price (Low &gt; High)</option>
                    <option value="">Price (High &gt; Low)</option>
                    <option value="">Rating (Highest)</option>
                    <option value="">Rating (Lowest)</option>
                    <option value="">New Model</option>
                  </select>
                </div>
              </div>
            </div>
            <!-- BEGIN PRODUCT LIST -->
            <div class="row product-list">
              <!-- PRODUCT ITEM START -->
              <div class="col-md-4 col-sm-6 col-xs-12" v-for="Product in Products" key="Product.id">
                <div class="product-item">
                  <div class="pi-img-wrapper" >
                    <img :src="Product.Images" class="img-responsive" >
                    <div>
                      <a href="assets/pages/img/products/model1.jpg" class="btn btn-default fancybox-button">Zoom</a>
                      <router-link :to="{ name: 'ShopItem', params: { id: Product.id } }" class="btn btn-default fancybox-fast-view">View</router-link>
                    </div>
                  </div>
                  <h3><a href="shop-item.html">{{ Product.Name }}</a></h3>
                  <div class="pi-price">{{Product.Price}}AF</div>
                  <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                </div>
              </div>
              <!-- PRODUCT ITEM END -->
            </div>
  
            <!-- END PRODUCT LIST -->
            <!-- BEGIN PAGINATOR -->
            <div class="row">
              <div class="col-md-8 col-sm-8">
                <ul class="pagination pull-right">
                  <li><a href="javascript:;">«</a></li>
                  <li><a href="javascript:;">1</a></li>
                  <li><span>2</span></li>
                  <li><a href="javascript:;">3</a></li>
                  <li><a href="javascript:;">4</a></li>
                  <li><a href="javascript:;">5</a></li>
                  <li><a href="javascript:;">»</a></li>
                </ul>
              </div>
            </div>
            <!-- END PAGINATOR -->
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>
  </template>
  <script>
  import axios from 'axios';
      export default
      {
         data()
         {
          return {
              Products:[],
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
          axios.get('/api/products').then(res => {
          this.Products = res.data;
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