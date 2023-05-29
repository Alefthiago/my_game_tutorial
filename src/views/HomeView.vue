<template>
  <div class="home">
   <div class="container-title">
     <p class="fs fontBold">Notícias</p>
   </div> 
    
    <PostNews />
  </div>
</template>

<script>
import PostNews from "@/components/PostNews.vue";

export default {
  data() {
    return {
      root: false,
    };
  },
  components: {
    PostNews,
   // FormAddNews,
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
  mounted() {
    
  },
};
</script>

<style scoped>
.home {
  display: flex;
  flex-direction: column;
  align-items: center;
}
.container-title {
  width: 80vw;
  min-height: 100px;
  display: flex;
  padding: 50px;
  margin-left: 10vh;
  font-size: 5rem;
  text-shadow: 5px 5px 10px black;
  border-bottom: 1px solid #A09B8C;
}
</style>
