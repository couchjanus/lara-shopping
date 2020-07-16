<template>
  <div class="item row item_slide">
    <div class="col-6">
      <h1><span>SHOP</span>CENTER</h1>
      <h2>{{slide.name}}</h2>
      <p>
        {{slide.description}}
      </p>
      <button type="button" class="btn btn-default get">Get it now</button>
    </div>
    <div class="col-6">
      <img
        :src="slide.cover"
        class="cover img-responsive"
        :alt="slide.name"
      />
    </div>
</div>
</template>

<script>
export default {
  name: `SliderItem`,
  data() {
    return {};
  },
    props: {
      slide: {
        type: Object,
        default() {
          return {};
        },
      },
    },
};
</script>
