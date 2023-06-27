<template>
  <div class="container">
    <h1 class="titlePage">Editar conta</h1>
    <div class="containerUserData">
      <ToAlterDataUser />
    </div>
  </div>
</template>

<script>
import ToAlterDataUser from '@/components/ToAlterDataUser.vue';
import axios from "axios";

export default {
  data() {
    return {
      token: localStorage.getItem('auth-token')
    }
  },
  components: {
    ToAlterDataUser,
  },
  mounted() {
    this.authUser();
  },
  methods: {
    authUser() {
      if (this.token) {
        axios
          .get('http://localhost:9090/auth/restricted.php', {
            headers: {
              Authentication: 'Bearer ' + this.token
            }
          })
          .then((response) => {
            let json = response.data;

            if (json.error) {
              this.$router.push('/login');
            }
          })
          .catch((error) => {
            localStorage.removeItem('auth-token');
            this.$router.push('/login');
            console.log(error);
          })
      } else {
        this.$router.push('/login');
      }
    }
  }
};
</script>

<style scoped>
.container {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.containerUserData {
  width: 100%;
  display: flex;
  flex-direction: row;
  justify-content: flex-start;
  align-items: flex-start;
}

.titlePage {
  width: 80vw;
  min-height: 100px;
  display: flex;
  padding: 50px;
  font-size: 3rem;
  text-shadow: 5px 5px 10px black;
  border-bottom: 1px solid #A09B8C;
}

.div-ModalT {
  background-color: black;
  width: 100%;
  height: 100%;
}
</style>
