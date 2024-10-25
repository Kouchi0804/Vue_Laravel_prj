import './bootstrap';
import { createApp } from 'vue';
import router from './router/router.js';

const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
import HeaderComponent from './components/HeaderComponent.vue';

app.component('example-component', ExampleComponent);
app.component('header-component', HeaderComponent);

// app.mount('#app');
app.use(router).mount("#app");