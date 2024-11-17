<template>
    <section id="block-user-list">
        <div class="container">
            <h1>UserList</h1>
            <p>名前: {{ name }}</p>
            <p>メールアドレス: {{ email }}</p>
            <button type="button" @click="logout">ログアウト</button>
        </div>
    </section>
</template>

<script>
    export default {
        data() {
            return {
                name: "",
                email:""
            };
        },
        methods: {
            logout() {
                axios.post("api/logout")
                    .then(response => {
                        console.log(response);
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
                    console.log(response)
                    // this.user.name = response.data.user.name;
                    // this.user.email = response.data.user.email;
                })
                .catch(error => {
                    console.error(error);
                });
            }
        },
        created() {
            this.userGet();
        },
    }
</script>
