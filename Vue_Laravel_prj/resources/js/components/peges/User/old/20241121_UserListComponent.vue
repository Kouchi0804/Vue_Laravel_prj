<template>
    <section id="block-user-list">
        <div class="container">
            <h1>UserList</h1>
            <p>名前: {{ user.name }}</p>
            <p>メールアドレス: {{ email }}</p>
            <button type="button" @click="logout" class="btn btn-success">ログアウト</button>
        </div>
    </section>
</template>

<script>
    import { useStore } from '@/store/pinia_user.js';

    export default {
        data() {
            return {
                name: "",
                email:"",
                login_flg:false,
                user: {
                    name: '',
                    login_flg:false,
                },
                UserStoreData:useStore()
            };
        },
        methods: {
            logout() {
                axios.post("api/logout")
                    .then(response => {
                        // console.log(response);
                        this.$router.push("/");
                    })
                    .catch(error => {
                        console.log(error);
                    }
                );
            },
            userGet(){
                axios.get("/api/user")
                .then(response => {
                    
                    this.user.name = response.data.name;
                    this.email = response.data.email;
                    this.user.login_flg = true;
                    //console.log(useStore.mapStores())
                })
                .catch(error => {
                    console.error(error);
                });
            },

        },
        created() {
            this.userGet();
        },
    }
</script>
