<template>
    <div class="container">
        <div class="row">
                    <div class="col-md-4">
                      <div class="product-main-image" style="position: relative; overflow: hidden;">
                        <img :src="Product.Images" alt="{{Product.Name}}" class="img-responsive" data-bigimgsrc={{Product.Images}}>
                      <img :src="Product.Images" class="zoomImg" style="position: absolute; top: -93.9926px; left: -49.3639px; opacity: 0; width: 800px; height: 1000px; border: none; max-width: none;"></div>
                    </div>
                    <div class="col-md-8">
                        <br>
                      <div class="price-availability-block clearfix">
                        <div class="price">
                            <strong> {{Product.Name}}</strong>
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
                        <div class="pull-left">
                            <label class="control-label">Price:{{Product.Price}}USD</label>
                          </div>
                      </div>
                      <table class="table price-availability-block clearfix">
                        <tr>
                            <th>ID</th>
                            <th>Country</th>
                            <th>City</th>
                            <th>Province</th>
                            <th>District</th>
                            <th>Home</th>
                            <th>Address</th>
                        </tr>
                        <tr v-for="delivery in deliveries"  key="delivery.id">
                          <th>  {{delivery.Customer_ID}}</th>
                            <td>{{delivery.Country}}</td>
                            <td>{{delivery.City}}</td>
                            <td>{{delivery.Province}}</td>
                            <td>{{delivery.District}}</td>
                            <td>{{delivery.Home }}</td>
                            <td>{{delivery.Address }}</td>
                        </tr>
                      </table>

                      <table class="table price-availability-block clearfix">
                        <tr>
                            <th>Name</th>
                            <th>LastName</th>
                            <th>Phone</th>
                            <th>Email</th>
                        </tr>
                        <tr v-for="customer in customers" key="customer.id">
                            <td>{{customer.Customer_Name}}</td>
                            <td>{{customer.LastName}}</td>
                            <td>{{customer.Phone}}</td>
                            <td>{{customer.Email}}</td>
                        </tr>
                      </table>
                      
                      <div class="product-page-cart">
                        <router-link :to="{name: 'confirmation' }" class="btn btn-info" type="submit">Approve</router-link>
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
              deliveries:{},
              customers: { },

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
          axios.get('/api/customers/'+this.$route.params.id).then((res)=>{
          this.customers=res.data; 
          })
          axios.get('/api/deliveries/'+this.Product_ID).then((res)=>{
          this.deliveries=res.data; 
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
  <style scoped>
  .Product-delete
  {
    padding: 10px;
    margin: 10%;
    background: rgb(255, 255, 255);
    box-shadow: 0px 4px 20px 4px rgba(0, 0, 0, 0.08);
  }
  .Product-delete [type="submit"]
  {
    margin-left: 25%
  }
  .table
  {
    width: 100%;
  }
  .table tr 
  {
    height: 32px;
  }
  .table tr td, th
  {
    border: 1px solid #909daa;
    font-size: 13px;
  }

  </style>