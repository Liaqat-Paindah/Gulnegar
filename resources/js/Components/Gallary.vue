<template>
    <div class="container">
      <ul class="breadcrumb">
        <li><router-link :to="{name: 'Home'}">Home</router-link> </li>
        <li><router-link :to="{name: 'Products'}">Gallery</router-link> </li>
      </ul>
        <div class="row">

          <div class="content-search margin-bottom-20">
            <div class="row">
              <div class="col-md-6">
                <p>Search String to Find Product Images:</p>
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
            <div class="isloading" v-if="isLoading">
              <p>Loading....</p>
            </div>
                <a v-for="Image in Images.data" :href="Image.Image_Path" key="Image.id" class="fancybox-fast-view">
                <img style="float: left; margin-bottom:20px"  :src="Image.Image_Path"  class="col-sm-3 img-thumbnail" />
              </a>

        </div>
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <ul class="pagination pull-right">
              <Bootstrap4Pagination  :data="Images"  @pagination-change-page="FetchData" ></Bootstrap4Pagination> 
            </ul>
          </div>
        </div>
    </div>
</template>
    
<script>
import { Bootstrap4Pagination } from 'laravel-vue-pagination';
import axios from 'axios';
import "glightbox/dist/css/glightbox.css";
import "glightbox/dist/js/glightbox.js";
import GLightbox from 'glightbox';
export default {
  components:
  {
    Bootstrap4Pagination:Bootstrap4Pagination
  },
    data() {
        return {
            Images: {},
            isLoading:true
        }
    },
    mounted() {
        this.FetchData(),
            this.lightbox = GLightbox({
                selector: ".glightbox"
            });
    },
    methods:
    {
        FetchData(page=1) {
            axios.get('/api/Image?page='+page).then(res => {
                this.Images = res.data;
                this.isLoading=false
            }).catch(err => {
                console.log(err);
            });
        }
    }
}
</script>