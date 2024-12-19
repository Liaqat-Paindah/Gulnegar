<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="Product-delete">
                <p>Do you want approve this Product: {{this.$route.params.id}}?</p>
                <button type="submit" v-on:click="Confirm"  class="btn btn-primary btn-sm">Confirm</button> <i></i>
                 <button type="submit" v-on:submit.prevent="Cencel" v-on:click="Cencel" class="btn btn-primary btn-sm">  Cencel</button> 
               </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
  </template>
  <script>
  import axios from 'axios';
  export default {
    props:['id'],
    data()
    {
        return {
            Products: { Order_status: 'Approved'},
        }
    },
    methods:
    {
        Confirm()
         {
            axios.patch('/api/penddings/'+this.$route.params.id, this.Products).then((res)=>{ 
            this.$router.push({name: 'Pendding'});

            }); 
         },
        Cencel()
        {
            this.$router.push({name: 'Pendding'});
        }
    }
    
  }
  </script>
  <style scoped>
  .Product-delete
  {
    padding: 10px;
    margin: 20px;
    background: rgb(255, 255, 255);
    box-shadow: 0px 4px 20px 4px rgba(0, 0, 0, 0.08);
  }
  .Product-delete [type="submit"]
  {
    margin-left: 25%;
  }
  </style>