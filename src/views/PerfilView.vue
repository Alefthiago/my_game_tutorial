<template>
  <div class="container">
    <h1 class="titlePage">Alterar dados</h1>
    <ToAlterDataUser />
  </div>
</template>

<script>
import ToAlterDataUser from '@/components/ToAlterDataUser.vue';
export default {
  data() {
    return {
      // LUGAR PARA CRIAR VARIAVEIS
      token: localStorage.getItem('auth-token')
    };
  },
  created() {
    this.$authUser();
    
  },
  methods: {
  },
  components: {
    ToAlterDataUser
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
}
.titlePage {
  width: 80vw;
  min-height: 100px;
  display: flex;
  padding: 50px;
  font-size: 3rem;
  text-shadow: 5px 5px 10px black;
  border-bottom: 1px solid #A09B8C;
}
</style>
