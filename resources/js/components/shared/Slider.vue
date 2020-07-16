<template>
    <!--slider-->
    <section id="slider">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li v-for="index in slides.length" :key='index' @click="activeItem(index);"></li>
                        </ol>
                        <div class="carousel-inner" @mouseover="stopSlide()" @mouseout="startSlide()">
                           <SliderItem v-for="i in [currentIndex]" :key='i' :slide="currentSlide"></SliderItem>
                        </div>
                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev" @click="prev();">
                        <i class="fas fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next" @click="next();">
                        <i class="fas fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--/slider-->
</template>

<script>
import axios from "axios";
import SliderItem from "./SliderItem";

export default {
  name: 'Slider',
  components: {
    SliderItem,
  },
  data() {
    return {
        slides: [],
        timer: null,
        currentIndex: 0,
        }
    },

    mounted: function() {
        this.loadSliders();
        this.startSlide();
    },
  
    methods: {
      startSlide: function() {
            this.timer = setInterval(this.next, 4000);
      },
      stopSlide() {
        clearTimeout(this.timer);
        this.timer = null;
      },
      next: function() {
            this.currentIndex += 1
      },
      prev: function() {
            this.currentIndex -= 1
      },
      async loadSliders() {
        await axios
            .get(`http://127.0.0.1:8000/api/sliders`)
            .then((response) => {
            this.slides = response.data.data;
            });
      },
      activeItem: function (index) {
        this.currentIndex = index;
      },
    },
  
    computed: {
      currentSlide: function() {
        return this.slides[Math.abs(this.currentIndex) % this.slides.length];
      }
    }
  
}
</script>
