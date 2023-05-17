<template>
  <div>
    <div v-for="(item, index) in news" :key="item.title" class="news-item">
      <div class="news-title">{{ item.title }}</div>
      <div class="news-content">{{ item.content }}</div>
      <div class="news-author">{{ item.author }}</div>
      <div class="news-date">{{ item.date }}</div>
      <button v-if="root" @click="updateNews(index)">Editar</button>
      <button v-if="root" @click="deleteNews()">Excluir</button>
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
      .get("http://localhost:9090/newsCSV.php")
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
.news-item {
  height: 150px;
  width: 200px;
  background-color: red;
  margin-top: 4%;
  padding: 10px;
}

.news-title {
  font-weight: bold;
}

.news-content {
  margin-top: 10px;
}

.news-date {
  margin-top: 10px;
  font-size: 12px;
}

.news-author {
  margin-top: 10px;
  font-size: 12px;
  font-style: italic;
}

.id {
  visibility: hidden;
}
</style>
