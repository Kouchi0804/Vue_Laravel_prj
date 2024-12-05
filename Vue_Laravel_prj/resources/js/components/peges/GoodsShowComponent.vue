<script setup>
    import { ref, reactive,onMounted  } from 'vue';
    import { useRoute } from 'vue-router';

    //ルート情報を取得
    const route = useRoute();

    const props = defineProps({
        goodsId:String
    });

    const goodslist = reactive({});

    const getGoods = () =>{
        const productId = route.params.id;
        axios.get('/api/goods/show/' + props.goodsId)
        .then((res) => {
            Object.assign(goodslist, res.data);
        })
        .catch((error) => {
            console.error(error);
        });
    };

    const deleteGoods = () => {
        axios.delete('/api/goods/show/' + props.goodsId)
            .then(() => {
                alert('商品を削除しました');
                setTimeout(() => { route.push('/');})
            })
            .cathc(error =>{
                console.error(error)
            })
    };

    const deleteGoodsConfirm = () => {
        if(confirm('商品を削除しますか？')){
            deleteGoods();
        }
    };

    const moveBox = () => {
        const box = document.getElementById('item_' + itemId);
        let position = 50;
        const interval = setInterval(frame, 10);

        function frame() {
            if (position >= 350) {
                clearInterval(interval);
            } else {
                position++;
                box.style.left = position + 'px';
            }
        }
    };

    onMounted(() => {
        getGoods();
    });

</script>

<template>
    <section id="block-itemshow">
        <div class="container">
            <form>
                <div class="form_box" >
                    <img alt="Vue logo" :src="`${goodslist.goods_img}`" >
                    <div class="form_content">
                        <div class="form-group">
                            <label for="goods_title">商品名</label>
                            <input type="text" class="form-control" id="goods_title" aria-describedby="goods_title" placeholder="商品名" v-bind:value="goodslist.goods_title" disabled>
                        </div>
                        <div class="form-group">
                            <label for="goods_title">商品名コメント</label>
                            <textarea  class="form-control" id="goods_title" aria-describedby="goods_title" placeholder="商品名" v-bind:value="goodslist.goods_comment" disabled></textarea>
                        </div>
                        <div class="form-group">
                            <label for="goods_title">商品価格</label>
                            <input type="text" class="form-control" id="goods_title" aria-describedby="goods_title" placeholder="商品名" v-bind:value="goodslist.goods_price" disabled>
                        </div>
                        <button type="button" v-on:click="deleteGoodsConfirm()" class="btn btn-danger">商品を削除</button>
                        <!-- <button type="button" v-on:click="moveBox(goodslist.id)" class="btn btn-primary test_btn" :id="'item_' + goodslist.id">test</button> -->
                    </div>
                </div>
            </form>
        </div>
    </section>
</template>


<style scoped>
    .form_box{
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 40px;
    }
    .form_content{
        width: 50%;
        position: relative;
    }

</style>