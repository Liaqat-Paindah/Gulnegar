<template>
  <!-- BEGIN SLIDER -->
        <div class="isloading" v-if="isLoading">
        <p>Loading....</p>
      </div>
      <div class="Notloading" v-if="NotLoading">
  <div class="page-slider margin-bottom-35">
    <div id="carousel-example-generic" class="carousel slide carousel-slider">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>
      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <!-- First slide -->
        <div class="item carousel-item-four active">
          <div class="container">
            <div class="carousel-position-four text-center">
              <h2 class="margin-bottom-20 animate-delay carousel-title-v3 border-bottom-title text-uppercase"
                data-animation="animated fadeInDown">
                Welcome To <br /><span class="color-red-v2">Gulnegar</span><br />Handicrafts
            </h2>
              <p class="carousel-subtitle-v2" data-animation="animated fadeInUp">Gulnegar handicrafts have participated
                in deferent exhibitions and
                <br />arranged cultural programs and exhibitions.
              </p>
            </div>
          </div>
        </div>

        <!-- Second slide -->
        <div class="item carousel-item-five">
          <div class="container">
            <div class="carousel-position-four text-center">
              <h2 class="animate-delay carousel-title-v4" data-animation="animated fadeInDown">
                We have
              </h2>
              <p class="carousel-subtitle-v2" data-animation="animated fadeInDown">
                delivery services to all countries
              </p>
              <p class="carousel-subtitle-v3 margin-bottom-30" data-animation="animated fadeInUp">
                in the world via Post and Cargo.
              </p>
              <a class="carousel-btn" href="#" data-animation="animated fadeInUp">See More Details</a>
            </div>

          </div>
        </div>

        <!-- Third slide -->
        <div class="item carousel-item-six">
          <div class="container">
            <div class="carousel-position-four text-center">
              <span class="carousel-subtitle-v3 margin-bottom-15" data-animation="animated fadeInDown">
                Gulnegar Handicrafts
              </span>
              <p class="carousel-subtitle-v4" data-animation="animated fadeInDown">
                Sponsors
              </p>
              <p class="carousel-subtitle-v3" data-animation="animated fadeInDown">
                the cloths of Singers &amp; Artists.
              </p>
            </div>
          </div>
        </div>

        <!-- Fourth slide -->

      </div>

      <!-- Controls -->
      <a class="left carousel-control carousel-control-shop" href="#carousel-example-generic" role="button"
        data-slide="prev">
        <i class="fa fa-angle-left" aria-hidden="true"></i>
      </a>
      <a class="right carousel-control carousel-control-shop" href="#carousel-example-generic" role="button"
        data-slide="next">
        <i class="fa fa-angle-right" aria-hidden="true"></i>
      </a>
    </div>
  </div>
  <!---->
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="main">
        <div class=" ml-4 mr-4">
          <!-- BEGIN SALE PRODUCT & NEW ARRIVALS -->
          <!-- BEGIN SIDEBAR & CONTENT -->
          <div class="row margin-bottom-40 ">
            <!-- BEGIN Catagories -->
            <div class="sidebar col-md-3 col-sm-4">
              <ul class="list-group margin-bottom-25 sidebar-menu">
                <h4>Catagories</h4>
                <li v-for="Catagory in Catagories" :key="Catagory.id" class="list-group-item clearfix dropdown">
                  <router-link :to="{ name: 'Catagories', params: { id: Catagory.id } }">
                    <i class="fa fa-angle-right"></i>
                    {{ Catagory.name }}
    
                  </router-link>
                </li>
              </ul>
            </div>
            <div class="col-md-9">
              <div class="row">
                <h2 >New Products</h2>
                <p>he brand’s artisans produce stylish clothing including Hazaragi clothes, ceremonial and party wear dresses, modern clothes, and others. They also hand-sew products such as embroidered pillows and decorative items.</p>
                <div class="col-sm-4" v-for="Product in Products" :key="Product.id">
                  <div class="owl-carousel owl-carousel3 owl-theme owl-loaded">
                    <div class="owl-carousel owl-carousel3 owl-theme owl-loaded">
                      <div class="owl-stage-outer"  >
                        <div class="owl-stage">
                          <div class="owl-item active" style="width: 282.667px; margin-right: 0px;">
                            <div>
                              <div class="product-item" >
                                <div class="pi-img-wrapper">
                                  <img :src="Product.Images" class="img-responsive img-thumbnail" :alt="Product.Name">
                                  <div>
                                    <router-link :to="{ name: 'ShopItem', params: { id: Product.id } }"
                                      class="btn btn-default fancybox-fast-view">View</router-link>
                                  </div>
                                </div>
                                <h3><router-link :to="{name: 'ShopItem', params: { id: Product.id }}">{{ Product.Name }}</router-link></h3>
                                <div class="product-details">
                                <span class="btn btn-default btn-product">{{ Product.Price }}AF</span>
                                <router-link :to="{name: 'ShopItem', params: { id: Product.id }}" class="btn btn-default">Add Cart</router-link>
                                <div class="sticker sticker-new"></div>
                                <span class="btn btn-default btn-product">Info</span>
                               </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="owl-controls">
                        <div class="owl-nav">
                          <div class="owl-prev" style="display: none;">prev</div>
                          <div class="owl-next" style="display: none;">next</div>
                        </div>
                        <div class="owl-dots" style="">
                          <div class="owl-dot active"><span></span></div>
                          <div class="owl-dot"><span></span></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    
        </div>
      </div>
      
      <div class="main">
          <!-- BEGIN TWO PRODUCTS & PROMO -->
          <div class="row margin-bottom-35 fead-top ">                  
            <div class="col-sm-6 two-items-bottom-items">
              <h2 class="p-4">Top Models</h2>
              <p>Golnegar Handicrafts and supports the brand’s vision of reviving the desire for handmade and handwoven products. </p>
              <div class="row">
                <div class="col-sm-6" v-for="Model in Models" :key="Model.id">
                  <div class="owl-carousel owl-carousel2 owl-theme owl-loaded">
                    <div class="owl-stage-outer">
                      <div class="owl-stage" >
                        <div class="owl-item align-item" >
                          <div>
                            <div class="product-item">
                              <div class="pi-img-wrapper">
                                <img :src="Model.Image_Model" class="img-responsive img-thumbnail">
                                <div>
                                  <router-link :to="{name: 'Models', params: { id: Model.id } }" class="btn btn-default fancybox-fast-view">View</router-link>
                                    
                                </div>
                              </div>
                              <h3><router-link :to="{name: 'Models', params: { id: Model.id } }">{{ Model.Model_Name }} Models</router-link></h3>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="owl-controls">
                      <div class="owl-nav">
                        <div class="owl-prev" style="display: none;">prev</div>
                        <div class="owl-next" style="display: none;">next</div>
                      </div>
                      <div class="owl-dots" style="">
                        <div class="owl-dot active"><span></span></div>
                        <div class="owl-dot"><span></span></div>
                        <div class="owl-dot"><span></span></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    
            <div class="col-sm-6 shop-index-carousel">
              <div class="content-slider">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
    
                  <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="item active">
                      <img src="assets/pages/img/index-sliders/slide1.jpg" class="img-responsive col-sm-12"
                        alt="Berry Lace Dress">
                    </div>
                    <div class="item">
                      <img src="assets/pages/img/index-sliders/slide2.jpg" class="img-responsive col-sm-12"
                        alt="Berry Lace Dress">
                    </div>
                    <div class="item">
                      <img src="assets/pages/img/index-sliders/slide3.jpg" class="img-responsive col-sm-12"
                        alt="Berry Lace Dress">
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
      <div class="main">
          <!-- END TWO PRODUCTS & PROMO -->
        <div class="container-fluid">
          <div class="row margin-bottom-40">
            <!-- BEGIN SALE PRODUCT -->
            <div class="col-md-12 sale-product">
              <h2>Top Fabrics</h2>
              <div class="row">
                <div class="col-sm-3"  v-for="Fabric in Fabrics" :key="Fabric.id">
                  <div class="owl-carousel owl-carousel5 owl-theme owl-loaded">
                    <div class="owl-stage-outer">
                      <div class="owl-stage">
                        <div class="owl-item" style="width: 228px; margin-right: 0px;">
                          <div>
                            <div class="product-item">
                              <div class="pi-img-wrapper">
                                <img :src="Fabric.Images" class="img-responsive img-thumbnail" >
                                <div>
                                  <router-link :to="{name:'fabric', params:{id: Fabric.id} }" class="btn btn-default fancybox-fast-view">View</router-link>
                                </div>
                              </div>
                              <h3><router-link :to="{name:'fabric', params:{id: Fabric.id} }">{{Fabric.fabric_Name}} Fabrics</router-link></h3>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <!-- END SALE PRODUCT -->
          </div>
        </div>
        </div>
    </div>
  </div>
</div>
</div>

</template>
<script>
import axios from 'axios';
export default {
  data() {
    return {
      isLoading:true,
      NotLoading:false,
      Catagories: [],
      Products: [],
      Models: [],
      Fabrics: []
    }
  },
  mounted() {
    this.FetchData();

  },
  methods: {
    FetchData() {
      axios.get('/api/product').then(res => {
        this.Products = res.data;
        this.isLoading=false;
        this.NotLoading=true;
      }).catch(err => {
        console.log(err);
      });
      axios.get('/api/fabrics').then(res => {
        this.Fabrics = res.data;
      }).catch(err => {
        console.log(err);
      });
      axios.get('/api/catagories/').then(res => {
        this.Catagories = res.data;
      }).catch(err => {
        console.log(err);
      });
      axios.get('/api/models/').then(res => {
        this.Models = res.data;
      }).catch(err => {
        console.log(err);
      });
    }

  }
}
</script>

