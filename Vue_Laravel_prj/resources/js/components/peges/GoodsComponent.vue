<template>
    <section id="block-itemlist">
        <div class="container">
            <div class="item_list">
                <div class="card" v-for="goods in goodslist.data" :key="goods.id">
                    <img alt="Vue logo" :src="goods.goods_img" >
                    <div class="card-body">
                        <span>{{ goods.id}}</span>
                    <h5 class="card-title">{{ goods.goods_title }}</h5>
                    <p class="card-text">{{ goods.goods_comment }}</p>
                    <span class="card-price">￥{{ goods.goods_price }}</span>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
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

                     console.log(this.goodslist)
                    // console.log('url')
                    // console.log(url)
                    //console.log(this.totalPages)
                });
            },
            updatepages(){
                //現在のページ
                let currentPage = this.goodslist.current_page;
                let startPage = Math.max(currentPage - 2, 1);
                let endPage = Math.min(currentPage + 2, this.goodslist.last_page);
                this.visiblePages = this.totalPages.slice(startPage - 1, endPage);
            }
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

  .item_list > .card {
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



</style>
