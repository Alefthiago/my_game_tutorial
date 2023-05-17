<template>
  <div>
    <form @submit="updateNews($event)">
        <input type="text" v-model="title" required>
        <textarea cols="30" rows="10" v-model="content" required></textarea>
        <button>Salvar</button>
    </form>
    {{ title }}
    {{ content }}
    {{ $route.query.date }}
  </div>
</template>

<script>
import axios from 'axios';
export default {
    data () {
        return {
            title: this.$route.query.title,
            content: this.$route.query.content
        }
    },
    methods: {
        updateNews (e) {
            e.preventDefault();
            let token = localStorage.getItem('auth-token');
            if (token) {
                axios
                    .post('http://localhost:9090/updateNews.php', {
                        title: this.title,
                        content: this.content,
                        author: this.$route.query.author,
                        id: this.$route.query.id,
                        token: token
                    })
                    .then(() => {
                        this.$router.push('/');
                    })
                    .catch((error) => {
                        alert(error);
                    })
            }
        }
    }
}
</script>

<style>

</style>