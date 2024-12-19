<template>
    <div>
        <div class="container">
            <ul class="breadcrumb">
                <li><router-link :to="{name: 'Home'}">Home</router-link></li>
                <li class="active">Register</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
    
              <!-- BEGIN CONTENT -->
              <div class="col-md-3"></div>
              <div class="col-md-6 col-sm-9">
                <div class="content-page">
                  <h2>Login in Your Account</h2>
                  <p></p>
                  <!-- BEGIN FORM-->
                  <form v-on:submit.prevent="HandleData"  enctype="multipart/form-data" class="default-form mb-4" role="form">
                    <div class="form-group">
                        <label for="email">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter the name" v-model="name" v-bind:class="{'invalid':NameError===true, 'valid':NameError===false}">
                        <div class="text-danger" v-if="NameError">{{NameMessage}}</div>
                      </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" class="form-control"  v-bind:class="{'invalid':EmailError===true, 'valid':EmailError===false}" v-model="Email" name="email" placeholder="Enter the email" id="email">
                      <div class="text-danger" v-if="EmailError">{{EmailMessage}}</div>
                    </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" v-model="Password" v-bind:class="{'invalid':PasswordError===true, 'valid':PasswordError===false}" class="form-control" placeholder="Enter the password" id="email">
                        <div class="text-danger" v-if="PasswordError">{{PasswordMessage}}</div>
                      </div> 
                      <div class="form-group">
                        <label for="password">Confirm-Password</label>
                        <input type="password" name="confirmpassword"  v-model="ConPassword" v-bind:class="{'invalid':ConPasswordError===true, 'valid':ConPasswordError===false}"  class="form-control" placeholder="Enter the password" id="email">
                        <div class="text-danger" v-if="ConPasswordError">{{ConPasswordMessage}}</div>
                      </div>               
                      <button type="submit" class="btn btn-primary btn-block">Register</button>
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
            name: '',
            Email : '',
            Password : '',
            ConPassword : '',
            Terms: false,
            NameError:null, LastError:null, PhoneError:null, EmailError:null, EducationError:null, DateError:null, GenderError:null, PasswordError:null, ConPasswordError:null, 
            NameMessage:null, LastMessage:null, PhoneMessage:null, EmailMessage:null, EducationMessage:null, DateMessage:null, GenderMessage:null, PasswordMessage:null, ConPasswordMessage:null,
        }
    },
    methods:
{
    HandleData() {  
         if(!this.name)
        {
            this.NameError=true;
            this.NameMessage="name is required.";
        }
      else if(this.name)
        {
            this.NameError=false;
            this.NameMessage="";
        }


        if(!this.Email)
        {
            this.EmailError=true;
            this.EmailMessage="Email address is required.";
        }
      else if(this.Email)
        {
            this.EmailError=false;
            this.EmailMessage="";
        }
        if(!this.Password)
        {
            this.PasswordError=true;
            this.PasswordMessage="Password is required.";
        }
      else if(this.Password.length<6)
        {
            this.PasswordError=true;
            this.PasswordMessage="Your Password should be more than 6 characters";
        }
        else
        {
            this.PasswordError=false;
            this.PasswordMessage="";
        }
        if(!this.ConPassword)
        {
            this.ConPasswordError=true;
            this.ConPasswordMessage="Password_Confirmation is required.";
        }
      else if(this.ConPassword)
        {
            this.ConPasswordError=false;
            this.ConPasswordMessage="";
        }
        if(this.Password!==this.ConPassword)
        {
            this.PasswordError=true;
            this.ConPasswordError=true;
            this.PasswordMessage="Your Password doesn't mutch."
        }
        const FileImages=new FormData;
         FileImages.append('name', this.name);
         FileImages.append('Email', this.Email);
         FileImages.append('Password', this.Password);
         FileImages.append('ConPassword', this.ConPassword);
         axios.post("/api/users", FileImages).then((res) => {
        this.$router.push({ name: "login" }).catch((error) => {
          console.log(error);
          });
        });
    },
  },
};
</script>