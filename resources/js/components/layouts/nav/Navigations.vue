<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Shopping Center</a>
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <router-link class="nav-link" to="/">Home <span class="sr-only">(current)</span></router-link>
        </li>
        <li class="nav-item">
          <router-link class="nav-link" to="/about">About</router-link>
        </li>
        <li class="nav-item">
          <router-link class="nav-link" to="/catalog">Catalog</router-link>
        </li>
      </ul>


      <Search></Search>
      
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <router-link class="nav-link" to="/profile" v-if="IS_LOGGED">Profile</router-link>
                <router-link class="nav-link" to="/signin" v-else>Login</router-link>
            </li>
            <li class="nav-item">
                <router-link v-if="!IS_LOGGED" class="nav-item nav-link" :to="{ name: 'Register' }">Register</router-link>
            </li>
            <li class="nav-item">
                <button class="nav-link" @click="logout()" v-if="IS_LOGGED">Logout</button>
            </li>

            <li class="nav-item dropdown">
              <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
              >
                  Dropdown
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
              </div>
          </li>
          <li class="nav-item">
              <Cart></Cart>
          </li>
      </ul>
    </div>
  </nav>
</template>

<script>
import { mapGetters } from 'vuex';
import Cart from "../../cart/Cart";
import Search from "../../search/Search";

export default {
    name: `Navigations`,
    components: {
        Cart,
        Search
    },
    computed: {
        ...mapGetters([
            // 'CART',
            'IS_LOGGED'
        ])
    },

    methods: {
        logout () {
          this.$store.dispatch('LOGOUT')
        }
    }
};
</script>
