import './bootstrap';
import { createApp } from 'vue';
import router from './router/router.js';
// import store from './store/store.vue';


const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
import HeaderComponent from './components/HeaderComponent.vue';

app.component('example-component', ExampleComponent);
app.component('header-component', HeaderComponent);

// app.mount('#app');
app.use(router);
// app.use(store);

app.mount("#app");