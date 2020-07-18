import axios from "axios";

export default {
  GET_RECOMMENDED_PRODUCTS_API({commit}) {
    return axios
      .get(`http://127.0.0.1:8000/api/recommended`)
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
      .get(`http://127.0.0.1:8000/api/products/${id}`)
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
      .get(`http://127.0.0.1:8000/api/categories`)
      .then((categories) => {
        commit('SET_CATEGORIES_TO_STATE', categories.data.data);
        return categories;
      })
      .catch((error) => {
        console.log(error)
        return error;
      })
  }
}
