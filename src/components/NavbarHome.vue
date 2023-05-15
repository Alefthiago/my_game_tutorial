<template>
  <!-- Componente de navegação -->
  <router-link to="/" :class="{'rota-atual': home}">Home</router-link> |
  <router-link to="/login" :class="{'rota-atual': login}">Login</router-link> |
  <router-link to="/games" :class="{'rota-atual': jogos}">Jogos</router-link> |
  <router-link to="/perfil" :class="{'rota-atual': perfil}">Perfil</router-link>
</template>

<script>
export default {
  data() {
    return {
      home: false, // Variável para controlar o estado do link "Home"
      perfil: false, // Variável para controlar o estado do link "Perfil"
      login: false, // Variável para controlar o estado do link "Login"
      jogos: false, // Variável para controlar o estado do link "Jogos"
    };
  },
  watch: {
    $route() {
      // Função executada sempre que a rota for alterada

      // Atualiza os estados dos links com base na rota atual
      if (this.rotaAtual === "/") {
        this.home = true;
        this.perfil = false;
        this.login = false;
        this.jogos = false;
      } else if (this.rotaAtual === "/perfil") {
        this.home = false;
        this.perfil = true;
        this.login = false;
        this.jogos = false;
      } else if (this.rotaAtual === "/login") {
        this.home = false;
        this.perfil = false;
        this.login = true;
        this.jogos = false;
      } else if (this.rotaAtual === "/games") {
        this.home = false;
        this.perfil = false;
        this.login = false;
        this.jogos = true;
      }
    },
  },
  computed: {
    rotaAtual() { 
      // Retorna o "fullPath" da rota atual como uma string
      return this.$router.currentRoute.value.fullPath;
    },
  },
};
</script>

<style>
.local-atual {
  color: red;
}
</style>
