<script setup>
  import { ref, reactive  } from 'vue';
  import Sample from '@/components/parts/ModalContentComponent.vue';

  const sampleModalVisible = ref(false);

  const showSampleModal = () => {
    sampleModalVisible.value = true;
  };

  const closeSampleModal = () => {
    sampleModalVisible.value = false;
  };


</script>

<template>
  <div>
    <button type="button" v-on:click="showSampleModal()" class="btn btn-danger">モーダル</button>
    <Sample :isVisible="sampleModalVisible" @close="closeSampleModal" />
  </div>
</template>
  

  
<style scoped lang='sass'>
  
</style>