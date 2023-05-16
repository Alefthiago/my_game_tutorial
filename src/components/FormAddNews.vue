<template>
  <form @submit="addPost">
    <input type="text" v-model="titleNews" />
    <textarea cols="30" rows="10" v-model="contentNews"></textarea>
    <button>Postar</button>
  </form>
  {{ titleNews }}
  {{ contentNews }}
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      titleNews: "",
      contentNews: "",
    };
  },
  methods: {
    addPost(e) {
      e.preventDefault();
      let token = localStorage.getItem("auth-token");
      if (token) {
        axios
          .post("http://localhost:9090/addNews.php", {
            title: this.titleNews,
            content: this.contentNews,
            token: token
          })
          .then(() => {
            e.target.reset();
            location.reload();
          })
          .catch(() => {
            alert('Ação não autoriazada');
          });
      } else {
        alert('Ação não autoriazada');
      }
    },
  }
  };
</script>

<style>
</style>