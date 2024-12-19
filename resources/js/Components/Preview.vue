<template>
<div class="container">
  <ul class="breadcrumb">
    <li><router-link :to="{name: 'Home'}">Home</router-link></li>
    <li class="active">Preview</li>
</ul>
  <div class="row">
    <div class="col-md-4">
                      <ul class="list-group margin-bottom-25 sidebar-menu">
                          <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Login/Register</a></li>
                          <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Restore Password</a></li>
                          <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> My account</a></li>
                          <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Products</a></li>
                          <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> New Fabrics</a></li>
                          <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> New Models</a></li>
                          <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> handmade Products</a></li>
                          <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Catagories</a></li>
                          <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Delivery Information</a></li>
                          <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Order Tracking</a></li>
                          <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i>  Payment Methods</a></li>
                          <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Careers</a></li>
                          <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Shipping & Returns</a></li>
                        </ul>
                    
                      <ul class="social-icons margin-bottom-10">
                        <li><a href="javascript:;" data-original-title="facebook" class="facebook"></a></li>
                        <li><a class="youtube" data-original-title="youtube" href="javascript:;"></a></li>
                        <li><a class="instagram" data-original-title="Instagram" href="javascript:;"></a></li>
                        <li><a href="javascript:;" data-original-title="Goole Plus" class="googleplus"></a></li>
                        <li><a href="javascript:;" data-original-title="linkedin" class="linkedin"></a></li>
                      </ul>
              </div>
    <div class="col-md-8">
      <img :src="Product.Images" class="img-thumbnail col-sm-8">
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
          Product: {Images: ''},
          id:this.$route.params.id
        }
    },
    mounted() {
    this.FetchData();

    },
    methods: {
      FetchData() {
        axios.get('/api/product/'+this.$route.params.id).then(res=>{
          this.Product=res.data;
        }).catch(err=>
        {
          console.log(err);
        });

    }

}
}
</script>