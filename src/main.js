import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import "@/assets/css/style.css";
import store from './store'

const app = createApp(App).use(store);
app.use(router);

app.mount('#app');






