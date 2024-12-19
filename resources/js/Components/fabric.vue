<template>
    <div class="isloading" v-if="isLoading">
      <p>Loading....</p>
    </div>
    <div class="Notloading" v-if="NotLoading">
      <div class="title-wrapper">
        <div class="container"><div class="container-inner">
          <h1>Top Fabrics </h1>
          <em>Modern Products are available here</em>
        </div></div>
      </div>
      <div class="main">
        <div class="container">
          <ul class="breadcrumb">
              <li><router-link :to="{name: 'Home'}">Home</router-link> </li>
              <li><router-link :to="{name: 'fabric'}">Fabrics</router-link> </li>
          </ul>
          <!-- BEGIN SIDEBAR & CONTENT -->
          <div class="row margin-bottom-40">
            <!-- BEGIN SIDEBAR -->
            <div class="sidebar col-md-3 col-sm-5">
                <!-- BEGIN Catagories -->
        
                <ul class="list-group margin-bottom-25 sidebar-menu">
                  <h4>Top Fabrics</h4>
                  <li v-for="fabric in Topfabrics" :key="fabric.id" class="list-group-item clearfix dropdown">
                    <router-link :to="{name: 'Home'}">
                      <i class="fa fa-angle-right"></i>
                      {{ fabric.fabric_Name }}
                    </router-link>
                  </li>
                </ul>
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="col-md-9 col-sm-7">
              <div class="row">
                <div class="col-md-6">
                  <p>Search String to Find Hazaragi Models:</p>
                </div>
                <div class="col-md-6">
                  <form action="#">
                    <div class="input-group">
                      <input type="text" placeholder="Search Model" class="form-control">
                      <span class="input-group-btn">
                        <button class="btn btn-info" type="submit">Search</button>
                      </span>
                    </div>
                  </form>
                </div>
              </div>
              <br>
              <!-- BEGIN PRODUCT LIST -->
              <div class="row product-list">
                <!-- PRODUCT ITEM START -->
                <div class="col-md-4 col-sm-6 col-xs-12" v-for="Product in Products" key="Product.id">
                  <div class="product-item">
                    <div class="pi-img-wrapper" >
                      <img :src="Product.Images" class="img-responsive" >
                      <div>
                        <router-link :to="{ name: 'ShopItem', params: { id: Product.id } }" class="btn btn-default fancybox-fast-view">View</router-link>
                      </div>
                    </div>
                    <h3><router-link :to="{ name: 'ShopItem', params: { id: Product.id } }"> {{Product.fabric_Name}}</router-link></h3>
                    <div class="pi-price">{{Product.Price}}AF</div>
                    <router-link :to="{ name: 'ShopItem', params: { id: Product.id } }" class="btn btn-default add2cart">Add to cart</router-link>
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
          <!-- END SIDEBAR & CONTENT -->
        </div>
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
                isLoading:true,
                NotLoading:false,
                Products:[],
                Topfabrics:{},
                Fabric_ID:this.$route.params.id
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
            axios.get('/api/fabric/'+this.Fabric_ID).then(res => {
            this.Products = res.data;
            this.isLoading=false;
          this.NotLoading=true;
          }).catch(err => {
            console.log(err);
          });
          axios.get('/api/fabric/').then(res => {
            this.Topfabrics = res.data;
          }).catch(err => {
            console.log(err);
          });
           }
           } 
        }
        
    </script>