<template>
    <section id="block-itemcreate">
        <div class="container">
            <form>
                <div class="form_box">
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
                    </div>
                </div>
            </form>
        </div>
    </section>
</template>

<script>
    export default {
        props: {
            goodsId: Number
        },
        data() {
            return {
                goodslist:[],
            };
        },
        methods:{
            getGoods(){
                const productId = this.$route.params.id;
                axios.get('/api/goods/show/' + this.goodsId)
                   .then((res) => {
                       this.goodslist = res.data;
                       //console.log(this.goodslist)
                });
            },
            deleteGoods(){
                axios.delete('/api/goods/show/' + this.goodsId)
                    .then(() => {
                        alert('商品を削除しました');
                        setTimeout(() => { this.$router.push('/');})
                    })
                    .cathc(error =>{
                        console.error(error)
                    })
            },
            deleteGoodsConfirm(){
                if(confirm('商品を削除しますか？')){
                    this.deleteGoods();
                }
            },
        },
        mounted() {
            this.getGoods();
        },
        
    }
</script>
<style>
    .form_box{
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 40px;
    }
    .form_content{
        width: 50%;
    }
</style>