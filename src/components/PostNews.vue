<template>
  <form class="d-flex" role="search">
    <input class="form-control me-2 fontItalic" type="search" placeholder="Pesquisar" aria-label="Search"
      v-model="searchQuery">
  </form>

  <div class="container">
    <div v-for="item in filteredNews" :key="item.title" class="card" style="width: 18rem;">
      <div class="image-container">
        <img :src="item.img" class="card-img-top">
      </div>
      <div class="card-body">
        <h5 class="card-title text-light fontItalic">{{ item.title }}</h5>
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
      searchQuery: '', // Propriedade para armazenar a pesquisa
    };
  },
  computed: {
    filteredNews() {
      const searchQuery = this.searchQuery.toLowerCase().trim();
      return this.news.filter(item => {
        const game = item.game.toLowerCase();
        return game.includes(searchQuery);
      });
    },
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
  },
};
</script>

<style scoped>
.btn {
  background-color: black;
  border: 0px;
}

.container {
  margin-bottom: 20px;
  padding: 5px;
  border-radius: 10px;
  display: flex;
  flex-direction: row;
  justify-content: space-around;
  flex-wrap: wrap;
}

.card {
  margin-top: 50px;
  box-shadow: 4px 5px 5px black;
  background-image: linear-gradient(to top, #110141, #120626, #11013b);
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

.image-container {
  width: 100%;
  height: 0;
  padding-bottom: 75%;
  /* Proporção de aspecto 4:3 (75% = 3/4) */
  position: relative;
}

.image-container img {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
}</style>