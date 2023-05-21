<template>
  <div class="container">
    <form @submit.prevent="register" class="border p-4  border rounded">
      <div class="mb-3">
        <label for="email" class="form-label fontBold">Email:</label>
        <input v-model="email" type="email" class="form-control fontItalic" id="email" placeholder="Email" required>
      </div>
      <div class="mb-3">
        <label for="name" class="form-label fontBold">Nome:</label>
        <input v-model="name" type="text" class="form-control fontItalic" id="name" placeholder="Nome" required>
      </div>
      <div class="mb-3">
        <label for="username" class="form-label fontBold">Usuário:</label>
        <input v-model="username" type="text" class="form-control fontItalic" id="username" placeholder="Usuário" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label fontBold">Senha:</label>
        <input v-model="password" type="password" class="form-control fontItalic" id="password" placeholder="Senha" required>
      </div>
      <div class="mb-3">
        <label for="confirmPassword" class="form-label fontBold">Confirmar Senha:</label>
        <input v-model="confirmPassword" type="password" class="form-control fontItalic" id="confirmPassword" placeholder="Confirmar Senha" required>
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
      username: '',
      password: '',
      confirmPassword: '',
      invalidData: false
    };
  },
  methods: {
    register() {
      // Valide os dados do formulário aqui antes de enviar para o servidor
      if (this.password !== this.confirmPassword) {
        this.invalidData = true;
        return;
      }
      // Envie os dados para o servidor ou execute a lógica de cadastro aqui
      // Exemplo de chamada API fictícia usando axios:
      axios.post('http://localhost:9090/user/addUser.php', {
        email: this.email.toLowerCase(),
        name: this.name.toLowerCase(),
        username: this.username.toLowerCase(),
        password: this.password.toLowerCase()
      })
      .then( () => {
        // Lógica após o cadastro bem-sucedido
        this.$router.push('/login');
      })
      .catch(error => {
        // Lógica em caso de erro no cadastro
        if (error.data == 409) {
          this.invalidData = true;
        }else {
          alert(error)
        }

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
}
</style>
