<template>
    <section id="block-itemcreate">
        <div class="container">
            <form @submit.prevent="submitForm">
                <div class="form-group">
                    <label for="goods_title">商品名</label>
                    <input type="text" class="form-control" id="goods_title" aria-describedby="goods_title" placeholder="商品名" v-model="form.goods_title">
                </div>
                <div class="form-group">
                    <label for="goods_price">商品価格</label>
                    <input type="number" class="form-control" id="goods_price" aria-describedby="goods_price" placeholder="1000" v-model="form.goods_price">
                </div>
                <div class="form-group">
                    <label for="goods_stock">在庫数</label>
                    <input type="number" class="form-control" id="goods_stock" aria-describedby="goods_stock" placeholder="10" v-model="form.goods_stock">
                </div>
                <div class="form-group">
                    <label for="goods_comment">商品コメント</label>
                    <input type="text" class="form-control" id="goods_comment" aria-describedby="goods_comment" placeholder="商品コメント" v-model="form.goods_comment">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>
</template>

<script>
    export default {
        data() {
            return {
                form: {
                    goods_title: '',
                    goods_price: '',
                    goods_stock: '',
                    goods_comment: '',
                }
            };
        },
        methods: {
            submitForm() {
                axios.post('/api/goods/create', this.form)
                    .then(response => {
                        alert(response.data.message);
                        this.form.goods_title = '';
                        this.form.goods_price = '';
                        this.form.goods_stock = '';
                        this.form.goods_comment = '';
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }
        }
    }
</script>