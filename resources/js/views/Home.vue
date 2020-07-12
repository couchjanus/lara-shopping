<template>
  <default-layout>
    <template v-slot:slider>
    </template>

    <template v-slot:default>
      <Catalog></Catalog>
    </template>
  </default-layout>
</template>

<script>
// @ is an alias to /src
import DefaultLayout from "../components/layouts/DefaultLayout.vue";
import Catalog from "../components/catalog/Catalog.vue";
export default {
  name: "Home",
  components: {
    DefaultLayout,
    Catalog
  }
};
</script>
