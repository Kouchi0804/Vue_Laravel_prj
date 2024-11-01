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
                <div class="form-group">
                    <label for="goods_image">商品画像</label>
                    <input type="file" class="form-control-file" id="goods_image" aria-describedby="goods_image" placeholder="商品画像" @change="handleFileUpload">
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
                    goods_image: null,
                }
            };
        },
        methods: {
            // inputフィールドの変更イベント
            // event.target.files[0]を使用して、選択されたファイルを取得し、form.goods_imageに設定します。
            handleFileUpload(event) {
                this.form.goods_image = event.target.files[0];
            },
            submitForm() {
                //通常のJSON形式ではファイルデータを扱うことができないため、FormDataを使用してファイルと他のデータを一緒に送信します。
                let formData = new FormData();
                formData.append('goods_title', this.form.goods_title);
                formData.append('goods_price', this.form.goods_price);
                formData.append('goods_stock', this.form.goods_stock);
                formData.append('goods_comment', this.form.goods_comment);
                formData.append('goods_img', this.form.goods_image);

                axios.post('/api/goods/create', formData,{
                    //Content-Typeヘッダーをmultipart/form-dataに設定することで、ブラウザはフォームデータが複数の部分（パート）に分かれていることをサーバーに知らせます。
                    //これにより、サーバーは各部分を正しく解析し、ファイルデータを含むフォームデータを処理することができます。
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                    .then(response => {
                        alert(response.data.message);
                        this.form.goods_title = '';
                        this.form.goods_price = '';
                        this.form.goods_stock = '';
                        this.form.goods_comment = '';
                        this.form.goods_image = null;
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }
        }
    }
</script>