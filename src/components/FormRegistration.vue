<template>
  <div v-if="error" class="alert alert-danger" role="alert">
    {{ errorMessage }}
  </div>

  <div class="container dark-mode">
    <form @submit.prevent="register">
      <div class="form-group">
        <label class="fontBold">Email</label>
        <input v-model="email" type="email" required>
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
      error: false,
      errorMessage: ''
    };
  },
  methods: {
    register() {
      if (this.email.trim() === '' || this.name.trim() === '' || this.userName.trim() === '' || this.password === '' || this.confirmPassword === '') {
        this.error = true;
        this.errorMessage = 'Dados inválidos!';
        return;
      }

      if (!/^[a-zA-Z]+$/.test(this.name)) {
        this.error = true;
        this.errorMessage = 'Nome deve conter penas letras!';
        return;
      }
      if (this.password !== this.confirmPassword) {
        this.error = true;
        this.errorMessage = 'As senhas devem ser iguais!';
        return;
      }
      axios
        .post('http://localhost:9090/user/addUser.php', {
          email: this.email.toLowerCase().trim(),
          name: this.name.toLowerCase().trim(),
          userName: this.userName.toLowerCase().trim(),
          password: this.password.trim()
        })
        .then((response) => {
          let json = response.data;
          if (json.error === "users.email_UNIQUE") {
            this.error = true;
            this.errorMessage = 'E-mail já cadastrado!';
            return;
          }
          if (json.error === "users.username_UNIQUE") {
            this.error = true;
            this.errorMessage = 'Nome de usuário já cadastrado!';
            return;
          }
          if (json.token) {
            localStorage.setItem("auth-token", json.token);
            this.$router.push("/community");
          }
        })
        .catch(error => {
          this.error = true;
          this.errorMessage = error.response.data;
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
  font-weight: bold;
  display: block;
  margin-bottom: 5px;
}

input[type="text"],
input[type="email"],
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
</style>
