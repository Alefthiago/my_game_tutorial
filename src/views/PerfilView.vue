<template>
  <h1>Pefil</h1>
  <button @click="logout">Sair</button><br/>
  {{ token }}
</template>

<script>
export default {
  data() {
    return {
      // LUGAR PARA CRIAR VARIAVEIS
      token: localStorage.getItem('auth-token')
    };
  },
  created() {
    this.$authUser()
  },
  methods: {
    logout() {
      this.$logoutUser();
    },
  },
};
</script>

<style>

</style>
