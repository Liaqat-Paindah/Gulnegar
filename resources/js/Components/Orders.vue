
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
                    <div class="Loading" v-if="isLoading">
                        <p>Loading...</p>
                    </div>
                    <br><br> <br> <br>
                    <div class="product-page-content">
                        <ul id="myTab" class="nav nav-tabs">
                            <li class="active"><a href="#Reviews" data-toggle="tab" aria-expanded="true">Order Online</a>
                            </li>
                            <li class=""><a href="#Whatsapp" data-toggle="tab" aria-expanded="false">Order by WhatsApp</a>

                            </li>
                            <li class=""><a href="#Information" data-toggle="tab" aria-expanded="false">Order by Email</a>
                            </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade text-center" id="Whatsapp">
                                <a href="https://wa.link/x3i34n" class="order-link">Connect to WhatsApp</a>
                            </div>
                            <div class="tab-pane fade text-center" id="Information">
                                <a href="mailto:R.Ahmadi0434@gmail.com" class="order-link"><i class=" fab fa-google"></i>
                                    Click here to send Email</a>
                            </div>
                            <div class="tab-pane fade active in" id="Reviews">
                                <!--<p>There are no reviews for this product.</p>-->
                                <div class="review-item clearfix">

                                    <p>Dear Customer: Please fill the online form according to your orders.</p>
                                    <form   v-on:submit.prevent="submit" class="default-form" method="post" role="form">
                                        <div class="form-group">
                                            <label for="name">Name <span class="require">*</span></label>
                                            <input type="text"  v-model="Order.name" class="form-control" v-bind:class="{'invalid':nameError===true, 'valid':nameError===false}" id="name">
                                                <div class="text-danger" v-if="nameError">{{nameMessage}}</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email <span class="require">*</span></label>
                                            <input type="text" v-model="Order.email" class="form-control" v-bind:class="{'invalid':emailError===true, 'valid':emailError===false}" id="email">
                                                <div class="text-danger" v-if="emailError">{{emailMessage}}</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Whatsapp: <span class="require">*</span></label>
                                            <input type="text" v-model="Order.whatsapp" class="form-control" v-bind:class="{'invalid':whatsappError===true, 'valid':whatsappError===false}" id="email">
                                                <div class="text-danger" v-if="whatsappError">{{whatsappMessage}}</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="message">Orders <span class="require">*</span></label>
                                            <textarea class="form-control" v-bind:class="{'invalid':orderError===true, 'valid':orderError===false}" v-model="Order.order" rows="8" id="message"></textarea>
                                                <div class="text-danger" v-if="orderError">{{orderMessage}}</div>
                                        </div>
                                        <button class="btn btn-primary pull-right" type="submit" id="button-confirm">Confirm Order</button>
                                    </form>
                                </div>
                            </div>
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
        data() {
            return {
                message: 'Dear Customer Your Order Recieved',
                nameError:null,
                emailError:null,
                whatsappError:null,
                orderError:null,
                isLoading:false,
                Order: { 
                name: "", 
                email: "",
                whatsapp: "",
                order: "" 
                }
            }
        },

        methods:
        {
            submit() 
            {
    if(!this.name)
        {
            this.nameError=true;
            this.nameMessage="Name is required.";
        }
      else(this.name)
        {
            this.nameError=false;
            this.nameMessage="";
        }

        if(!this.email)
        {
            this.emailError=true;
            this.emailMessage="Email is required.";
        }
      else(this.email)
        {
            this.emailError=false;
            this.emailMessage="";
        }
        if(!this.whatsapp)
        {
            this.whatsappError=true;
            this.whatsappMessage="Whatsapp number is required.";
        }
      else(this.whatsapp)
        {
            this.whatsappError=false;
            this.whatsappMessage="";
        }

        if(!this.order)
        {
            this.orderError=true;
            this.orderMessage="Order is required.";
        }
      else(this.order)
        {
            this.orderError=false;
            this.orderMessage="";
        }
                const FileUpload = new FormData;
                FileUpload.append('name', this.Order.name);
                  FileUpload.append('email', this.Order.email);
                  FileUpload.append('whatsapp', this.Order.whatsapp);
                 FileUpload.append('order', this.Order.order);
                axios.post('/api/orders/', FileUpload).then((res) => {
                    this.$router.push({ name: "orders_recieve", params:{message: this.message}})
                    this.Order = res.data;
                }).catch((error)=>
                {
                    console.log(error);
                })
        }
        }
    }

</script>