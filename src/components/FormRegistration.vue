<template>
  <div class="container">
    <form @submit.prevent="register" class="border p-4  border rounded">
      <div class="mb-3">
        <label for="email" class="form-label fontBold">Email:</label>
        <input v-model="email" type="email" class="form-control fontItalic" id="email" placeholder="Email" required>
        {{ email }}
        <p v-if="invalidEmail">Email inválido!</p>
      </div>
      <div class="mb-3">
        <label for="name" class="form-label fontBold">Nome:</label>
        <input v-model="name" type="text" class="form-control fontItalic" id="name" placeholder="Nome" required>
        {{ name }}
      </div>
      <div class="mb-3">
        <label for="userName" class="form-label fontBold">Usuário:</label>
        <input v-model="userName" type="text" class="form-control fontItalic" id="userName" placeholder="Usuário"
          required>
        {{ userName }}
        <p v-if="invalidUser">Nome de Usuário inválido!</p>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label fontBold">Senha:</label>
        <input v-model="password" type="password" class="form-control fontItalic" id="password" placeholder="Senha"
          required>
      </div>
      <div class="mb-3">
        <label for="confirmPassword" class="form-label fontBold">Confirmar Senha:</label>
        <input v-model="confirmPassword" type="password" class="form-control fontItalic" id="confirmPassword"
          placeholder="Confirmar Senha" required>
        <p v-if="differentPasswords">As senha precisam ser iguais!</p>
      </div>
      <div v-if="invalidData" class="form-text text-danger fontBold">Dados inválidos!</div>
      <button type="submit" class="btn btn-secondary fontItalic">Cadastrar</button>
      <p class="fontBold">Já possui uma conta? <router-link to="/login">Faça login aqui</router-link></p>
    </form>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  data() {
    return {
      email: '',
      name: '',
      userName: '',
      password: '',
      confirmPassword: '',
      invalidEmail: false,
      invalidUser: false,
      differentPasswords: false,
    };
  },
  methods: {
    register() {
      // Valide os dados do formulário aqui antes de enviar para o servidor
      if (this.password !== this.confirmPassword) {
        this.invalidEmail = false;
        this.invalidUser = false;
        this.differentPasswords = true;
        return;
      }
      // Envie os dados para o servidor ou execute a lógica de cadastro aqui
      // Exemplo de chamada API fictícia usando axios:
      axios.post('http://localhost:9090/user/addUser.php', {
        email: this.email.toLowerCase(),
        name: this.name.toLowerCase(),
        userName: this.userName.toLowerCase(),
        password: this.password
      })
        .then((response) => {
          // Lógica após o cadastro bem-sucedido
          let json = response.data
          if (json.invalidEmail) {
            this.invalidEmail = true;
            this.invalidUser = false;
            this.differentPasswords = false;
          } else if (json.invalidUser) {
            this.invalidEmail = false;
            this.invalidUser = true;
            this.differentPasswords = false;
          } else {
            this.$router.push('/');
          }
        })
        .catch(error => {
          // Lógica em caso de erro no cadastro
          alert(error);
        });
    }
  }
};
</script>

<style scoped>
.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.form-text {
  margin-top: 5px;
}

form {
  background-color: #091428;
  box-shadow: 4px 3px 5px 2px black;
}</style>
