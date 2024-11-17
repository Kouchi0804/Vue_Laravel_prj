import { createRouter, createWebHistory } from "vue-router";

//import ExampleComponentComponent from '@/components/ExampleComponent.vue';
import GoodsComponent from '@/components/peges/GoodsComponent.vue';
import GoodsCreateComponent from '@/components/peges/GoodsCreateComponent.vue';
import GoodsUpdateComponent from '@/components/peges/GoodsUpdateComponent.vue';
import GoodsShowComponent from '@/components/peges/GoodsShowComponent.vue';
import UserRegisterComponent from '@/components/peges/User/UserRegisterComponent.vue';
import UserLoginComponent from '@/components/peges/User/UserLoginComponent.vue';
import UserListComponent from '@/components/peges/User/UserListComponent.vue';

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            name: "GoodsComponent",
            components: {
              default: GoodsComponent,
              Goods: GoodsComponent,
            }
        },
        {
            path: '/goods/create',
            name: "GoodsCreateComponent",
            component: GoodsCreateComponent
        },
        {
            path: '/goods/update/:goodsId',
            name: "GoodsUpdateComponent",
            component: GoodsUpdateComponent,
            props: true
        },
        {
            path: '/goods/show/:goodsId',
            name: "GoodsShowComponent",
            component: GoodsShowComponent,
            props: true
        },
        {
            path: '/user/register',
            name: "UserRegisterComponent",
            component: UserRegisterComponent
        },
        {
            path: '/login',
            name: "UserLoginComponent",
            component: UserLoginComponent
        },
        {
            path: "/about",
            name: "UserListComponent",
            component: UserListComponent,
        },

        //複数の場合
        //ルーティングの際にcomponentではなくcomponentsを指定する
        // {
        //     path: '/',
        //     components: {
        //       default: Foo,
        //       a: Bar,
        //       b: Baz
        //     }
        // }
    ],
});

export default router;