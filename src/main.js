import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import "@/assets/css/style.css";

const app = createApp(App);
app.use(router);

app.config.globalProperties.$globalVar = 'Valor Global';

app.mount('#app');
