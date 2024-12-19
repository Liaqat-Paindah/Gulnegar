<template>
    <div class="main">
        <div class="main">
            <div class="container">
                <ul class="breadcrumb">
                    <li><router-link :to="{ name: 'Home' }">Home</router-link></li>
                    <li><router-link :to="{ name: 'Products' }">Shopping</router-link></li>
                    <li class="active">Shopping Cart</li>
                </ul>
                <!-- BEGIN SIDEBAR & CONTENT -->
                <div class="row margin-bottom-40">
                    <!-- BEGIN CONTENT -->
                    <div class="col-md-12 col-sm-12">
                        <h1>Checkout</h1>
                        <!-- BEGIN CHECKOUT PAGE -->
                        <div class="panel-group checkout-page accordion scrollable" id="checkout-page">

                            <!-- BEGIN CHECKOUT -->
                            <div id="checkout" class="panel panel-default">
                                <div class="panel-heading">
                                    <h2 class="panel-title">
                                        <a   data-toggle="collapse" data-parent="#checkout-page" 
                                            class="accordion-toggle">
                                            Step 1: Checkout Options
                                        </a>
                                    </h2>
                                </div>
                                <div id="checkout-content" class="panel-collapse collapse in">
                                    <div class="panel-body row">
                                        <div class="col-md-6 col-sm-6">
                                            <h3>New Customer</h3>
                                            <p>Checkout Options:</p>
                                            <div class="radio-list">
                                                <label>
                                                    <input type="checkbox" name="account" v-model="Register"  value=""> Register Account
                                                </label>
                                            </div>
                                            <p>By creating an account you will be able to shop faster, be up to date on an
                                                order's status, and keep track of the orders you have previously made.</p>
                                            <button class="btn btn-primary" type="submit" data-toggle="collapse"
                                                data-parent="#checkout-page"
                                                data-target="#payment-address-content" v-bind:disabled="!Register">Continue</button>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <h3>Returning Customer</h3>
                                            <p>I am a returning customer.</p>
                                           <p class="text-danger" v-text="errors.email"></p>
                                            <form role="form" v-on:submit.prevent="LoginUser">
                                                <div class="form-group">
                                                    <label for="email-login">E-Mail</label>
                                                    <input type="text" v-model="Email" v-bind:class="{'invalid':EmailError===true, 'valid':EmailError===false}" id="email-login" class="form-control">
                                                    <div class="invalid-feedback" v-if="EmailError">{{EmailMessage}}</div>       
                                                </div>
                                                <div class="form-group">
                                                    <label for="password-login">Password</label>
                                                    <input type="password" v-model="Password"  v-bind:class="{'invalid':PasswordError===true, 'valid':PasswordError===false}" id="password-login" class="form-control">
                                                     <div class="invalid-feedback" v-if="PasswordError">{{PasswordMessage}}</div>                                
                                                </div>
                                                <a href="javascript:;">Forgotten Password?</a>
                                                <div class="padding-top-20">
                                                    <button class="btn btn-primary" v-bind:disabled="Password.length<5" type="submit">Login</button>
                                                </div>
                                                <hr>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END CHECKOUT -->

                            <!-- BEGIN PAYMENT ADDRESS -->
                            <div id="payment-address" class="panel panel-default">
                                <div class="panel-heading">
                                    <h2 class="panel-title">
                                        <a v-bind:disabled="!Register" data-toggle="collapse" data-parent="#checkout-page"
                                            class="accordion-toggle">
                                            Step 2: Account &amp; Shoping with Delivery
                                        </a>
                                    </h2>
                                </div>
                                <form v-on:submit.prevent="submit" method="post">
                                <div id="payment-address-content" class="panel-collapse collapse">
                                    <div class="panel-body row">
                                        <div class="col-md-6 col-sm-6">
                                            <h3>Your Personal Details</h3>
                                            <p class="text-danger">{{PassError}}</p>
                                            <div class="form-group" >
                                                <label for="firstname">First Name <span class="require">*</span></label>
                                                <input type="text" id="Name" v-model="Customer.Name" v-bind:class="{'invalid':NameError===true, 'valid':NameError===false}" class="form-control">
                                                <div class="text-danger" v-if="NameError">{{NameMessage}}</div>
                                            </div>
                                            <div class="form-group">
                                                <label for="lastname">Last Name <span class="require">*</span></label>
                                                <input type="text" id="LastName" v-model="Customer.LastName" v-bind:class="{'invalid':LastNameError===true, 'valid':LastNameError===false}"  class="form-control">
                                                <div class="text-danger" v-if="LastNameError">{{LastNameMessage}}</div>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">E-Mail <span class="require">*</span></label>
                                                <input type="text" id="Email" v-model="Customer.Email" v-bind:class="{'invalid':EmailError===true, 'valid':EmailError===false}"  class="form-control">
                                                <div class="text-danger" v-if="EmailError">{{EmailMessage}}</div>
                                            </div>
                                            <div class="form-group">
                                                <label for="telephone">Telephone <span class="require">*</span></label>
                                                <input type="text" id="Phone"  v-model="Customer.Phone" v-bind:class="{'invalid':PhoneError===true, 'valid':PhoneError===false}"  class="form-control">
                                                <div class="text-danger" v-if="PhoneError">{{PhoneMessage}}</div>
                                            </div>

                                            <h3>Your Password</h3>
                                            <br>
                                            <div class="form-group">
                                                <label for="password">Password <span class="require">*</span></label>
                                                <input type="password" id="password" v-model="Customer.Password" v-bind:class="{'invalid':PasswordError===true, 'valid':PasswordError===false}"  class="form-control">
                                                <div class="text-danger" v-if="PasswordError">{{PasswordMessage}}</div>
                                            </div>
                                            <div class="form-group">
                                                <label for="password-confirm">Password Confirm <span
                                                        class="require">*</span></label>
                                                <input type="password" v-model="Customer.ConPassword" id="password-confirm" v-bind:class="{'invalid':ConPasswordError===true, 'valid':ConPasswordError===false}"  class="form-control">
                                                <div class="text-danger" v-if="ConPasswordError">{{ConPasswordMessage}}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <h3>Your Address</h3>
                                            <div class="form-group">
                                                <label for="address1">Address 1</label>
                                                <input type="text" v-model="Delivery.Address" id="address1" v-bind:class="{'invalid':AddressError===true, 'valid':AddressError===false}"  class="form-control">
                                                <div class="text-danger" v-if="AddressError">{{AddressMessage}}</div>
                                            </div>
                                            <div class="form-group">
                                                <label for="address2">Home</label>
                                                <input type="text" id="address2" v-model="Delivery.Home" v-bind:class="{'invalid':HomeError===true, 'valid':HomeError===false}"  class="form-control">
                                                <div class="text-danger" v-if="HomeError">{{HomeMessage}}</div>
                                            </div>
                                            <div class="form-group">
                                                <label for="city">City <span class="require">*</span></label>
                                                <input type="text" id="city" v-model="Delivery.City" v-bind:class="{'invalid':CityError===true, 'valid':CityError===false}"  class="form-control">
                                                <div class="text-danger" v-if="CityError">{{CityMessage}}</div>
                                            </div>
                                            <div class="form-group">
                                                <label for="post-code">Post Code <span class="require">*</span></label>
                                                <input type="text" v-model="Delivery.Code" id="post-code" v-bind:class="{'invalid':CodeError===true, 'valid':CodeError===false}"  class="form-control">
                                                <div class="text-danger" v-if="CodeError">{{CodeMessage}}</div>
                                            </div>
                                            <div class="form-group">
                                                <label for="country">Country <span class="require">*</span></label>
                                                <select class="form-control input-sm" v-model="Delivery.Country" v-bind:class="{'invalid':CountryError===true, 'valid':CountryError===false}"  id="country">
                                                    <option value=""> --- Please Select --- </option>
                                                    <option value="United State">United State </option>
                                                    <option value="Australia">Australia</option>
                                                    <option value="Europe">Europe</option>
                                                    <option value="Iran">Iran</option>
                                                    <option value="Pakistan">Pakistan</option>
                                                    <option value="Afghanistan">Afghanistan</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                                <div class="text-danger" v-if="CountryError">{{CountryMessage}}</div>
                                            </div>
                                            <div class="form-group">
                                                <label for="region-state">Region/State <span
                                                        class="require">*</span></label>
                                                        <input type="text"  v-model="Delivery.Region" id="region" v-bind:class="{'invalid':RegionError===true, 'valid':RegionError===false}"  class="form-control">
                                                <div class="text-danger" v-if="RegionError">{{RegionMessage}}</div>
                                            </div>
                                            <div class="form-group">
                                                    <label for="">Delivery Status:</label>
                                                    <select v-model="Delivery.Send" class="form-control input-sm">
                                                        <option value="Yes">With Delivery</option>
                                                        <option value=""> No Delivery</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="com-md-12">
                                            <label>
                                                <input type="checkbox"   > I have read and agree to the <a
                                                    title="Privacy Policy" href="javascript:;">Privacy Policy</a>
                                                &nbsp;&nbsp;&nbsp;

                                            </label>
                                            <button class="btn btn-primary "  type="submit" data-toggle="collapse"
                                                data-parent="#checkout-page" data-target="#shipping-address-content"
                                                id="button-payment-address" v-bind:disabled="!(Customer.ConPassword && Customer.LastName && Customer.Name && Customer.Email && Customer.Phone && Customer.Password && Delivery.Address  && Delivery.Home && Delivery.Region && Delivery.Country && Delivery.City && Delivery.Code  )">Continue</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            </div>
                            <!-- END PAYMENT ADDRESS -->

                            <!-- BEGIN PAYMENT METHOD -->
                            <div id="shipping-address" class="panel panel-default">
                                <div class="panel-heading">
                                    <h2 class="panel-title">
                                        <a  data-toggle="collapse" data-parent="#checkout-page"
                                            class="accordion-toggle">
                                            Step 3: Payment Methods
                                        </a>
                                    </h2>
                                </div>
                                <div id="shipping-address-content" class="panel-collapse collapse">
                                    <div class="panel-body row">
                                        <div class="col-md-12">
                                            <ul>
                                                <li><strong>By WhatsApp:</strong>
                                                    <div>
                                                        <p> Dear Customer please click to link to communicate with admin.<a
                                                                href="https://wa.link/x3i34n">Click Here</a> </p>
                                                    </div>
                                                </li>
                                                <li><strong>By Mail:</strong>
                                                    <div>
                                                        <p> Dear Customer please click to link to communicate with admin.<a
                                                                href="mailto:R.Ahmadi0434@gmail.com">Send Mail</a> </p>
                                                    </div>
                                                </li>
                                                <li><strong>By Phone:</strong>
                                                    <div>
                                                        <p>+93(0) 776-317-617</p>
                                                    </div>
                                                </li>
                                                <li> <strong>Direct Giving:</strong>
                                                    <div>
                                                        <p>Shop No: 1-2 and 3, 4th Floor, Barchi City Walk, Shahid Mazari
                                                            Road, 13 District, Kabul, Afghanistan.</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="com-md-12">
                                            <button class="btn btn-primary pull-right" type="submit" data-toggle="collapse"
                                                data-parent="#checkout-page" data-target="#confirm-content"
                                                id="button-payment-address">Continue & Shop by WhatsApp</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PAYMENT METHOD -->

                            <!-- BEGIN CONFIRM -->
                            <div id="confirm" class="panel panel-default">
                                <div class="panel-heading">
                                    <h2 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#checkout-page" 
                                            class="accordion-toggle">
                                            Step 4: Confirm Order
                                        </a>
                                    </h2>
                                </div>
                                <div id="confirm-content" class="panel-collapse collapse">
                                    <div class="send" v-if="Delivery.Send">

                                    <div class="panel-body row">
                                        <div class="col-md-12 clearfix">
                                            <div class="goods-data clearfix">
                                                <div class="table-wrapper-responsive">
                                                    <table summary="Shopping cart">
                                                        <tbody>
                                                            <tr>
                                                                <th class="goods-page-image">Image</th>
                                                                <th class="goods-page-total">Total</th>
                                                                <th></th>
                                                            </tr>
                                                            <tr>
                                                                <td class="goods-page-image">
                                                                    <img :src="Product.Images">
                                                                </td>
                                                                <td class="goods-page-total">
                                                                    <p>{{ Product.Price }} AF </p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                                <div class="col-md-12">
                                                    <div class="goods-data clearfix">
                                                        <div class="table-wrapper-responsive">
                                                            <div class="checkout-total-block">
                                                                <ul>
                                                                  <li>
                                                                    <span>Country delivery:</span>
                                                                    <select name="" class="form-control delivery">
                                                                        <option disabled>Select delivery country
                                                                        </option>
                                                                        <option value="USA">U.S.A</option>
                                                                        <option value="Europe">Europe</option>
                                                                        <option value="Australia">Australia</option>
                                                                        <option value="Iran">Iran</option>
                                                                        <option value="Pakistan">Pakistan</option>
                                                                        <option value="Other">Other</option>
                                                                    </select>
                                                                  </li>
                                                                  <li>
                                                                    <span>Wieght: </span>
                                                                    <span class="wieght">{{ Product.Weight }}</span>
                                                                    <span> Kilogram</span>
                                                                  </li>
                                                                  <li>
                                                                    <span> Product Price: </span>
                                                                    <span class="price">{{ Product.Price }}</span><span> AF</span>
                                                                  </li>
                                                                  <li>
                                                                    <span>Delivery Cost: </span>
                                                                    <span class="delivery-price"></span>
                                                                  </li>
                                                                  <li class="checkout-total-price">
                                                                    <span>Total:  </span>
                                                                    <span class="total_price"></span>
                                                                  </li>
                                                                  <li>
                                                                    <button class="btn btn-primary calculate " v-on:click="calculate()"> Total Amount with Delivery</button>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            </div>

                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <br> <br>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <a v-on:click="SendData()" href="https://wa.link/x3i34n" class="btn btn-primary confirm pull-right"
                                            type="submit" id="button-confirm">Confirm Order by WhatsApp</a>
                                        <router-link :to="{ name: 'Home' }"
                                            class="btn btn-info confirm pull-right ">Cancel</router-link>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END CONFIRM -->
                        </div>
                        <!-- END CHECKOUT PAGE -->
                    </div>
                    <!-- END CONTENT -->
                </div>
                <!-- END SIDEBAR & CONTENT -->
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
                Email: '',
                Password: '',
                Remember : false,
                EmailError: null,
                EmailMessage: null,
                PasswordError: null,
                PasswordMessage: null,
                users: '',
                device_name: 'browser',
                errors: [],
                Register:null,
                Step:null,
                Customer: {Name: '', LastName: '', Phone: '', Email: '', Password: '', ConPassword: ''},
                Delivery: {Country: '', City: '', Code: '', Region: '', Address: '', Home: '', Send:''},
                Product: { Name: '', Color: '', Size: '', Weight: '', desc: '', Images: '', Price: ''  },
                Product_Pendding: { Order_status: 'Pendding'},
                id: this.$route.params.id,
                Product_ID: this.$route.params.id,
                Catagories: [],
                Images: [],
                PassError: null,
                NameError:null, LastNameError:null, PhoneError:null, EmailError:null, EmailError:null, PasswordError:null, ConPasswordError:null, CountryError:null, 
                CityError:null, CodeError:null, RegionError:null, AddressError:null, AddressError:null, HomeError:null,
            }
        },
        mounted() {
            this.getData();
            this.SendData();
        },
        methods:
        {
        LoginUser()

        {
        if(this.Email.length<5)
        {
            this.EmailError=true;
            if(this.Email.length===0)
            {
            this.EmailMessaage='Email is required.';
            }
            else
            {
            this.EmailMessaage='Your Email address should be more than 5 characters.';
            }
        }
        else
        {
            this.EmailError=false;
            this.EmailMessaage='';
        }

            if(this.Password.length<5)
        {
            this.PasswordError=true;
            if(this.Password.length===0)
            {
            this.PasswordMessaage='Password is required.'; 
            }
            else
            {
            this.PasswordMessaage='Your Password should be more than 5 characters.';   
            }
        }
        else
        {
            this.PasswordError=false; 
            this.PasswordMessaage=''; 
        }
        const data= new FormData();
        data.append('device_name', this.device_name);
        data.append('email', this.Email);
        data.append('password', this.Password);
        axios.post('/api/customers', data).then((res)=>
        {
        localStorage.setItem('token', res.data);
        this.$store.commit("login", res.data);
        this.$router.push({name: 'Products'});
        }).catch(error=>
        {
            this.errors=error.response.data.errors;
        })
        },
        submit() {
        if(!this.Customer.Name)
        {
            this.NameError=true;
            this.NameMessage="Name is required.";
        }
      else if(this.Customer.Name)
        {
            this.NameError=false;
            this.NameMessage="";
        }
        if(!this.Customer.LastName)
        {
            this.LastNameError=true;
            this.LastNameMessage="LastName is required.";
        }
      else if(this.Customer.LastName)
        {
            this.LastNameError=false;
            this.LastNameMessage="";
        }

        if(!this.Customer.Email)
        {
            this.EmailError=true;
            this.EmailMessage="Email is required.";
        }
      else if(this.Customer.Email)
        {
            this.EmailError=false;
            this.EmailMessage="";
        }
        if(!this.Customer.Phone)
        {
            this.PhoneError=true;
            this.PhoneMessage="Phone Number is required.";
        }
      else if(this.Customer.Phone)
        {
            this.PhoneError=false;
            this.PhoneMessage="";
        }
        
        if(!this.Customer.Password)
        {
            this.PasswordError=true;
            this.PasswordMessage="Password is required.";
        }
      else if(this.Customer.Password)
        {
            this.PasswordError=false;
            this.PasswordMessage="";
        }
        if(!this.Customer.ConPassword)
        {
            this.ConPasswordError=true;
            this.ConPasswordMessage="ConPassword is required.";
        }
      else if(this.Customer.ConPassword)
        {
            this.ConPasswordError=false;
            this.ConPasswordMessage="";
        }
        if(!this.Delivery.Country)
        {
            this.CountryError=true;
            this.CountryMessage="Country is required.";
        }
      else if(this.Delivery.Country)
        {
            this.CountryError=false;
            this.CountryMessage="";
        }
        if(!this.Delivery.Region)
        {
            this.RegionError=true;
            this.RegionMessage="Region is required.";
        }
      else if(this.Delivery.Region)
        {
            this.RegionError=false;
            this.RegionMessage="";
        }
        if(!this.Delivery.Code)
        {
            this.CodeError=true;
            this.CodeMessage="Zip Code is required.";
        }
      else if(this.Delivery.Code)
        {
            this.CodeError=false;
            this.CodeMessage="";
        }
        if(!this.Delivery.City)
        {
            this.CityError=true;
            this.CityMessage="City is required.";
        }
      else if(this.Delivery.City)
        {
            this.CityError=false;
            this.CityMessage="";
        }
        if(!this.Delivery.Address)
        {
            this.AddressError=true;
            this.AddressMessage="Address is required.";
        }
      else if(this.Delivery.Address)
        {
            this.AddressError=false;
            this.AddressMessage="";
        }
        if(!this.Delivery.Home)
        {
            this.HomeError=true;
            this.HomeMessage="Home Number is required.";
        }
      else if(this.Delivery.Home)
        {
            this.HomeError=false;
            this.HomeMessage="";
        }

            if(this.Customer.Password===this.Customer.ConPassword){
                const CustomerUpload = new FormData;
                CustomerUpload.append('Name', this.Customer.Name);
                CustomerUpload.append('Product_ID', this.Product_ID);
                CustomerUpload.append('LastName', this.Customer.LastName);
                CustomerUpload.append('Phone', this.Customer.Phone);
                CustomerUpload.append('Email', this.Customer.Email);
                CustomerUpload.append('Password', this.Customer.Password);
                CustomerUpload.append('ConPassword', this.Customer.ConPassword);
                CustomerUpload.append('Country', this.Delivery.Country);
                CustomerUpload.append('City', this.Delivery.City);
                CustomerUpload.append('Region', this.Delivery.Region);
                CustomerUpload.append('Home', this.Delivery.Home);
                CustomerUpload.append('Address', this.Delivery.Address);
                CustomerUpload.append('Code', this.Delivery.Code);
                CustomerUpload.append('Send', this.Delivery.Send);
                 axios.post("/api/customers", CustomerUpload).catch((error) => {
                    console.log(error);
                    });
                   }
                   else
                   {
                    this.PassError='Password and Confirm Password not match.';
                   }
                },

            SendData()
               {
                axios.patch('/api/products/'+this.$route.params.id, this.Product_Pendding).then((res)=>{ }); 
               },
            calculate() {
                const delivery = document.querySelector('.delivery');
                if (delivery.value == 'USA' || delivery.value == 'Europe' || delivery.value == 'Australia') {
                    const price = document.querySelector('.price');
                    const wieght = document.querySelector('.wieght');
                    const total_price = document.querySelector('.total_price');
                    const deliveryprice = document.querySelector('.delivery-price');
                    const total_delivery = parseInt(wieght.textContent) * 40;
                    const value = parseInt(price.textContent) + total_delivery;
                    deliveryprice.textContent = total_delivery + ' AF';
                    total_price.textContent = value + ' AF';
                }
                else if (delivery.value == 'Iran' || delivery.value == 'Pakistan') {
                    const price = document.querySelector('.price');
                    const wieght = document.querySelector('.wieght');
                    const total_price = document.querySelector('.total_price');
                    const deliveryprice = document.querySelector('.delivery-price');
                    const total_delivery = parseInt(wieght.textContent) * 20;
                    const value = parseInt(price.textContent) + total_delivery;
                    deliveryprice.textContent = total_delivery + ' AF';
                    total_price.textContent = value + ' AF';
                }
                else {
                    const price = document.querySelector('.price');
                    const wieght = document.querySelector('.wieght');
                    const total_price = document.querySelector('.total_price');
                    const deliveryprice = document.querySelector('.delivery-price');
                    const total_delivery = parseInt(wieght.textContent) * 45;
                    const value = parseInt(price.textContent) + total_delivery;
                    deliveryprice.textContent = total_delivery + ' AF';
                    total_price.textContent = value + ' AF';
                }
            },
            getData() {
                axios.get('/api/product/' + this.$route.params.id).then((res) => {
                    this.Product = res.data;
                })
                axios.get('/api/catagories/').then((res) => {
                    this.Catagories = res.data;
                })
                axios.get('/api/Image/' + this.Product_ID).then((res) => {
                    this.Images = res.data;
                })
                axios.get('/api/product').then(res => {
                    this.Products = res.data;
                }).catch(err => {
                    console.log(err);
                });
            }
        }
    }
</script>
<style scoped>
.table
{
    text-align: center;
}
</style>