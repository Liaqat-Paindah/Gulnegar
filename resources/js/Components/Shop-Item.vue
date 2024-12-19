<template>
    <div class="main">
        <div class="container">
          <ul class="breadcrumb">
              <li><router-link :to="{name: 'Home'}">Home</router-link></li>
              <li><router-link :to="{name: 'Products'}">Shopping</router-link></li>
              <li class="active">{{Product.Name}}</li>
          </ul>
          <!-- BEGIN SIDEBAR & CONTENT -->
          <div class="row margin-bottom-40">
            <div class="isloading" v-if="isLoading">
              <p>Loading....</p>
            </div>
            <div class="Notloading" v-if="NotLoading">
            <!-- BEGIN SIDEBAR -->
            <div class="sidebar col-md-3 col-sm-5">
              <ul class="list-group margin-bottom-25 sidebar-menu" v-for="Catagory in Catagories" :key="Catagory.id">
                <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> {{Catagory.name}}</a></li>
              </ul>
  

            </div>
            <!-- END SIDEBAR -->
  
            <!-- BEGIN Product -->
            <div class="col-md-9 col-sm-7">
              <div class="product-page">
                <div class="row">
                  <div class="col-md-6 col-sm-6">
                    <div class="product-main-image" style="position: relative; overflow: hidden;">
                      <img :src="Product.Images" alt="{{Product.Name}}" class="img-responsive" data-bigimgsrc={{Product.Images}}>
                    <img :src="Product.Images" class="zoomImg" style="position: absolute; top: -93.9926px; left: -49.3639px; opacity: 0; width: 800px; height: 1000px; border: none; max-width: none;"></div>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <h1>{{Product.Name}}</h1>
                    <div class="price-availability-block clearfix">
                      <div class="price">
                        <strong>{{Product.Price}}AF</strong>
                      </div>
                      <div class="availability">
                        Availability: <strong>{{Product.Status}}</strong>
                      </div>
                    </div>
                    <div class="description">
                      <p> {{Product.Desc}}</p>
                    </div>
                    <div class="product-page-options">
                      <div class="pull-left">
                        <label class="control-label">Color: {{Product.Color}}</label>
                      </div>
                      <div class="pull-left">
                        <label class="control-label">Size:{{Product.Size}}</label>
                      </div>
                    </div>
                    <div class="product-page-cart">
                      <div class="product-quantity">
                          <div class="input-group bootstrap-touchspin input-group-sm"><span class="input-group-btn"><button class="btn quantity-down bootstrap-touchspin-down" type="button"><i class="fa fa-angle-down"></i></button></span><span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span><input id="product-quantity" type="text" value="1" readonly="" class="form-control input-sm" style="display: block;"><span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span><span class="input-group-btn"><button class="btn quantity-up bootstrap-touchspin-up" type="button"><i class="fa fa-angle-up"></i></button></span></div>
                      </div>
                      <router-link :to="{name: 'add_cart', params:{id: Product.id} }" class="btn btn-primary" type="submit">Add to Cart</router-link>
                    </div>
                    <ul class="list-unstyled list-inline">
                      <li><a href="" class="fab fa-whatsapp fa-lg"></a></li>
                      <li><a href="" class="fab fa-youtube fa-lg"></a></li>
                      <li><a href="" class=" fab fa-facebook fa-lg"></a></li>
                      <li><a href="" class="fab fa-telegram fa-lg"></a></li>
                      <li><a href="" class=" fab fa-instagram fa-lg"></a></li>
                      <li><a href="" class=" fab fa-google fa-lg"></a></li>
                    </ul>
                    <div class="product-other-images" >
                      <p></p>
                      <span v-for="Image in Images">
                      <a :href="Image.Image_Path"  class="fancybox-button" rel="photos-lib"><img :src="Image.Image_Path"></a>
                      </span>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <!-- END Product -->
          </div>
          
          <!-- END SIDEBAR & CONTENT -->
          <div class="row margin-bottom-40">
          <div class="col-md-12 col-sm-12">
            <div class="owl-carousel owl-carousel4 owl-theme owl-loaded">            
            <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0.25s ease 0s; width: 1710px;"><div class="owl-item active" style="width: 285px; margin-right: 0px;"><div>
              </div></div><div class="owl-item active" style="width: 285px; margin-right: 0px;"><div>

              </div></div><div class="owl-item active" style="width: 285px; margin-right: 0px;"><div>
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <div>
                      <a href="assets/pages/img/products/k3.jpg" class="btn btn-default fancybox-button"></a>
                    </div>
                  </div>
                </div>
              </div></div><div class="owl-item active" style="width: 285px; margin-right: 0px;"><div>
                <div class="product-item" >
                  <div class="pi-img-wrapper">
                    <div>
                    </div>
                  </div>
                  <div class="sticker sticker-sale"></div>
                </div>
              </div></div></div></div><div class="owl-controls"><div class="owl-nav"><div class="owl-prev" style="display: none;">prev</div><div class="owl-next" style="display: none;">next</div></div><div style="" class="owl-dots"><div class="owl-dot active"><span></span></div><div class="owl-dot"><span></span></div></div></div></div>
          </div>
        </div>
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
            Product: {Name:'', Color: '', Size: '',desc: '', Images: '', Price:''},
            id:this.$route.params.id,
            Product_ID:this.$route.params.id,
            Catagories: [],
            Images:[],
            isLoading:true,
          NotLoading:false,
        }
    },
    mounted()
{
    this.getData();
    },
    methods:
    {
    getData()
    {
        axios.get('/api/product/'+this.$route.params.id).then((res)=>{
        this.Product=res.data; 
        this.isLoading=false;
        this.NotLoading=true;
        })
        axios.get('/api/catagories/').then((res)=>{
        this.Catagories=res.data; 
        })
        axios.get('/api/Image/'+this.Product_ID).then((res)=>{
        this.Images=res.data; 
        })
        axios.get('/api/product').then(res => {
        this.Products = res.data;
      }).catch(err => {
        console.log(err);
      });
    }
    }
}
</script>