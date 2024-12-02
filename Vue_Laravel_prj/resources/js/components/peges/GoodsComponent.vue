<template>
    <section id="block-itemlist">
        <div class="container">
            <div class="item_list">
                <div class="item_box" v-for="goods in goodslist.data" :key="goods.id" :id="'item_' + goods.id">
                    <router-link v-bind:to="{name: 'GoodsShowComponent',params: {goodsId: goods.id }}" class="card">
                    <img alt="Vue logo" :src="`${goods.goods_img}`" >
                    <div class="card-body">
                        <span>{{ goods.id}}</span>
                        <h5 class="card-title">{{ goods.goods_title }}</h5>
                        <p class="card-text">{{ goods.goods_comment }}</p>
                        <span class="card-price">￥{{ goods.goods_price }}</span>
                        <router-link v-bind:to="{name: 'GoodsUpdateComponent',params: {goodsId: goods.id }}" class="btn btn-primary">商品を編集</router-link>
                    </div>
                    </router-link>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <button class="page-link" aria-label="Previous" @click="getGoods(goodslist.first_page_url)" :disabled="!goodslist.prev_page_url">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </button>
                        </li>
                        <li class="page-item"  v-for="page in visiblePages" :key="page" @click="getGoods(`/api/goods/?page=${page}`)">
                            <button class="page-link">{{ page }}</button>
                        </li>
                        <li class="page-item">
                            <button class="page-link" aria-label="Next" @click="getGoods(goodslist.last_page_url)" :disabled="!goodslist.next_page_url">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </button>
                        </li>
                    </ul>
                </nav>                
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
                goodslist:[],
                totalPages: [],
                visiblePages: []
            }
        },
        methods:{
            getGoods(url){
                axios.get(url).then((res) => {
                    this.goodslist = res.data;
                    //全ページ数の配列生成
                    this.totalPages = Array.from({ length: this.goodslist.last_page }, (_, i) => i + 1);
                    //watch用のメソッド
                    this.updatepages();
                });
            },
            updatepages(){
                //現在のページ
                let currentPage = this.goodslist.current_page;
                let startPage = Math.max(currentPage - 2, 1);
                let endPage = Math.min(currentPage + 2, this.goodslist.last_page);
                this.visiblePages = this.totalPages.slice(startPage - 1, endPage);
            },
        },
        mounted() {
            this.getGoods('/api/goods');
        },
        watch: {
            goodslist: {
                handler() {
                    this.updatepages();
                },
                deep: true
            }
        }
    }
</script>

<style>
  .item_list {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
  }

  .item_list > .item_box {
    width: calc((100% - 60px) / 4);
  }

  .item_list .card-price {
    display: block;
    text-align: right;
  }

  nav{
    width: 100%;
    display: flex;
    justify-content: space-evenly;
    align-items: center;
  }

  nav ul.pagination {
    display: flex;
    width: 50%;
    justify-content: space-evenly;
    align-items: center;
  }

  .btn.btn-primary {
    color: #fff;
  }

  .box{
    width: 100px; height: 100px; background-color: blue; position: absolute; top: 50px; left: 50px;
  }

  .card-body {
    position: relative;
  }

</style>
