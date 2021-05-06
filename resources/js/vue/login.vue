<template>
    <div class="addItem">
        <div class="inputs">
            <input type="email" placeholder="Email" v-model="login.email"><br>
            <input type="password" placeholder="Password" v-model="login.password"><br>
        </div>
        <button 
        class="addbtn" 
        @click="addItem()"
        :class="[login.name? 'active' : 'inactive', 'plus']" >Login</button>

    </div>
</template>

<script>
export default {
    data:function() {
        return  {
            login: {
                email: "",
                password: ""
            }
        }
    },
    methods: {
        addItem() {
            
            axios.post('api/login', {
                email: this.login.email,
                password: this.login.password,
            })
            .then( response => {
                if(response.status == 201) {
                    this.login.name == "";
                    
                }
            })
            .catch( error => {
                console.log(error);
            })
        }
    }
}
</script>

<style scoped>
.addbtn{
    padding: 3px;
    color: rgb(255, 253, 253);
    background-color: rgb(0, 185, 74);
    font-family: Arial, Helvetica, sans-serif;
    border-radius: 20px;
    cursor: pointer;
    outline: none;
    width: 60%;
    margin: 10px;
}

.addItem{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
input{
    background: #f7f7f7;
    border: 0px;
    outline: none;
    margin-right: 10px;
    width: 100%;
}

.active {
    color: white;
    background-color: rgb(0, 185, 74);
}
.inactive {
    background-color: #999999;
}
</style>