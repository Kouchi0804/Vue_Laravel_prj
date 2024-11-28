<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <router-link v-bind:to="{name: 'GoodsComponent'}">
                        <a class="nav-link">Home</a>
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link v-bind:to="{name: 'GoodsCreateComponent'}">
                        <button  class="nav-link">商品登録</button >
                    </router-link>
                </li>
                <li class="nav-item" v-if="!login_flg">
                    <router-link v-bind:to="{name: 'UserLoginComponent'}">
                        <button  class="nav-link">ログイン</button >
                    </router-link>
                </li>
            </ul>
            </div>
        </div>
        </nav>
    </div>
</template>

<script setup>
    import { ref,reactive, watch } from 'vue';
    import { computed } from 'vue'
    import { useStore } from '@/store/pinia_user.js';

    //Pinia
    const usestore = useStore()

    const userName = computed(() =>usestore.user.name);
    const login_flg = computed(() =>usestore.user.login_flg);

</script>