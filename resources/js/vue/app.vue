<template >
    <div class="productContainer">
        <div class="heading">
            <h2 id="title">Registration</h2>
            <adduser/> 
            <span class="mem">Already a member? <a href="/resources/views/login.blade.php">Login</a> </span>
        </div>
    </div> 
    
</template>

<script>
import adduser from "./adduser"
export default {
    components:{
        adduser
    }
    
}
</script>

<style scoped>

.mem{
    font-size: x-small;
    text-align: center;
    margin: 0 70px;
}

.mem a{
    text-decoration: none;
    color: tomato;
}

.productContainer{
    width:350px;
    margin: auto;
}

.heading{
    background: #e6e6e6;
    padding: 10px;
    font-family: Arial, Helvetica, sans-serif;
}

#title {
    text-align: center;
}


</style>