<template>
    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><router-link :to="{name: 'Home'}">Home</router-link> </li>
            <li><router-link :to="{name: 'product_edit'}">Edit Product </router-link> </li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="isloading" v-if="isLoading">
          <p>Loading....</p>
        </div>
        <div class="Notloading" v-if="NotLoading">
        <div class="row margin-bottom-40">
  
          <!-- BEGIN SIDEBAR -->
          <!-- END SIDEBAR -->
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-7">

            <!-- BEGIN PRODUCT LIST -->
            <div class="row product-list">
              <!-- PRODUCT ITEM START -->
              <div class="col-md-12 table-responsive">
                <div class="row">
                  <h2>New Product</h2>

                    <form   v-on:submit.prevent="UpdateData" class="default-form" role="form" enctype="multipart/form-data">
                     
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">ID-Number <span class="require">*</span></label>
                                    <input type="text"  v-model="Product.id" class="form-control" required  id="id">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name <span class="require">*</span></label>
                                    <input type="text"  v-model="Product.Name" class="form-control" required >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Color <span class="require">*</span></label>
                                    <input type="text"  v-model="Product.Color" class="form-control" required id="Color">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Size <span class="require">*</span></label>
                                    <input type="text"  v-model="Product.Size" class="form-control" required  id="Size">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Price <span class="require">*</span></label>
                                    <input type="text"  v-model="Product.Price" class="form-control" required id="Price">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Date <span class="require">*</span></label>
                                    <input type="date"  v-model="Product.Date" class="form-control" required  id="Date">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Gender: <span class="require">*</span></label>
                                        <select v-model="Product.Gender" class="form-control" required >
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Weight <span class="require">*</span></label>
                                    <input type="text"  v-model="Product.Weight" class="form-control" required  id="Weight">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Status: <span class="require">*</span></label>
                                        <select v-model="Product.Status" class="form-control" required >
                                            <option value="In-Stock">In-Stock</option>
                                            <option value="None">None</option>
                                        </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Photo: <span class="require">*</span></label>
                                    <input type="file"  v-on:change="Changes"  class="form-control" required  id="Photo">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Catagory: <span class="require">*</span></label>
                                        <select  class="form-control" v-model="Product.Catagory"  >   
                                            <option v-for="Catagory in Catagories" :key="Catagory.id" :value="Catagory.id" >  {{ Catagory.name }} </option>
                                        </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Model: <span class="require">*</span></label>
                                        <select  class="form-control" v-model="Product.Model"  >   
                                            <option v-for="Model in Models" :key="Model.id" :value="Model.id" >  {{ Model.Model_Name }}</option>
                                        </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Fabric: <span class="require">*</span></label>
                                        <select  class="form-control" v-model="Product.Fabric"  >   
                                            <option v-for="Fabric in Fabrics" :key="Fabric.id" :value="Fabric.id" >  {{ Fabric.fabric_Name }} </option>
                                        </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Sewing: <span class="require">*</span></label>
                                        <select  class="form-control" v-model="Product.Sewing"  >   
                                            <option v-for="Sewing in Sewings" :key="Sewing.id" :value="Sewing.id" >  {{ Sewing.Sewing_Name }}</option>
                                        </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Description: <span class="require">*</span></label>
                                    <textarea v-model="Product.Desc" class="form-control" required></textarea>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-sm" v-on:click.prevent="UpdateData" type="submit" id="button-confirm"> <i class="fa fa-save"></i> Save</button>
                        <router-link class="btn btn-danger btn-sm" :to="{name: 'product_list'}">Return Back</router-link>
                    </form>
                 <br> <br>
                </div>
              </div>
              <!-- PRODUCT ITEM END -->
            </div>
  
            <!-- END PRODUCT LIST -->
            <!-- BEGIN PAGINATOR -->

            <!-- END PAGINATOR -->
          </div>
          <!-- END CONTENT -->
        </div>
      </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>
  </template>
  <script>
  import axios from "axios";
export default {
  data() {
    return {
    Catagories: [],
    Models: [],
    Sewings: [],
    Fabrics: [],
    NotLoading: true,
    isLoading: false,
      Product: {
        id: "",
        Name: "",
        Color: "",
        Size: "",
        Price: "",
        Gender: "",
        Date: "",
        Weight: "",
        Status: "",
        Model: "",
        Catagory: "",
        Fabric: "",
        Sewing: "",
        Desc: "",
        Images: ""
      },
    };
  },
  created() {
    this.UpdateData2();
  },
  mounted()
  {
  this.UpdateData();
  },
  methods: {
    GoBackward()
    {
      this.$router.push({name: 'product_list'});
    },
    Changes(e)
    {
      this.Product.Images=e.target.files[0];
    },
    UpdateData2()
    {
     axios.get('/api/products/'+this.$route.params.id).then((res)=>{
       this.Product=res.data; 
       });
       axios.get('/api/fabricshow').then(res => {
        this.Fabrics = res.data;
      }).catch(err => {
        console.log(err);
      });
      axios.get('/api/sewings').then(res => {
        this.Sewings = res.data;
      }).catch(err => {
        console.log(err);
      });
      axios.get('/api/catagories/').then(res => {
        this.Catagories = res.data;
      }).catch(err => {
        console.log(err);
      });
      axios.get('/api/newmodels/').then(res => {
        this.Models = res.data;
      }).catch(err => {
        console.log(err);
      });
    },
    UpdateData()
    {
     axios.patch('/api/products/'+this.$route.params.id, this.Product).then((res)=>{this.$router.push({name: 'product_list'});
     }); 
    }
    
  },
};
</script>