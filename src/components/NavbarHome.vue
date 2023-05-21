<template>
  <!-- Componente de navegação -->
  <nav class="navbar navbar-expand-lg bg">
    <div class="container-fluid">
      <div class="logo">
        <router-link class="navbar-brand text-light fs-2 fontHeavy" to="/">My
          Game Tutorial</router-link>
      </div>

      <div style="width: 25%;">
        <div class="collapse navbar-collapse" id="navbarScroll">
          <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">

            <li class="nav-item">
              <router-link class="nav-link text-light fontItalic" to="/">Notícias</router-link>
            </li>

            <li class="nav-link">
              <router-link class="dropdown-item text-light fontItalic" to="/community">Comunidade</router-link>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-light fontItalic" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Conta
              </a>

              <ul class="dropdown-menu dropdown-menu-dark">
                <!--<div v-if="$login">-->
                <router-link class="dropdown-item fontItalic" to="/login">Entrar</router-link>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <router-link class="dropdown-item fontItalic" to="/perfil">Alterar dados</router-link>
                <!--</div>-->
                <!---<div v-if="!$login">-->
                <li>
                  <hr class="dropdown-divider">
                </li>
                <a class="dropdown-item fontItalic" @click="logout">Sair</a>
                <!--</div>-->
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

    };
  },
  computed: {
    rotaAtual() {
      // Retorna o "fullPath" da rota atual como uma string
      return this.$router.currentRoute.value.fullPath;
    },
  },
  methods: {
    logout() {
      this.$login = false;
      console.log(this.$login);
    },
    // this.$logoutUser();
  }
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
