import { createRouter, createWebHistory } from "vue-router";

//import ExampleComponentComponent from '@/components/ExampleComponent.vue';
import GoodsComponent from '@/components/peges/GoodsComponent.vue';

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