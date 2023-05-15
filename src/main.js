import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import "@/assets/css/style.css";
import axios from "axios";

const app = createApp(App);
app.use(router);

app.config.globalProperties.$globalVar = 'Valor Global';

app.config.globalProperties.$authUser = () => {

    let token = localStorage.getItem('auth-token');
    console.log(token)
    if (!token) {
        router.push('/login');
    } else {
        axios
        .get('http://localhost:9090/token/restricted.php', {
            headers: {
                Authorization: `Bearer ${token}`
            }
            
        })
        .catch((error) => {
            localStorage.removeItem('auth-token');
            alert(error);
        })
    }

};

app.config.globalProperties.$logoutUser = () => {
    localStorage.removeItem('auth-token');
    router.push('/');
}
app.mount('#app');
