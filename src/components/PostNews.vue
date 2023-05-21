<template>
  <form class="d-flex" role="search">
    <input class="form-control me-2 fontItalic" type="search" placeholder="Pesquisar" aria-label="Search">
    <button class="btn btn-secondary fontItalic" type="submit">Pesquisar</button>
  </form>

  <div class="container ">
    <div v-for="item, in news" :key="item.title" class="card " style="width: 18rem;">
      <img :src="item.img" class="card-img-top" alt="...">
      <div class="card-body">
        <p class="card-text text-light"> {{ item.game }}</p>
        <h5 class="card-title text-light">{{ item.title }}</h5>
        <a :href="item.link" class="btn btn-secondary fontItalic" target="_blank">Ler mais</a>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      news: [],
      root: false,
    };
  },
  methods: {
    updateNews(index) {
      this.$router.push({
        name: 'updateNews',
        query: {
          title: this.news[index].title,
          content: this.news[index].content,
          author: this.news[index].author,
          id: this.news[index].id
        }
      });
    },
    deleteNews() {
      this.$forceUpdate();
    }
  },
  created() {
    axios
      .get("http://localhost:9090/news/news.php")
      .then((response) => {
        this.news = response.data;
      })
      .catch((error) => {
        console.log(error);
      });
    this.$getUserType()
      .then((response) => {
        if (response.data === "admin") {
          this.root = true;
        }
      })
      .catch((error) => {
        console.log(error);
      });
  },
};
</script>

<style scoped>
.container {
  margin-bottom: 5%;
  padding: 2%;
  border-radius: 10px;
  display: flex;
  justify-content: space-around;
  flex-wrap: wrap;
}

.card {
  margin-top: 5%;
  box-shadow: 4px 5px 5px 5px black;
  background-image: linear-gradient(to top, #091428, #0A1428)
}

.card:hover {
  transform: scale(1.05);
  /* Aumenta um pouco o tamanho do card */
  box-shadow: 0 0 0;
  /* Adiciona uma sombra leve */
  border: 2px solid white;
}

p {
  font-family: 'fontItalic', sans-serif;
}

h5 {
  font-family: 'fontRiot', sans-serif;
}

form {
  margin-top: 2%;
}
</style>
