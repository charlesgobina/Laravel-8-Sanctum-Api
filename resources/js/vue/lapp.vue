<template >
    <div class="productContainer">
        <div class="heading">
            <h2 id="title">Login</h2>
            <login/> 
        </div>
        <listproduc/>
    </div> 
    
</template>

<script>
import login from "./login"
export default {
    components:{
        login
    }
    
}
</script>

<style scoped>

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