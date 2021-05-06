<template>
    <div class="addItem">
        <div class="inputs">
            <input type="text" placeholder="Name" v-model="register.name"><br>
            <input type="email" placeholder="Email" v-model="register.email"><br>
            <input type="text" placeholder="Department" v-model="register.department"><br>
            <input type="text" placeholder="Matricule" v-model="register.matricule"><br>
            <input type="text" placeholder="Level" v-model="register.level"><br>
            <input type="password" placeholder="Password" v-model="register.password"><br>
            <input type="password" placeholder="Password Confrimation" v-model="register.password_confirmation"><br>
        </div>
        <button 
        class="addbtn" 
        @click="addItem()"
        :class="[register.name? 'active' : 'inactive', 'plus']" >Register</button>

    </div>
</template>

<script>
export default {
    data:function() {
        return  {
            register: {
                name: "",
                email: "",
                department: "",
                matricule: "",
                level: "",
                password: "",
                password_confirmation: ""
            }
        }
    },
    methods: {
        addItem() {
            
            axios.post('api/register', {
                name: this.register.name,
                email: this.register.email,
                department: this.register.department,
                matricule: this.register.matricule,
                level: this.register.level,
                password: this.register.password,
                password_confirmation: this.register.password_confirmation,
            })
            .then( response => {
                if(response.status == 201) {
                    this.register.name == "";
                    alert('User successfully registered');
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
    padding: 10px;
    color: rgb(255, 253, 253);
    background-color: rgb(0, 185, 74);
    font-family: Arial, Helvetica, sans-serif;
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
    padding:10px ;
}

.active {
    color: white;
    background-color: rgb(0, 185, 74);
}
.inactive {
    background-color: #cacaca;
}
</style>