<template>
    <section >
        <div class="container">
            <router-link v-bind:to="{name: 'UserRegisterComponent'}" >新規登録</router-link>
        </div>
    </section>
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

<!-- <script setup>

    import { reactive } from 'vue'
    import { useStore } from '@/store/pinia_user.js'

    const user = useStore();

    const userData = reactive({
        email: '',
        password: '',
        errorMessage: '',
    });

    const login = async () => {
        try {
            await axios.get('/sanctum/csrf-cookie');
            const res = await axios.post('/api/login', {
                email: userData.email,
                password: userData.password }
            );

            if (res.data.status_code === 200) {
                router.push("/about");
            } else {
                userData.errorMessage = 'ログインに失敗しました。';
            }
        } catch (err) {
            console.log(err);
            userData.errorMessage = 'ログインに失敗しました。';
        }
    };
    


</script> -->
