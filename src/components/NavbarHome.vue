<template>
  <!-- Componente de navegação -->
  <nav class="navbar navbar-expand-lg bg">
    <div class="container-fluid">
      <div class="logo">
        <router-link class="navbar-brand text-light fs-2 fontBold" to="/">My Game Tutorial</router-link>
      </div>

      <div style="width: 30%;">
        <div class="collapse navbar-collapse" id="navbarScroll">
          <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">

            <li class="nav-item">
              <router-link class="nav-link text-light fontItalic" to="/">Notícias</router-link>
            </li>

            <li class="nav-item">
              <router-link class="nav-link text-light fontItalic" to="/community">Comunidade</router-link>
            </li>

            <li @click="checkLoginOrUser" class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-light fontItalic" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Conta
              </a>

              <ul class="dropdown-menu dropdown-menu-dark">
                <div v-if="loginUser">
                  <router-link class="dropdown-item fontItalic" to="/perfil">Dados</router-link>
                  
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <a class="hover dropdown-item fontItalic" @click="logout">Sair</a>
                </div>
                <div v-else>
                  <router-link class="dropdown-item fontItalic" to="/login">Entrar</router-link>
                </div>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</template>
<script>
export default {
  data() {
    return {
      loginUser: false,
    }
  },
  methods: {
    logout() {
      localStorage.removeItem('auth-token');
      this.$router.push('/');
    },
    checkLoginOrUser() {
      let token = localStorage.getItem('auth-token');
      if (token) {
        this.loginUser = true;
      } else {
        this.loginUser = false;
      }
    }
  }
};

</script>
<style scoped>
.bg {
  background-color: #07001d;
  border-bottom: 1px solid #A09B8C;
}

.logo {
  font-size: 2rem;
  animation: loop-animation 2s infinite;
}
.hover:hover {
  cursor: pointer;
}
.navbar-brand:hover{
  text-shadow: 0 0 5px white;
}
.dropdown-menu {
 background-color: black;

}
</style>
