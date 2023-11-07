import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { createApp } from 'vue';
import ProductList from './components/ProductList.vue';

const app = createApp({});
app.component('product-list', ProductList);
app.mount('#app');
