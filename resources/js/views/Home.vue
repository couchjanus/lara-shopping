<template>
  <default-layout>
    <template v-slot:slider>
    </template>

    <template v-slot:default>
      Home Page
    </template>
  </default-layout>
</template>

<script>
// @ is an alias to /src
import DefaultLayout from "../components/layouts/DefaultLayout.vue";
export default {
  name: "Home",
  components: {
    DefaultLayout,
  }
};
</script>
