<template>
  <div class="container dark-mode">
    <form @submit.prevent="login">
      <div class="form-group">
        <label class="fontBold">Email</label>
        <input v-model="email" type="text" required>
      </div>

      <div class="form-group">
        <label class="fontBold">Nome</label>
        <input v-model="name" type="text" required>
      </div>

      <div class="form-group">
        <label class="fontBold">Usuário</label>
        <input v-model="userName" type="text" required>
      </div>

      <div class="form-group">
        <label class="fontBold">Senha</label>
        <input v-model="password" type="password" required>
      </div>

      <div class="form-group">
        <label class="fontBold">Confirmar Senha</label>
        <input v-model="confirmPassword" type="password" required>
      </div>
      <input type="submit" value="Criar">
      <p class="fontBold">Já possui uma conta? <router-link to="/login">Faça login aqui</router-link></p>
    </form>
    <div>
    </div>
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
  height: 70vh;
  margin-top: 10vh;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
  max-width: 30vw;
  background-image: linear-gradient(-45deg,  #5e6bd35e,#1e163f54, #1e163faf, #1e163fb7, #1e163fd5, #1e163fd5, #1c0549b9);
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
  font-weight: bold;
  display: block;
  margin-bottom: 5px;
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
  background-color: #444444;
}
</style>
