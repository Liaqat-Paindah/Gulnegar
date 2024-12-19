<template>
    <div>
        <div class="container">
            <ul class="breadcrumb">
                <li><router-link :to="{name: 'Home'}">Home</router-link></li>
                <li class="active">login</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
    
              <!-- BEGIN CONTENT -->
              <div class="col-md-3"></div>
              <div class="col-md-6 col-sm-9">
                <div class="content-page">
                  <h2>Login in Your Account</h2>
                  <p class="text-danger" v-text="errors.email"></p>
                  <p>Don't have an account? Create your account. It's take less then a minutes</p>
                  <!-- BEGIN FORM-->
                  <form v-on:submit.prevent="Submit" class="default-form mb-4" role="form">
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" class="form-control valite" v-model="Email" v-bind:class="{'invalid':EmailError===true, 'valid':EmailError===false}"  name="email" placeholder="Enter the email" id="email">
                      <div class="invalid-feedback" v-if="EmailError">{{EmailMessage}}</div>
                  
                    </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" v-model="Password"  v-bind:class="{'invalid':PasswordError===true, 'valid':PasswordError===false}" class="form-control valite" placeholder="Enter the Password" id="email">
                        <div class="invalid-feedback" v-if="PasswordError">{{PasswordMessage}}</div>
                    
                      </div>               
                      <button type="submit" v-bind:disabled="Password.length<6" class="btn btn-primary btn-block">Login</button>
                  </form>
                
                  <!-- END FORM-->          
                </div>
              </div>
              <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->
          </div>
    </div>
</template>
<script>
import axios from 'axios';
export default 
{
 data ()
 {
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
         errors: []
     }
 },
 methods:
 {
     Submit()

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
   axios.post('/api/login', data).then((res)=>
   {
   localStorage.setItem('token', res.data);
   this.$store.commit("login", res.data);
   this.$router.push({name: 'product_list'});
   }).catch(error=>
   {
      console.log(error.response.data.errors);
   })
 }
 }
    }
</script>