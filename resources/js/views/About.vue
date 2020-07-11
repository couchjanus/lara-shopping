<template>
  <default-layout>
    <template v-slot:default>
      <div class="about">
        <h1>This is an about page</h1>
      </div>
    </template>
  </default-layout>
</template>
<script>
// @ is an alias to /src
import DefaultLayout from "../components/layouts/DefaultLayout.vue";
export default {
  name: "About",
  components: {
    DefaultLayout
  }
};
</script>
