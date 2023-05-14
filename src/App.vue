<template>
  <div id="app">
    <Navbar />

    <RouterView />
  </div>
</template>

<script>
import axios from "axios";
import Navbar from "@/components/NavbarHome.vue";
export default {
  data() {
    return {
      alunos: ["alef", "anderson", "emily"],
    };
  },
  methods: {
    api() {
      axios
        .post("http://localhost:8080/api.php", {
          
        })
        .then((response) => {
          console.log(response);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  components: {
    Navbar
  },
  created () {

  }
};
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: black;
}
</style>
