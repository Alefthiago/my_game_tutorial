<template>
  <div v-if="error" class="alert alert-danger" role="alert">
    {{ errorMessage }}
  </div>

  <div class="container dark-mode">
    <form @submit.prevent="login">
      <div class="form-group">
        <label class="fontBold">Usuário ou Email</label>
        <input v-model="emailOrUser" type="text" required>
      </div>
      <label class="fontBold">Senha</label>
      <div class="form-group">
        <input v-model="password" type="password" required>
      </div>
      <input type="submit" value="Enviar">
      <p class="fontBold"><router-link to="/registration">Faça seu cadastro aqui!</router-link></p>
    </form>
    <div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      error: false, // Variável para controlar se os dados são inválidos
      errorMessage: '',
      emailOrUser: '', // Variável para armazenar o valor do email ou usuário inserido pelo usuário
      password: '', // Variável para armazenar o valor da senha inserida pelo usuário
    };
  },
  methods: {
    /**
     * Faz a requisição de autenticação ao servidor.
     */
    login() {
      axios
        .post("http://localhost:9090/user/loginUser.php", {
          emailOrUser: this.emailOrUser.toLowerCase().trim(),
          password: this.password.trim(),
        })
        .then((response) => {
          let json = response.data;
          if (json.error) {
            this.error = true;
            this.errorMessage = json.error;
          }
          if (json.token) {
            localStorage.setItem('auth-token', json.token);
            this.$router.push('/community');
          }
        })
        .catch((error) => {
          this.error = true;
          this.errorMessage = error.response.data;
        });
    },
  },
};
</script>

<style scoped>
.container {
  margin: 0;
  padding: 20px;
  max-width: 30vw;
  height: 80vh;
  margin: 0 auto;
  background-image: linear-gradient(-45deg, #0f0f0fd8, #0f0f0f, #0f0f0f, #0f0f0f);
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 10);
}

.dark-mode {
  color: #fff;
}

.form-group {
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

input[type="text"],
input[type="password"],
textarea {
  width: 100%;
  padding: 10px;
  border: 1px solid #555;
  border-radius: 4px;
  box-sizing: border-box;
  background-color: #333;
  color: #fff;
}

input[type="submit"] {
  background-color: black;
  color: white;
  border: none;
  padding: 10px 20px;
  cursor: pointer;
  border-radius: 4px;
}

input[type="submit"]:hover {
  background-color: #252525;
}

.container {
  height: 50vh;
  margin-top: 20vh;
  display: flex;
  align-items: center;
  justify-content: center;
}
</style>
