<template>
  <div class="container">
    <p class="titleComponent fs fontBold">Postagens</p>
    <div v-for="post in posts" :key="post.id" class="jumbotron">
      <h3>{{ post.users_username }}</h3>
      <div v-if="showMoreButton(post.post_content) || showLessButton" class="text-center">
        <a @click="toggleText(post.id)">{{ buttonText(post.id) }}</a>
      </div>
      <hr class="my-4">
      <p>{{ truncatedText(post.post_content) }}</p>
      <div v-if="post.post_path_file">
        <img v-if="post.post_file_type === 'image'" :src="getImage(post.post_path_file)" alt="">
        <video v-else-if="post.post_file_type === 'video'"></video>
      </div>
      <a class="btn btn-primary btn-lg" role="button">comentarios</a>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import jwt_decode from 'jwt-decode';

export default {
  data() {
    return {
      posts: [],
      idUser: '',
      maxCharacters: 100,
      showMore: false,
      showLess: false,
      additionalCharacters: 200
    };
  },
  created() {
    if(localStorage.getItem('auth-toke')) {
      this.idUser = jwt_decode(localStorage.getItem('auth-token')).sub
    }
    axios
      .get("http://localhost:9090/post/recoverPost.php")
      .then((response) => {
        console.log(response.data);
        this.posts = response.data; // Definir a lista de posts com os dados recebidos
      })
      .catch((error) => {
        console.log(error);
      });
  },
  computed: {
    truncatedText() {
      return (text) => {
        if (text && text.length > this.maxCharacters && !this.showMore) {
          return text.slice(0, this.maxCharacters) + "...";
        }
        return text;
      };
    },
    showMoreButton() {
      return (text) => {
        return text && text.length > this.maxCharacters && !this.showMore && !this.showLess;
      };
    },
    showLessButton() {
      return this.showLess;
    },
    buttonText() {
      return (postId) => {
        return this.showMore === postId ? "Show Less" : "Show More";
      };
    },
  },
  methods: {
    toggleText(postId) {
      if (this.showMore === postId) {
        this.maxCharacters = 100;
        this.showMore = false;
        this.showLess = false;
      } else {
        this.maxCharacters += this.additionalCharacters;
        if (this.maxCharacters >= this.posts.find(post => post.id === postId).text.length) {
          this.showMore = postId;
          this.showLess = true;
        }
      }
    },
    getImage(path) {
      return require(`@/backend/post/dataPost/${path}`);
    },
    updatePost() {
      console.log("Update post");
    },
    deletePost() {
      console.log("Delete post");
    }
  }
};
</script>

<style scoped>
.container {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: 80vw;
  height: auto;
  margin-bottom: 30px;
}

.titleComponent {
  width: 80vw;
  min-height: 100px;
  display: flex;
  padding: 50px;
  font-size: 3rem;
  text-shadow: 5px 5px 10px black;
}

img {
  max-width: 100%;
}
</style>
