<template>
  <div class="container">
    <form @submit.prevent="login" class="border p-4 border-2 rounded">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label fontBold">Email:</label>
        <input v-model="emailOrUser" type="text" class="form-control fontItalic" id="exampleInputEmail1"
          aria-describedby="emailHelp" placeholder="Email ou Usuário" required>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label fontBold">Senha:</label>
        <input v-model="password" type="password" class="form-control fontItalic" id="exampleInputPassword1"
          placeholder="Senha" required>
        <div v-if="dataI" id="emailHelp" class="form-text text-danger fontBold">Dados invalidos!</div>
      </div>
      <button class="btn btn-secondary fontItalic">Criar</button>
      <p><router-link to="/registration" class="fontBold">Faça cadastro aqui</router-link></p>
    </form>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      dataI: false,
      emailOrUser: '', // Variável para armazenar o valor do email inserido pelo usuário
      password: '', // Variável para armazenar o valor da senha inserida pelo usuário
    };
  },
  methods: {
    /**
     * Faz a requisição de autenticação ao servidor.
     *
     * @param {Event} e - Objeto de evento representando o envio do formulário.
     */
    login() {
      axios
        .post("http://localhost:9090/token/auth.php", {
          emailOrUser: this.emailOrUser.toLowerCase(),
          password: this.password.toLowerCase(),
        })
        .then((response) => {

          let json = response.data;
          console.log(json);
          if (json.token) {
            // Se um token for retornado na resposta, armazena-o no localStorage
            localStorage.setItem("auth-token", json.token);
            this.$router.push("/commuity"); // Navega para a rota '/perfil'
          } else {
            this.dataI = true; // Exibe um alerta se os dados forem inválidos
          }
        })
        .catch((error) => {
          console.log(error); // Exibe o erro no cdonsole, se ocorrer algum problema na requisição
        });
    },
  },
};
</script>

<style scoped>
form {
  width: 300px;
  height: 300px;
  background-color: #091428;
  box-shadow: 4px 3px 5px 2px black;
}

.container {
  height: 85vh;
  display: flex;
  align-items: center;
  justify-content: center;
}
</style>
