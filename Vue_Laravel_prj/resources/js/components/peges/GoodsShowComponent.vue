<script setup>
    import { ref, reactive,onMounted  } from 'vue';
    import { useRoute } from 'vue-router';

    import Modal from '@/components/parts/ModalButtonComponent.vue';

    //ルート情報を取得
    const route = useRoute();

    //Props     --------------------------------------------------
    const props = defineProps({
        goodsId:String
    });

    //data      --------------------------------------------------
    const goodslist = reactive({});
    
    //モーダルの表示状態
    const isModalVisible = ref(false);
    // 拡大表示する画像のURL
    const modalImageSrc = ref('');

    //methods   --------------------------------------------------
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
    
    // マウスオンでモーダルを表示
    const showModal = (imageSrc) => {
        modalImageSrc.value = imageSrc;
        isModalVisible.value = true;
    };

    // マウスアウトでモーダルを非表示
    const hideModal = () => {
        isModalVisible.value = false;
    };

    //Mounted   --------------------------------------------------
    onMounted(() => {
        getGoods();
    });

</script>

<template>
    <section id="block-itemshow">
        <div class="container">
            <form>
                <div class="form_box" >
                    <img 
                        alt="Vue logo" 
                        :src="`${goodslist.goods_img}`" 
                        @mouseover="showModal(`${goodslist.goods_img}`)"
                        @mouseout="hideModal"
                    >
                    <teleport to="body">
                    <div v-if="isModalVisible" class="modal-overlay" @mousemove="hideModal">
                        <img :src="modalImageSrc" class="modal-image" alt="Expanded Image" />
                    </div>
                    </teleport>
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
                        <div >
                            <button type="button" v-on:click="deleteGoodsConfirm()" class="btn btn-danger">商品を削除</button>
                            <!-- <Modal/> -->
                        </div>
                        
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

    .image-gallery img {
        width: 150px;
        height: 150px;
        margin: 10px;
        cursor: pointer;
        transition: transform 0.3s;
    }
    .image-gallery img:hover {
    transform: scale(1.1);
    }

    /* モーダルのオーバーレイスタイル */
    .modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
    }

    /* モーダル内の画像スタイル */
    .modal-image {
    max-width: 90%;
    max-height: 90%;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
    border-radius: 5px;
    }

</style>