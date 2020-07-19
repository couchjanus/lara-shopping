import axios from "axios";

axios.defaults.baseURL = 'http://127.0.0.1:8000/api';

export default {
  GET_RECOMMENDED_PRODUCTS_API({commit}) {
    return axios
      .get(`/recommended`)
      .then((products) => {
        commit('SET_RETAILS_TO_STATE', products.data.data);
        return products;
      })
      .catch((error) => {
        console.log(error)
        return error;
      })
  },
  GET_PRODUCTS_BY_CATEGORY_API({commit}, id){
    return axios
      .get(`/products/${id}`)
      .then((products) => {
        commit('SET_PRODUCTS_TO_STATE', products.data.data);
        return products;
      })
      .catch((error) => {
        console.log(error)
        return error;
      })
  },
  GET_CATEGORIES_API({commit}){
    return axios
      .get(`/categories`)
      .then((categories) => {
        commit('SET_CATEGORIES_TO_STATE', categories.data.data);
        return categories;
      })
      .catch((error) => {
        console.log(error)
        return error;
      })
  },
  LOGIN ({ commit }, credentials) {
    return axios
      .post('/login', credentials)
      .then(({ data }) => {
        commit('SET_USER_DATA', data)
      })
  },

  LOGOUT ({ commit }) {
    commit('CLEAR_USER_DATA');
    
  },
  
  REGISTER({ commit }, data) {
    return axios.post("/register", data)
    .then(({ data }) => {
      commit('SET_REGISTER_DATA', data)
    })
  },
  AUTH({ commit }) {
    return axios.get("/user")
    .then(({ data }) => {
      commit('SET_AUTH_USER', data)
    })
  }
}
