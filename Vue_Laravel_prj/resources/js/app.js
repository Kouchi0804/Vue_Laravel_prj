import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
import HeaderComponent from './components/HeaderComponent.vue';

app.component('example-component', ExampleComponent);
app.component('header-component', HeaderComponent);

app.mount('#app');