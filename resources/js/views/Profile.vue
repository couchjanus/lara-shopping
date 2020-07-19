<template>
  <default-layout>
    <template v-slot:default>
      <div class="profile">
        <h1>This is Your Profile page</h1>
         <h3>Hello, {{ user.name }}</h3>
         <span>{{ user.email }}</span>
      </div>
    </template>
  </default-layout>
</template>
<script>
// @ is an alias to /src
import DefaultLayout from "../components/layouts/DefaultLayout.vue";
import {mapActions, mapGetters} from 'vuex';

export default {
  name: "Profile",
  components: {
    DefaultLayout
  },
  data() {
    return {
      user: {
        type: Object,
        default() {
          return {}
        }
      }
    };
  },
  mounted() {
    this.AUTH().then(() => {
      this.user = this.USER;
    });
  },
  computed: {
     ...mapGetters([
        'USER',
      ]),
  },
  methods: {
    ...mapActions([
        'AUTH',
    ]),
  }
};
</script>
