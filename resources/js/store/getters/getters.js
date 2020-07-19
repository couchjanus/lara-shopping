export default  {
  PRODUCTS(state) {
    return state.products;
  },
  CATEGORIES(state) {
    return state.categories;
  },
  RETAILS(state) {
    return state.retails;
  },
  CART(state) {
    return state.cart;
  },
  USER(state) {
    return state.user;
  },
  
  IS_LOGGED: state => !!state.user
}
