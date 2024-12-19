<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-6">
                <div class="Product-delete">
                <p>Do you want Delete this Delivery {{this.$route.params.id}}?</p>
                <button type="submit" v-on:click="DeleteData" v-on:submit.prevent="DeleteProduct" class="btn btn-primary btn-sm">Yes</button> <i></i>
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
        }
    },
    methods:
    {
        DeleteData()
        {
            axios.delete('/api/deliveries/'+this.$route.params.id).then((res)=>{
                this.$router.push({name: 'delivery_list'})
            })
        },
        Cencel()
        {
            this.$router.push({name: 'delivery_list'});
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