<template>
  <!-- Container principal -->
  <div class="container">
    <!-- Título da página -->
    <div class="titlePage">
      <p class="fs fontBold">Comunidade</p>
    </div>

    <!-- Formulário para adicionar post (visível apenas se o usuário estiver logado) -->
    <FormAddPost v-if="userLogin"/>

    <!-- Mensagem para convidar o usuário a fazer login -->
    <div v-else>
      <p>Para postar, faça o login <router-link to="/login">aqui</router-link></p>
    </div>

    <!-- Componente para exibir os posts da comunidade -->
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
    /**
     * Verifica se o usuário está logado
     * @returns {boolean} - True se o usuário estiver logado, False caso contrário
     */
    userLogin() {
      const user = localStorage.getItem('auth-token');
      return !!user; // Retorna true se user existir, caso contrário retorna false
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
