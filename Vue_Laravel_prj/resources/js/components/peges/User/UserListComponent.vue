<template>
    <section id="block-user-list">
        <div class="container">
            <h1>UserList</h1>
            <p>名前: {{ user.name }}</p>
            <button type="button" @click="logout" class="btn btn-success">ログアウト</button>
        </div>
    </section>
</template>

<script setup>
import { ref,reactive } from 'vue';
import { useStore } from '@/store/pinia_user.js';
import { useRouter } from 'vue-router'

    //data
    //const [name,email,login_flg] = reactive(["","",false]);
    const user = reactive({
        name:'',
        login_flg:false
    });

    //router
    const router = useRouter()

    //Pinia
    const usestore = useStore()

    //methods
    const logout = () =>{
        axios.post("api/logout")
            .then(response => {
                // console.log(response);

                //this.$router.push("/");
                router.push("/"); //Composition API
            })
            .catch(error => {
                console.log(error);
            }
        );
    };

    const userGet = () => {
        axios.get("/api/user")
        .then(response => {
            user.name = response.data.name;
            user.login_flg = true;

            //console.log(usestore.user.login_flg);

            //Pinia
            usestore.updateUserState(user); //actionを実行してstateの値を更新
            //console.log(usestore.updateUserState(user));

            //actionが非同期なので、stateの更新が他のコンポーネントに反映されない？
            //usestore.user = user;
        })
        .catch(error => {
            console.error(error);
        });
    }

    userGet();

</script>