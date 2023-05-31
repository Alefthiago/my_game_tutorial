import { createStore } from 'vuex';

export default createStore({
  state: {
    userLogin: false,
  },
  mutations: {
    checkLoginOrUser(state) {
      let token = localStorage.getItem('auth-token');
      if (token) {
        state.userLogin = true;
      } else {
        state.userLogin = false;
      }
    }
  },
  actions: {
  },
  modules: {
  }
});
