<template>
  <h1>Pefil</h1>
  <button @click="logout">Sair</button>
</template>

<script>
export default {
  data() {
    return {
      // LUGAR PARA CRIAR VARIAVEIS
    };
  },
  created() {
    this.$authUser();
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
