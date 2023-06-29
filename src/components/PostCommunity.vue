<template>
  <div class="container">
    <p class=" titleComponent fs fontBold">Postagens</p>
    <div class="jumbotron">
      <h3>{{ user }}</h3>
      <p>{{ truncatedText }}</p>
      <div v-if="showMoreButton || showLessButton" class="text-center">
        <a @click="toggleText" class="">{{ buttonText }}</a>
      </div>
  <hr class="my-4">
  <p>Ele usa classes utilitárias para tipografia e espaçamento de conteúdo, dentro do maior container.</p> 
  <iframe width="560px" height="315px" src="https://www.youtube.com/watch?v=-rvO9O-8D5s" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
  <a class="btn btn-primary btn-lg" role="button">comentarios</a>
</div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      user: "alef",
      text: "🔥 If you're tired of using outline styles for secondary buttons, a soft solid background based on the text color can be a great alternative.🔥 If you're tired of using outline styles for secondary buttons, a soft solid background based on the text color can be a great alternative.🔥 If you're tired of using outline styles for secondary buttons, a soft solid background based on the text color can be a great alternative.🔥 If you're tired of using outline styles for secondary buttons, a soft solid background based on the text color can be a great alternative.🔥 If you're tired of using outline styles for secondary buttons, a soft solid background based on the text color can be a great alternative.🔥 If you're tired of using outline styles for secondary buttons, a soft solid background based on the text color can be a great alternative.🔥 If you're tired of using outline styles for secondary buttons, a soft solid background based on the text color can be a great alternative.🔥 If you're tired of using outline styles for secondary buttons, a soft solid background based on the text color can be a great alternative.",
      maxCharacters: 100,
      showMore: false,
      showLess: false,
      additionalCharacters: 200
    };
  },
  computed: {
    truncatedText() {
      if (this.text.length > this.maxCharacters && !this.showMore) {
        return this.text.slice(0, this.maxCharacters) + "...";
      }
      return this.text;
    },
    showMoreButton() {
      return this.text.length > this.maxCharacters && !this.showMore && !this.showLess;
    },
    showLessButton() {
      return this.showLess;
    },
    buttonText() {
      return this.showMore ? "Show Less" : "Show More";
    }
  },
  methods: {
    addPost() {
      console.log("sss");
    },
    toggleText() {
      if (this.showMore) {
        this.maxCharacters = 100;
        this.showMore = false;
        this.showLess = false;
      } else {
        this.maxCharacters += this.additionalCharacters;
        if (this.maxCharacters >= this.text.length) {
          this.showMore = true;
          this.showLess = true;
        }
      }
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