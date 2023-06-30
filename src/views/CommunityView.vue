<template>
  <!-- Container principal -->
  <div class="container">
    <!-- Título da página -->
    <div class="titlePage">
      <p class="fs fontBold">Comunidade</p>
    </div>

    <!-- Formulário para adicionar post (visível apenas se o usuário estiver logado) -->
    <FormAddPost v-if="$store.state.userLogin"/>

    <!-- Mensagem para convidar o usuário a fazer login -->
    <div class="alertLogin" v-else>
      <p>Para postar, faça o login <router-link to="/login">aqui</router-link></p>
    </div>

    <!-- Componente para exibir os posts da comunidade -->
    <PostCommunity/>
    <img alt="">
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
  created () {
  this.$store.commit('checkLoginOrUser');
   
  },  
}
</script>

<style scoped>
.alertLogin{
  margin-top: 5vh;
}
.container {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.titlePage {
  width: 80vw;
  min-height: 100px;
  display: flex;
  font-size: 5rem;
  text-shadow: 5px 5px 10px black;
  border-bottom: 1px solid #A09B8C;
}
</style>
