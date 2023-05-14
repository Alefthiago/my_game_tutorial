<template>
  <form @submit="login($event)">
    <div>
      <input type="email" v-model="email" />
    </div>
    <div>
      <input type="password" v-model="senha" />
    </div>
    <button>Logar</button>
  </form>
  {{ email }} {{ senha }}
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      email: "",
      senha: "",
    };
  },
  methods: {
    login(e) {
      e.preventDefault();
      axios
        .post("http://localhost:8080/auth.php", {
          email: this.email,
          senha: this.senha
        })
        .then((response) => {
          let json = response.data;  
          if (json.token) {
              localStorage.setItem("auth-token", json.token);
              this.$router.push("/perfil");
          } else {
            alert("Dados invalidos!")
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },


  },
};
</script>

<style scoped>
form {
  color: black;
}
</style>
