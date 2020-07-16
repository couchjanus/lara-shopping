<template>
  <default-layout>
    <template v-slot:slider>
      <Slider></Slider>
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
import Slider from "../components/shared/Slider.vue";
export default {
  name: "Home",
  components: {
    DefaultLayout,
    Catalog,
    Slider
  }
};
</script>
