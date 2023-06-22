import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import "@/assets/css/style.css";
import axios from "axios";
import store from './store'

const app = createApp(App).use(store);
app.use(router);

app.config.globalProperties.$authUser = () => {
  let token = localStorage.getItem('auth-token');
  if (!token) {
    router.push('/login');
  } else {
    axios
      .get('http://localhost:9090/auth/restricted.php', {
        headers: {
          Authorization: `Bearer ${token}`
        }
      })
      .then((reponse => {
        console.log(reponse);
      }))
      .catch((error => {
        console.log(error)
      }));
  }
};
app.mount('#app');






