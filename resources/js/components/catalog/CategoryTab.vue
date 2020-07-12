<template>
    <!--category-tab-->
    <div class="category-tab">
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li v-for="category in categories" :key="category.id" class="nav-item">
                    <a :href="`#Tab_00${category.id}`" data-toggle="tab"> {{ category.name }}</a>
                </li>
            </ul>
        </div>
        <tab-content :products="products"></tab-content>
    </div>
    <!--/category-tab-->  
</template>

<script>
import axios from "axios";
import TabContent from "./TabContent";

export default {
  name: `CategoryTab`,
  data() {
    return {
      categories: [],
      products: [],
    };
  },
  components: {
    TabContent,
  },
  created() {
    this.loadCategories();
    this.loadProducts();
  },
  methods: {
    async loadCategories() {
      await axios.get(
        `http://127.0.0.1:8000/api/categories`
      )
        .then(response => {
            this.categories = response.data.data;
          })
    },
    async loadProducts() {
      await axios
        .get(`http://127.0.0.1:8000/api/products`)
        .then((response) => {
          this.products = response.data.data;
        });
    },
  }
};
</script>
