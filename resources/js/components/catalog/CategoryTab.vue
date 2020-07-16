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
        <tab-content :products="products" :category="category_id"></tab-content>
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
      category_id:1,
    };
  },
  components: {
    TabContent,
  },
  created() {
    this.loadCategories();
    this.loadProducts(this.category_id);
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
    async loadProducts(id) {
      await axios
        .get(`http://127.0.0.1:8000/api/products/${id}`)
        .then((response) => {
          this.products = response.data.data;
        });
    },
    getCategoryId(id){
      this.category_id=id;
      //console.log(this.category_id);
      this.loadProducts(this.category_id);
    }
  }
};
</script>
