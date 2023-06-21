<template>
<div v-if="dataI" class="alert alert-danger" role="alert">
  Dados inválidos!
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
      dataI: false, // Variável para controlar se os dados são inválidos
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
        .post("http://localhost:9090/token/auth.php", {
          emailOrUser: this.emailOrUser.toLowerCase(),
          password: this.password,
        })
        .then((response) => {
          let json = response.data;
          if (json.token) {
            // Se um token for retornado na resposta, armazena-o no localStorage
            localStorage.setItem("auth-token", json.token);
            this.$router.push("/community"); // Navega para a rota '/community'
          } else {
            this.dataI = true; // Exibe um alerta se os dados forem inválidos
          }
        })
        .catch((error) => {
          console.log(error); // Exibe o erro no console, se ocorrer algum problema na requisição
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
  background-color: #0f0f0f;
}

.container {
  height: 50vh;
  margin-top: 20vh;
  display: flex;
  align-items: center;
  justify-content: center;
}
</style>
