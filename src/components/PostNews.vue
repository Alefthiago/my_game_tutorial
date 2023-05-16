<template>
  <div>
    <div v-for="(item, index) in news" :key="item.title" class="news-item">
      <div class="news-title">{{ item.title }}</div>
      <div class="news-content">{{ item.content }}</div>
      <div class="news-date">{{ item.date }}</div>
      <div class="news-author">{{ item.author }}</div>
      <button v-if="root" @click="updateNews(index)">Editar</button>
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

      updateNews (index) {
      let token = localStorage.getItem('auth-token');
      axios
          .post('http://localhost:9090/updateNews.php', {
            title: this.news[index].title,
            content: this.news[index].content,
            date: this.news[index].date,
            author: this.news[index].author,
            id: this.news[index].id,
            token: token
          })
          .catch((error) => {
            console.log(error);
          })
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
