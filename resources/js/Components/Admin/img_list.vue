<template>
    <div class="container">
      <ul class="breadcrumb">
        <li><router-link :to="{name: 'Home'}">Home</router-link> </li>
        <li><router-link :to="{name: 'img_list'}">Img List</router-link> </li>
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
                <div class="col-md-12 table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th colspan="2">Action</th>
                                <th>Images</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="Image in Images.data" key="Image.id">
                                <th>{{Image.id}}</th>
                                <th>{{Image.Product_Name}}</th>
                                <th> <router-link :to="{name: 'img_remove', params: {id:Image.id} }"><i class="fa fa-edit fa-sm"></i> </router-link>  </th>
                                <th> <router-link :to="{name: 'img_remove',params: {id:Image.id} }"><i class="fa fa-trash fa-sm"></i> </router-link>  </th>
                                <th class="img-new"> <img :src="Image.Image_Path" class="img-list col-md-2"> </th>
                              </tr>
                        </tbody>
                    </table>
                    <router-link class="btn btn-primary btn-sm" :to="{name: 'add_image'}"> New Image </router-link>
                  </div>
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
<style scoped>
.img-new
{
    width: 60%;
}
.img-list
{
  margin-left: 40%;

}
</style>