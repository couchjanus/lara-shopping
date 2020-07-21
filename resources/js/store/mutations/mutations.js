import axios from "axios";

export default {
  SET_PRODUCTS_TO_STATE: (state, products) => {
    state.products = products;
  },
  SET_CATEGORIES_TO_STATE: (state, categories) => {
    state.categories = categories;
  },

  SET_RETAILS_TO_STATE: (state, retails) => {
    state.retails = retails;
  },

  SET_CART: (state, product) => {
    let isProductExists = false;
    if (state.cart.length) {
      state.cart.map(function (item) {
        if (item.id === product.id) {
          isProductExists = true;
          item.quantity++
        }
      })
      if (!isProductExists) {
        state.cart.push(product)
      }
    } else {
      state.cart.push(product)
    }
  },
    REMOVE_FROM_CART: (state, index) => {
        state.cart.splice(index, 1);
    },
    INCREMENT: (state, index) => {
        state.cart[index].quantity++
    },
    DECREMENT: (state, index) => {
        if (state.cart[index].quantity > 1) {
            state.cart[index].quantity--
        }
    },

  SET_USER_DATA (state, userData) {
    state.user = userData
    localStorage.setItem('user', JSON.stringify(userData))
    axios.defaults.headers.common.Authorization = `Bearer ${userData.token}`
  },

  SET_REGISTER_DATA (state, userData) {
    state.user = userData;
    axios.defaults.headers.common.Authorization = `Bearer ${userData.token}`;
  },

  CLEAR_USER_DATA () {
    localStorage.removeItem('user');
    location.href = '/';
    // location.reload()
  },
  SET_AUTH_USER(state, user) {
    state.user = user;
  }
}
