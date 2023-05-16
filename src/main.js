import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import "@/assets/css/style.css";
import axios from "axios";

const app = createApp(App);
app.use(router);

app.config.globalProperties.$globalVar = 'Valor Global';

app.config.globalProperties.$authUser = async () => {
  let token = localStorage.getItem('auth-token');
  if (!token) {
    router.push('/login');
  } else {
    try {
      await axios
        .get('http://localhost:9090/token/restricted.php', {
          headers: {
            Authorization: `Bearer ${token}`
          }
        });
    } catch (error) {
      localStorage.removeItem('auth-token');
      alert('Token invalido');
      router.push('/login');
    }
  }
};

app.config.globalProperties.$getUserType = () => {
  let token = localStorage.getItem('auth-token');
  if (token) {
    return axios.get('http://localhost:9090/token/getUserType.php', {
      headers: {
        Authorization: `Bearer ${token}`
      }
    });
  } else {
    return Promise.reject('No token found');
  }
};

app.config.globalProperties.$logoutUser = () => {
  localStorage.removeItem('auth-token');
  router.push('/');
};

app.mount('#app');






