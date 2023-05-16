<template>
  <!-- Componente de navegação -->
  <router-link to="/" :class="{'rota-atual': home}">Home</router-link> |
  <router-link to="/login" :class="{'rota-atual': login}">Login</router-link> |
  <router-link to="/tutorial" :class="{'rota-atual': tutorial}">Tutoriais</router-link> |
  <router-link to="/perfil" :class="{'rota-atual': perfil}">Perfil</router-link> |
  <router-link to="/course" :class="{'rota-atual': course}">Cursos</router-link>

</template>

<script>
export default {
  data() {
    return {
      home: false, // Variável para controlar o estado do link "Home"
      perfil: false, // Variável para controlar o estado do link "Perfil"
      login: false, // Variável para controlar o estado do link "Login"
      tutorial: false, // Variável para controlar o estado do link "tutorial"
      course: false, // Variável para controlar o estado do link "course"
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
        this.tutorial = false;
        this.course = false;
      } else if (this.rotaAtual === "/perfil") {
        this.home = false;
        this.perfil = true;
        this.login = false;
        this.tutorial = false;
        this.course = false;
      } else if (this.rotaAtual === "/login") {
        this.home = false;
        this.perfil = false;
        this.login = true;
        this.tutorial = false;
        this.course = false;
      } else if (this.rotaAtual === "/tutorial") {
        this.home = false;
        this.perfil = false;
        this.login = false;
        this.tutorial = true;
        this.course = false;
      } else if (this.rotaAtual === "/course") {
        this.home = false;
        this.perfil = false;
        this.login = false;
        this.tutorial = false;
        this.course = true;
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
