<template>
  <div class="home">
    <FormAddNews v-if="root" />
    <h1>Noticias</h1>
    <PostNews />
  </div>
</template>

<script>
import PostNews from "@/components/PostNews.vue";
import FormAddNews from "@/components/FormAddNews.vue";

export default {
  data() {
    return {
      root: false,
    };
  },
  components: {
    PostNews,
    FormAddNews,
  },
  created() {
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
  mounted() {},
};
</script>

<style scoped>
.home {
  display: flex;
  flex-direction: column;
  background-color: green;
  align-items: center;
}
</style>
