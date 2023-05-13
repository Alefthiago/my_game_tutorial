<template>
  <div id="app">
    <nav>
      <router-link to="/">Home</router-link> |
      <router-link to="/about">About</router-link>
    </nav>
    <button @click="api">csv</button>
    {{ dadosUser.nome }} {{ dadosUser.idade }}
    <router-view />
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      nome: "Alef",
      idade: 10,
      dadosUser: {}
    };
  },
  methods: {
    api() {
      axios
        .post("http://localhost:8080/api.php", {
          nome: this.nome,
          idade: this.idade,
        })
        .then((response) => {
          console.log(response.data);
          this.dadosUser = response.data;
        })
        .catch((error) => {
          console.error(error);
        });
    },
  }
};
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

nav {
  padding: 30px;
}

nav a {
  font-weight: bold;
  color: #2c3e50;
}

nav a.router-link-exact-active {
  color: #42b983;
}
</style>
