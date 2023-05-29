<template>
  <div class="container">
    <div class="titlePage">
      <p class="fs fontBold">Comunidade</p>
    </div>
    <FormAddPost v-if="userLogin" />
    <div>
      <p >Para postar faça o login <router-link to="/login">aqui</router-link></p>
    </div>
    <PostCommunity/>
  </div>
</template>

<script>
import FormAddPost from '@/components/FormAddPost.vue';
import PostCommunity from '@/components/PostCommunity.vue';
export default {
  components: {
    FormAddPost,
    PostCommunity
},
computed: {
  userLogin () {
    const user = localStorage.getItem('auth-token'); 
    if(user) {
      return true;
    } else {
      return false;
    }
   }
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
  font-size: 5rem;
  text-shadow: 5px 5px 10px black;
  border-bottom: 1px solid #A09B8C;
}
</style>