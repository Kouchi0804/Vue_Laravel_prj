<template>
    <section id="block-user-login">
        <div class="container">
           <form @submit.prevent="login">
                <div class="form-group">
                    <label for="user_email">メールアドレス</label>
                    <input v-model="email" type="email" class="form-control" id="user_email" aria-describedby="user_email" placeholder="メールアドレス">
                </div>
                <div class="form-group">
                    <label for="user_password">パスワード</label>
                    <input v-model="password" type="password" class="form-control" id="user_password" aria-describedby="user_password" placeholder="パスワード">
                </div>
                <button type="submit" class="btn btn-success">ログイン</button>
           </form>
           <p v-if="errorMessage">{{ errorMessage }}</p>
        </div>
    </section>
</template>

<script>
    export default {
        data() {
            return {
                email: '',
                password: '',
                errorMessage: '',
            };
        },
        methods: {
            login() {
                axios.get('/sanctum/csrf-cookie')
                    .then((res)=>{
                        axios.post('/api/login', {
                            email: this.email,
                            password: this.password
                        })
                        .then((res)=>{
                            if( res.data.status_code == 200 ) {

                                //ログイン後に認証ずみユーザー情報が取得できているか確認
                                // axios.get("/api/user/")
                                //     .then(response => {
                                //         console.log(response)
                                //     })
                                //     .catch(error => {
                                //         console.error(error);
                                //     }
                                // );

                                //ログイン情報用のコンポーネントに遷移
                                this.$router.push("/about");
                            }
                            //this.errorMessage = 'ログインに失敗しました。'
                        })
                        .catch((err) => {
                            console.log(err);
                            this.errorMessage = 'ログインに失敗しました。1'
                        });
                    })
                    .catch((err) => {
                    //
                    console.log(err);
                })
            }
        },
    }
</script>
