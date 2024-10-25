<template>
    <section id="block-itemlist">
        <div class="container">
            <div class="item_list">
                <div class="card" v-for="goods in goodslist" :key="goods.id">
                    <img alt="Vue logo" :src="goods.goods_img" >
                    <div class="card-body">
                    <h5 class="card-title">{{ goods.goods_title }}</h5>
                    <p class="card-text">{{ goods.goods_comment }}</p>
                    <span class="card-price">￥{{ goods.goods_price }}</span>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: 'block_itemlist',
        props: {
            msg: String
        },
        data(){
            return{
                goodslist:[]
            }
        },
        methods:{
            getGoods(){
                axios.get('/api/goods')
                .then((res) => {
                    this.goodslist = res.data;
                });
            }
        },
        mounted() {
            this.getGoods();
        }
    }
</script>

<style>
  .item_list {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
  }

  .item_list > .card {
    width: 18rem;
  }

  .item_list .card-price {
    display: block;
    text-align: right;
  }

</style>
