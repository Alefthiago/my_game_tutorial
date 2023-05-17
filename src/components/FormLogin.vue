<template>
  <!-- Formulário de login -->
  <form @submit="login($event)">
    <div>
      <input type="email" v-model="email" required/>
      <!-- Campo de email -->
    </div>
    <div>
      <input type="password" v-model="password" required/>
      <!-- Campo de senha -->
    </div>
    <button>Logar</button>
    <!-- Botão de login -->
  </form>
  {{ email }} {{ password }}
  <!-- Exibição temporária dos valores de email e senha -->
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      email: "", // Variável para armazenar o valor do email inserido pelo usuário
      password: "", // Variável para armazenar o valor da senha inserida pelo usuário
    };
  },
  methods: {
    /**
     * Faz a requisição de autenticação ao servidor.
     *
     * @param {Event} e - Objeto de evento representando o envio do formulário.
     */
    login(e) {
      e.preventDefault(); // Impede o comportamento padrão de envio do formulário
      axios
        .post("http://localhost:9090/token/auth.php", {
          email: this.email, // Envia o valor do email para o servidor
          password: this.password, // Envia o valor da senha para o servidor
        })
        .then((response) => {
          let json = response.data;
          if (json.token) {
            // Se um token for retornado na resposta, armazena-o no localStorage
            localStorage.setItem("auth-token", json.token);
            this.$router.push("/perfil"); // Navega para a rota '/perfil'
          } else {
            alert("Dados inválidos!"); // Exibe um alerta se os dados forem inválidos
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
form {
  color: black;
}
</style>
