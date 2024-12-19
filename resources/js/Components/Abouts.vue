<template>
    <div>
      <div class="main">
        <div class="container">
          <ul class="breadcrumb">
              <li><router-link :to="{name: 'Home'}">Home</router-link></li>
              <li class="active">About Us</li>
          </ul>
          <div class="row margin-bottom-40">
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
            </div>
            <div class="col-md-9 col-sm-9">
              <h1>About us</h1>
              <div class="content-page">
                <p><img src="Images/About/1.jpg" alt="About us" class="img-responsive"></p> 
                <p class="text-justify">
                  Kamila Kiarang, the owner and founder of Golnegar Handicrafts, has an educational background
                  in business and law. She got her Bachelor’s degree in Business Administration in 2018 from
                  Sultan Mahmood Ghaznavi University located in Ghazni Province, Afghanistan. She then went on
                  to graduate from law faculty in 2020 from Khatam Khatam Al Nabieen University in Kabul. In
                  addition to extensive educational background, she has a lot of work experience in teaching
                  and media. Currently, she is working at the Opinion Research Center of Afghanistan (ORCA) in
                  addition to managing her brand.

                  Kamila established Golnegar Handicrafts in 2019. In the true entrepreneurial spirit, she
                  manages operations related to Golnegar Handicrafts after her official work hours and on her
                  off days. She works with a partner who manages the shop while she is away. There is also a
                  full-time designer who designs all the clothing and other products. Of 70 employees, the
                  majority are women who perform embroidery works from their homes. This means all of the
                  products that the brand produces are completely handwoven and hand-embroidered by the
                  hard-working women who embody the brand.

                  Kamila was first motivated to start a handcrafted business through her knowledge of business
                  and law education. She wished to be financially independent, which owning her own business
                  would allow for. She appreciates handmade items but noticed that slowly fading away in
                  mainstream culture due to competition with cheaply made products. Yet, she also realized
                  there is still a large, global market and demand for handmade products, so she bravely began
                  filling the niche market.
                  Aseel proudly partners with Golnegar Handicrafts and supports the brand’s vision of reviving
                  the desire for handmade and handwoven products. The brand’s artisans produce stylish
                  clothing including Hazaragi clothes, ceremonial and party wear dresses, modern clothes, and
                  others. They also hand-sew products such as embroidered pillows and decorative items. Kamila
                  hopes that her endeavors inspire the new generation to appreciate handmade crafts and
                  products. By partnering with Aseel, Kamila believes her sales will increase and her products
                  will get showcased around the world to anyone who adores and appreciates handmade products.
                </p>
              </div>
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
    }
</script>