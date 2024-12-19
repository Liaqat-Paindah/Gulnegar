
<template>
    <div>
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li><router-link :to="{ name: 'Home' }">Home</router-link></li>
                <li><router-link :to="{ name: 'Orders' }">Orders</router-link></li>
            </ul>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="Loading" >
                        <div class="alert alert-success alert-dismissible">
                        {{this.$route.params.message}}
                        </div>
                        <router-link :to="{name: 'Orders'}">Return Back</router-link>
                        <br><br><br><br><br><br><br><br>

                    </div>
                    <div class="product-page-content">
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