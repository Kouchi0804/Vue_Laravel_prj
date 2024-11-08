<template>
    <section id="block-itemcreate">
        <div class="container">
            <form @submit.prevent="updateGoods">
                <div class="form_box">
                    <img alt="Vue logo" :src="`${goodslist.goods_img}`" >
                    <div class="form_content">
                        <div class="form-group">
                            <label for="goods_title">商品名</label>
                            <input type="text" class="form-control" id="goods_title" aria-describedby="goods_title" placeholder="商品名"  v-model="goodslist.goods_title" >
                        </div>
                        <div class="form-group">
                            <label for="goods_comment">商品名コメント</label>
                            <textarea  class="form-control" id="goods_comment" aria-describedby="goods_comment" placeholder="商品コメント"  v-model="goodslist.goods_comment" ></textarea>
                        </div>
                        <div class="form-group">
                            <label for="goods_stock">商品在庫</label>
                            <input type="text"  class="form-control" id="goods_stock" aria-describedby="goods_stock" placeholder="商品在庫"  v-model="goodslist.goods_stock" >
                        </div>
                        <div class="form-group">
                            <label for="goods_price">商品価格</label>
                            <input type="text" class="form-control" id="goods_price" aria-describedby="goods_price" placeholder="商品価格"  v-model="goodslist.goods_price" >
                        </div>
                        <button type="submit" class="btn btn-success">商品情報を更新</button>
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
                message: ''
            };
        },
        methods:{
            getGoods(){
                const productId = this.$route.params.id;
                axios.get('/api/goods/update/' + this.goodsId)
                   .then((res) => {
                       this.goodslist = res.data;
                });
            },
            updateGoods(){
                //console.log(this.goodslist)
                axios.put('/api/goods/update/' + this.goodsId, this.goodslist).then((res) => {
                    this.$router.push({ name: 'GoodsUpdateComponent', params: { goodsId: this.goodsId } });
                    //console.log(res.data.message)
                    this.message = res.data.message;
                    alert(this.message);
                });
            }
            // async getGoods(){
            //     try {
            //             const response = await fetch(`/api/goods/show/` + this.goodsId);
            //             if (!response.ok) {
            //                 throw new Error('Product not found');
            //             } 
            //             this.product = await response.json(); 
            //             console.log(this.product);
            //         } catch (error) {
            //             console.error(error);
            //     }
            // }
        },
        mounted() {
            this.getGoods();
        },
    }
</script>
<style>
    .btn-success{
        margin-left: auto;
        display: block;
    }

</style>