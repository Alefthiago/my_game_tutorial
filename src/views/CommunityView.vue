<template>
  <div class="container">
    <div class="titleComponent">
      <p class="fs fontBold">Comunidade</p>
    </div>
    <FormAddPost />
    <PostCommunity/>
  </div>
</template>

<script>
import FormAddPost from '@/components/FormAddPost.vue';
import PostCommunity from '@/components/PostCommunity.vue';
export default {
  created() {
    this.$authUser();
  },
  components: {
    FormAddPost,
    PostCommunity
}
}
</script>

<style scoped>
.container {
  display: flex;
  flex-direction: column;
  align-items: center;
}
.titlePage {
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