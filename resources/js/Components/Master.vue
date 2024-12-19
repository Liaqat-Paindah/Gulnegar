<template>
    <!-- BEGIN TOP BAR -->
    <div class="pre-header">
        <div class="container">
            <div class="row">
                <!-- BEGIN TOP BAR LEFT PART -->
                <div class="col-md-6 col-sm-6 additional-shop-info">
                    <ul class="list-unstyled list-inline">
                        <li><i class="fa fa-phone"></i><span>+93 776 317 617</span></li>l
                        <!-- BEGIN CURRENCIES -->
                        <li class="shop-currencies">
                            <a href="javascript:void(0);" class="current">$</a>
                        </li>
                        <!-- END CURRENCIES -->
                        <!-- BEGIN LANGS -->
                        <li class="langs-block">
                            <a href="javascript:void(0);" class="current">English </a>
                        </li>
                        <li><a href="https://wa.link/x3i34n" class="fab fa-whatsapp"></a></li>
                        <li><a href="https://youtube.com/@gulnegarhandicrafts?si=ScPQCcSeElDCg751 " class="fab fa-youtube"></a></li>
                        <li><a href="https://www.facebook.com/profile.php?id=100063572185878" class=" fab fa-facebook"></a></li>
                        <li><a href="https://username.t.me/+93776317617" class="fab fa-telegram"></a></li>
                        <li><a href="https://www.instagram.com/p/Cw-P5cgonDs/?igshid=NTc4MTIwNjQ2YQ== " class=" fab fa-instagram"></a></li>
                        <li><a href="mailto:R.Ahmadi0434@gmail.com" class=" fab fa-google"></a></li>
                        <!-- END LANGS -->
                    </ul>
                </div>
                <!-- END TOP BAR LEFT PART -->
                <!-- BEGIN TOP BAR MENU -->
                <div class="col-md-6 col-sm-6 additional-nav">
                    <ul class="list-unstyled list-inline pull-right">
                      <li><router-link v-if="this.$store.state.isAuthenticated"  :to="{ name:'Logout' }">Logout</router-link></li>
                        <li><router-link v-if="!this.$store.state.isAuthenticated"  :to="{name:'login'}">Log In</router-link></li>
                        <li><router-link v-if="!this.$store.state.isAuthenticated"   :to="{name:'Orders'}"> Order</router-link></li>

                    </ul>
                </div>
                <!-- END TOP BAR MENU -->
            </div>
        </div>        
    </div>
    <!-- END TOP BAR -->

    <!-- BEGIN HEADER -->
    <div class="header">
      <div class="container">
        <span class="site-logo"><img src="Images/Logo/logo2.png" ></span>

        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

        <!-- BEGIN CART -->
        <div class="top-cart-block">
          <i class="fa fa-shopping-cart"></i>
         
        </div>
        <!--END CART -->

        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation">
          <ul>
            <li>
              <router-link v-if="!this.$store.state.isAuthenticated"  :to="{name: 'Home'}" class="dropdown-toggle" data-toggle="dropdown" data-target="#">
                Home </router-link>
            </li>
            <li><router-link v-if="!this.$store.state.isAuthenticated"  :to="{name: 'Gallary'}">Gallary</router-link></li>
            <li>
              <router-link v-if="!this.$store.state.isAuthenticated"  :to="{name: 'Products'}" >  Products </router-link>
            </li>




            <!-- admin Routes-->
            <li class="dropdown">
              <router-link v-if="this.$store.state.isAuthenticated" :to="{name: 'product_list'}"  class="dropdown-toggle" data-toggle="dropdown" data-target="#" >
                Products 
                
            </router-link>
              <!-- BEGIN DROPDOWN MENU -->
              <ul class="dropdown-menu">
                <li><router-link v-if="this.$store.state.isAuthenticated"  :to="{name: 'product_list'}">All Product </router-link></li>
                <li><router-link v-if="this.$store.state.isAuthenticated"  :to="{name: 'Pendding'}">Pandding </router-link></li>
                <li><router-link v-if="this.$store.state.isAuthenticated"  :to="{name: 'Approved'}">Aproved</router-link></li>

              </ul>
              <!-- END DROPDOWN MENU -->
            </li>
           <li> 
            <router-link  v-if="this.$store.state.isAuthenticated" :to="{name: 'order_list'}" > Orders  </router-link>
           </li>
           
           <li> 
            <router-link  v-if="this.$store.state.isAuthenticated" :to="{name: 'img_list'}" > Gallary  </router-link>
           </li>
           <li> 
            <router-link  v-if="this.$store.state.isAuthenticated" :to="{name: 'customers'}" > Customers  </router-link> 
          </li>
          <li> 
            <router-link  v-if="this.$store.state.isAuthenticated" :to="{name: 'delivery_list'}" > Deliveries  </router-link> 
          </li>
            <!-- End of Admin routes-->




            <li >
              <router-link v-if="!this.$store.state.isAuthenticated"  :to="{name: 'Orders'}" > Orders  </router-link>
            </li>
            <li> <router-link v-if="!this.$store.state.isAuthenticated"  :to="{name: 'Abouts'}">About Us</router-link> </li>
            <li >
              <router-link v-if="!this.$store.state.isAuthenticated"  :to="{name: 'Contact'}"> Contact Us  </router-link>
            </li>

            <!-- BEGIN TOP SEARCH -->
            <li class="menu-search">
              <span class="sep"></span>
              <i class="fa fa-search search-btn"></i>
              <div class="search-box">
                <form action="#">
                  <div class="input-group">
                    <input type="text" placeholder="Search" class="form-control">
                    <span class="input-group-btn">
                      <button class="btn btn-primary" type="submit">Search</button>
                    </span>
                  </div>
                </form>
              </div> 
            </li>
            <!-- END TOP SEARCH -->
          </ul>
        </div>
        <!-- END NAVIGATION -->
      </div>
    </div>
    <!-- Header END -->
    <!-- The Main Part of Page -->
      <router-view></router-view>
    <!-- End of Pages Details -->
        <!-- BEGIN PRE-FOOTER -->
        <div class="pre-footer">
          <div class="container">
            <div class="row">
              <!-- BEGIN BOTTOM ABOUT BLOCK -->
              <div class="col-md-3 col-sm-6 pre-footer-col text-justify">
                <h2>About us</h2>
                <p class="about-footer">Gulnegar Handicrafts published in 2019, in Kabul-Afghanistan.
                  All products are handmade and the most of its products are cloths for
                  women. The products are provided in Kabul, Herat, Ghazni and Bamyan
                  provinces. About 200-250 women work in this store, including: tailors, designers,
                  models and women that make handicrafts.</p>
              </div>
              <!-- END BOTTOM ABOUT BLOCK -->
              <!-- BEGIN BOTTOM INFO BLOCK -->
              <div class="col-md-3 col-sm-6 pre-footer-col">
                <h2>Information</h2>
                <ul class="list-unstyled">
                  <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Delivery Information</a></li>
                  <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Customer Service</a></li>
                  <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Order Tracking</a></li>
                  <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Shipping &amp; Returns</a></li>
                  <li><i class="fa fa-angle-right"></i> <a href="contacts.html">Contact Us</a></li>
                  <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Careers</a></li>
                  <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Payment Methods</a></li>
                </ul>
              </div>
              <!-- END INFO BLOCK -->
    
              <!-- BEGIN TWITTER BLOCK --> 
              <div class="col-md-3 col-sm-6 pre-footer-col">
                <h2 class="margin-bottom-4">New Models</h2>
                <ul class="list-unstyled">
                  <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Gul Atlas</a></li>
                  <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Gulnegar</a></li>
                  <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Gul Seb</a></li>
                  <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Graph</a></li>
                  <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Qalini</a></li>
                  <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Khamak</a></li>
                  <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Charmi</a></li>
                </ul>   </div>
              <!-- END TWITTER BLOCK -->
    
              <!-- BEGIN BOTTOM CONTACTS -->
              <div class="col-md-3 col-sm-6 pre-footer-col">
                <h2>Our Contacts</h2>
                <address class="margin-bottom-40">
                  Shop No: 1-2 and 3, 4th Floor, Barchi City Walk, Shahid Mazari Road, 13 District,
                    Kabul, Afghanistan.<br>
                  Phone: +93776317617<br>
                  Email: <a href="R.Ahmadi0434@gmail.com">Info@Gulnegar.com</a><br>
                  Whatsapp: <a href="https://wa.link/x3i34n">+93776317617</a>
                </address>
              </div>
              <!-- END BOTTOM CONTACTS -->
            </div>
            <hr>
          </div>
        </div>
        <!-- END PRE-FOOTER -->
    
        <!-- BEGIN FOOTER -->
        <div class="footer">
          <div class="container">
            <div class="row">
              <!-- BEGIN COPYRIGHT -->
              <div class="col-md-4 col-sm-4 padding-top-10">
                2022 © Gulnegar. ALL Rights Reserved. 
              </div>
              <!-- END COPYRIGHT -->
              <!-- BEGIN PAYMENTS -->
              <!-- END PAYMENTS -->
              <!-- BEGIN POWERED -->
              <div class="col-md-4 col-sm-4 text-right">
                <p class="powered">Powered by: <a href="http://www.Facebook.com/Liaqat Paindah">LP266</a></p>
              </div>
              <!-- END POWERED -->
            </div>
          </div>
        </div>
        <!-- END FOOTER -->
    
        <!-- BEGIN fast view of a product -->
        <div id="product-pop-up" style="display: none; width: 700px;">
                <div class="product-page product-pop-up">
                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-3">
                      <div class="product-main-image">
                        <img src="assets/pages/img/products/model7.jpg" alt="Cool green dress with red bell" class="img-responsive">
                      </div>
                      <div class="product-other-images">
                        <a href="javascript:;" class="active"><img alt="Berry Lace Dress" src="assets/pages/img/products/model3.jpg"></a>
                        <a href="javascript:;"><img alt="Berry Lace Dress" src="assets/pages/img/products/model4.jpg"></a>
                        <a href="javascript:;"><img alt="Berry Lace Dress" src="assets/pages/img/products/model5.jpg"></a>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-9">
                      <h2>Cool green dress with red bell</h2>
                      <div class="price-availability-block clearfix">
                        <div class="price">
                          <strong><span>$</span>47.00</strong>
                          <em>$<span>62.00</span></em>
                        </div>
                        <div class="availability">
                          Availability: <strong>In Stock</strong>
                        </div>
                      </div>
                      <div class="description">
                        <p>Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed nonumy nibh sed euismod laoreet dolore magna aliquarm erat volutpat Nostrud duis molestie at dolore.</p>
                      </div>
                      <div class="product-page-options">
                        <div class="pull-left">
                          <label class="control-label">Size:</label>
                          <select class="form-control input-sm">
                            <option>L</option>
                            <option>M</option>
                            <option>XL</option>
                          </select>
                        </div>
                        <div class="pull-left">
                          <label class="control-label">Color:</label>
                          <select class="form-control input-sm">
                            <option>Red</option>
                            <option>Blue</option>
                            <option>Black</option>
                          </select>
                        </div>
                      </div>
                      <div class="product-page-cart">
                        <div class="product-quantity">
                            <input id="product-quantity" type="text" value="1" readonly name="product-quantity" class="form-control input-sm">
                        </div>
                        <button class="btn btn-primary" type="submit">Add to cart</button>
                        <a href="shop-item.html" class="btn btn-default">More details</a>
                      </div>
                    </div>
    
                    <div class="sticker sticker-sale"></div>
                  </div>
                </div>
        </div>
        <!-- END fast view of a product -->
    
</template>
<script>
 export default {
    data() {
        return {
            title: 'Home Page'
        }
    }
 }
</script>
