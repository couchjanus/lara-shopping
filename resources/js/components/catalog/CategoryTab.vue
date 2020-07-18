<template>
    <!--category-tab-->
    <div class="category-tab">
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li v-for="category in categories" :key="category.id" class="nav-item" :class="{ 'active': category.id === category_id }">
                    <a :href="`#Tab_00${category.id}`" data-toggle="tab"  @click="getCategoryId(category.id)"> {{ category.name }}</a>
                </li>
            </ul>
        </div>
        <tab-content :items='items' :category_id="category_id"></tab-content>
    </div>
    <!--/category-tab-->  
</template>

<script>

import TabContent from "./TabContent";
import {mapActions, mapGetters} from 'vuex';

export default {
  name: `CategoryTab`,
  data() {
    return {
      categories: [],
      items: [],
      category_id:1,
    };
  },
  components: {
    TabContent,
  },
  created() {
    this.GET_CATEGORIES_API()
      .then(() => {
        this.categories = this.CATEGORIES;
    });
  },
  mounted() {
    this.GET_PRODUCTS_BY_CATEGORY_API(this.category_id)
      .then(() => {
        this.items = this.PRODUCTS;
    });
  },
  computed: {
     ...mapGetters([
        'PRODUCTS',
        'CATEGORIES'
      ]),
  },
  methods: {
    getCategoryId(id){
      this.category_id=id;
      this.GET_PRODUCTS_BY_CATEGORY_API(this.category_id)
      .then(() => {
        this.items = this.PRODUCTS;
      });
    },
    ...mapActions([
        'GET_PRODUCTS_BY_CATEGORY_API',
        'GET_CATEGORIES_API'
    ]),
  }
};
</script>
