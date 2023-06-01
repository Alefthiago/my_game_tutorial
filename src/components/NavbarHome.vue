<template>
  <!-- Componente de navegação -->
  <nav class="navbar navbar-expand-lg bg">
    <div class="container-fluid">
      <div class="logo">
        <router-link class="navbar-brand text-light fs-2 fontHeavy" to="/">My Game Tutorial</router-link>
      </div>

      <div style="width: 30%;">
        <div class="collapse navbar-collapse" id="navbarScroll">
          <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">

            <!-- Link para a página de Notícias -->
            <li class="nav-item">
              <router-link class="nav-link text-light fontItalic" to="/">Notícias</router-link>
            </li>

            <!-- Link para a página de Comunidade -->
            <li class="nav-item">
              <router-link class="nav-link text-light fontItalic" to="/community">Comunidade</router-link>
            </li>

            <!-- Dropdown para a conta do usuário -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-light fontItalic" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Conta
              </a>

              <ul class="dropdown-menu dropdown-menu-dark">
                <div v-if="$store.state.userLogin">
                  <!-- Link para a página de Alterar Dados -->
                  <router-link class="dropdown-item fontItalic" to="/perfil">Alterar dados</router-link>
                  
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <!-- Opção para fazer logout -->
                  <a class="hover dropdown-item fontItalic" @click="logout">Sair</a>
                </div>
                <div v-else>
                  <!-- Link para a página de Login -->
                  <router-link class="dropdown-item fontItalic" to="/login">Entrar</router-link>
  
                  <!-- Se o usuário estiver logado, exibir opções adicionais -->
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
  methods: {
    logout() {
      localStorage.removeItem('auth-token');
      this.$router.push('/');
    },
  },
};
</script>
<style scoped>
.bg {
  background-image: linear-gradient(to right, #091428, #0A1428);
  border-bottom: 1px solid #A09B8C;
}

.logo {
  font-size: 2rem;
  animation: loop-animation 2s infinite;
}
.hover:hover {
  cursor: pointer;
}
@keyframes loop-animation {
  0% {
    text-shadow: 0 0 0;
  }
  20% {
    text-shadow: 0 0 2px;
  }
  40% {
    text-shadow: 0 0 5px;
  }
  60% {
    text-shadow: 0 0 2px;
  }
  100% {
    text-shadow: 0 0 0px;
  }
}

</style>
