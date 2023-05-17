<template>
  <div id="app">
    <Navbar />
    <RouterView />
  </div>
</template>

<script>
import Navbar from "@/components/NavbarHome.vue";
export default {
  data() {
    return {
      // LUGAR PARA CRIAR VARIAVEIS
    };
  },
  components: {    
    Navbar
  },
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
