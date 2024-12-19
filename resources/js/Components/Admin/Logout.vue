<template>
    <div class="container">
    <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6 shadow bodered mt-4 pt-4 bg-white">
    <div class="sign-out">
    <h6>Dear Admin! Do you want to Sign-out?</h6>
    <div class="sign-out-item">
        <button class="btn btn-primary btn-sm" v-on:click="Logout">Sign-out</button>
    </div>
    <div class="sign-out-item">
    <router-link :to="{name: 'login'}" class="btn btn-primary btn-sm">Back</router-link>
    </div>
    </div>
    </div>
    </div>
    </div>
</template>
<script>
export default {
methods:
{
    Logout()
    {
        this.$store.commit("Logout");
        this.$router.push({name: 'login'});
    }
}
}
</script>
<style>
.sign-out
{
    background-color:rgb(255, 255, 255);
    margin: 20px;
    padding: 20px 20px;
    border: 1px solid rgb(216, 216, 216);
    border-radius: 6px;
    box-shadow: 0px 4px 20px 4px rgba(0, 0, 0, 0.08);
    height: 100px;
}
.sign-out .sign-out-item
{
text-align: center;
padding: 6px 60px;
float:left;
}
</style>