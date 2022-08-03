
import { createStore } from 'vuex'


const auth = window.authUser ? window.authUser : null;

const store = createStore({
  state() {
    return {
        authUser  : auth,
    }
  },

  getters: {
    getAuthUser(state) {
      return state.authUser;
    }
  },

  mutations: {
    setAuthUser(state, data) {
       state.authUser = data;
    }
  }

})

export default store;
