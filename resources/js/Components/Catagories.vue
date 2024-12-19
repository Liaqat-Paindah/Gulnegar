<template>
    <div>
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
                  <li><router-link :to="{name: 'Catagories'}">Catagory</router-link> </li>
              </ul>
              <!-- BEGIN SIDEBAR & CONTENT -->
              <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-7">

                  <div class="content-search margin-bottom-20">
                    <div class="row">
                      <div class="col-md-6">
                        <p>Search String to Find Product:</p>
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
                  <div class="row">
                    <!-- PRODUCT ITEM START -->
                    <div class="col-md-3" v-for="detail in details" key="detail.id">
                      <div class="product-item">
                        <div class="pi-img-wrapper" >
                          <img :src="detail.Images" class="img-responsive" >
                          <div>
                            <a href="assets/pages/img/products/model1.jpg" class="btn btn-default fancybox-button">Zoom</a>
                            <router-link :to="{ name: 'ShopItem', params: { id: detail.id } }" class="btn btn-default fancybox-fast-view">View</router-link>
                          </div>
                        </div>
                        <h3><a href="shop-item.html">{{ detail.Name }}</a></h3>
                        <div class="pi-price">{{detail.Price}}AF</div>
                        <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                      </div>
                    </div>
                    <!-- PRODUCT ITEM END -->
                  </div>
        
                  <!-- END PRODUCT LIST -->
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
        data() {
            return {
                id: this.$route.params.id,
                details:[]
            }
        },
        mounted() {
            this.FetchData();
        },
        methods:
        {
            FetchData() {
                axios.get('/api/catagories/' + this.id).then((res) => {
                    this.details = res.data;
                }).catch(err => {
                    console.log(err);
                });
            }
        }


    }
</script>