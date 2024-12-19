<template>
    <div>
        <div class="container">
            <ul class="breadcrumb">
                <li><router-link :to="{name: 'Home'}">Home</router-link></li>
                <li class="active">Contact</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
              <!-- BEGIN SIDEBAR -->
              <div class="sidebar col-md-3 col-sm-3">
                <ul class="list-group margin-bottom-25 sidebar-menu">
                  <li class="list-group-item clearfix"><router-link :to="{name: 'login'}"><i class="fa fa-angle-right"></i> Login/Register</router-link></li>
                  <li class="list-group-item clearfix"><router-link :to="{name: 'register'}"><i class="fa fa-angle-right"></i> Restore Password</router-link></li>
                  <li class="list-group-item clearfix"><router-link :to="{name: 'login'}"><i class="fa fa-angle-right"></i> My account</router-link></li>
                  <li class="list-group-item clearfix"><router-link :to="{name: 'Products'}"><i class="fa fa-angle-right"></i> Products</router-link></li>
                  <li class="list-group-item clearfix"><router-link :to="{name: 'Home'}"><i class="fa fa-angle-right"></i> New Fabrics</router-link></li>
                  <li class="list-group-item clearfix"><router-link :to="{name: 'Home'}"><i class="fa fa-angle-right"></i> New Models</router-link></li>
                  <li class="list-group-item clearfix"><router-link :to="{name: 'Home'}"><i class="fa fa-angle-right"></i> handmade Products</router-link></li>
                  <li class="list-group-item clearfix"><router-link :to="{name: 'Home'}"><i class="fa fa-angle-right"></i> Catagories</router-link></li>
                  <li class="list-group-item clearfix"><router-link :to="{name: 'Home'}"><i class="fa fa-angle-right"></i> Delivery Information</router-link></li>
                  <li class="list-group-item clearfix"><router-link :to="{name: 'Home'}"><i class="fa fa-angle-right"></i> Order Tracking</router-link></li>
                  <li class="list-group-item clearfix"><router-link :to="{name: 'Home'}"><i class="fa fa-angle-right"></i>  Payment Methods</router-link></li>
                  <li class="list-group-item clearfix"><router-link :to="{name: 'Home'}"><i class="fa fa-angle-right"></i> Careers</router-link></li>
                  <li class="list-group-item clearfix"><router-link :to="{name: 'Home'}"><i class="fa fa-angle-right"></i> Shipping & Returns</router-link></li>
  
                </ul>
                <h2>Our Contacts</h2>
                <address>
                    Shop No: 1-2 and 3, 4th Floor, Barchi City Walk, Shahid Mazari Road, 13 District, Kabul, Afghanistan.<br>
                  <abbr title="Phone">Phone:</abbr> +93776317617<br>
                </address>
                <address>
                  <strong>Email</strong><br>
                  <a href="mailto:R.Ahmadi0434@gmail.com">R.Ahmadi0434@gmail.com</a><br>
                </address>
                <ul class="social-icons margin-bottom-10">
                  <li><a href=""> <i class="fab fa-youtube"></i> </a></li>
                  <li><a href="" class=" fab fa-facebook"></a></li>
                  <li><a href="" class="fab fa-telegram"></a></li>
                  <li><a href="" class=" fab fa-instagram"></a></li>
                  <li><a href="" class=" fab fa-google"></a></li>
                </ul>
              </div>
              <!-- END SIDEBAR -->
    
              <!-- BEGIN CONTENT -->
              <div class="col-md-9 col-sm-9">
                <div class="content-page">
                  <h2>Contact Form</h2>
                  <p></p>
                  <!-- BEGIN FORM-->
                  <form action="#" class="default-form" role="form">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                      <label for="email">Email <span class="require">*</span></label>
                      <input type="text" class="form-control" id="email">
                    </div>
                      <div class="form-group">
                        <label for="email">Subject <span class="require">*</span></label>
                        <input type="text" class="form-control" id="email">
                      </div>
                    <div class="form-group">
                      <label for="message">Message</label>
                      <textarea class="form-control" rows="8" id="message"></textarea>
                    </div>                 
                      <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                
                  <!-- END FORM-->          
                </div>
              </div>
              <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->
          </div>
    </div>
</template>
<script>
    export default
    {
        
    }
</script>