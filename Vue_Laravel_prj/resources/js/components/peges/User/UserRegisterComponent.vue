<template>
    <section id="block-userregister">
        <div class="container">
           <form @submit.prevent="register">
                <div class="form-group">
                    <label for="user_name">ユーザー名</label>
                    <input v-model="name" type="text" class="form-control" id="user_name" aria-describedby="user_name" placeholder="ユーザー名">
                </div>
                <div class="form-group">
                    <label for="user_email">メールアドレス</label>
                    <input v-model="email" type="email" class="form-control" id="user_email" aria-describedby="user_email" placeholder="メールアドレス">
                </div>
                <div class="form-group">
                    <label for="user_password">パスワード</label>
                    <input v-model="password" type="password" class="form-control" id="user_password" aria-describedby="user_password" placeholder="パスワード">
                </div>
                <button type="submit" class="btn btn-success">登録</button>
           </form>
        </div>
    </section>
</template>

<script>
    export default {
        data(){
            return{
                name:'',
                email:'',
                password:''
            }
        },
        methods:{
            register(){
                axios.post('/register',{
                    name:this.name,
                    email:this.email,
                    password:this.password
                })
                .then(response => {
                    alert(response.data.message);
                    this.$router.push('/');
                })
                .catch(error =>{
                    console.error(error);
                })       
            }
        },
    }
</script>