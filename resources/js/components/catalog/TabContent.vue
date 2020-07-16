<template>
  <!--tab-content-->
  <div class="tab-content">
    <div class="tab-pane fade active in show" :id="`Tab_00${category}`">
      
      <div class="row pb-2">
        <SingleProduct
          v-for="product in displayedProducts"
          :key="product.id"
          :product_data="product"
        >
        </SingleProduct>
      </div>
      
      <!-- <Pagination :total_pages="11" :total="113" :per_page="10" :current_page="currentPage" /> -->
      
      <nav aria-label="Page navigation">
        <ul class="pagination">
          <li class="page-item"><a class="page-link" v-if="page > 1" @click="page--">Previous</a></li>
          <li class="page-item"><a class="page-link" v-for="pageNumber in pages.slice(page-1, page+5)" :key="pageNumber"
              @click="page = pageNumber">{{pageNumber}}</a></li>
          <li class="page-item"><a class="page-link" v-if="page < pages.length" @click="page++">Next</a></li>
        </ul>
      </nav>
      
    </div>
  </div>
  <!--/tab-content-->
</template>

<script>
import SingleProduct from "./SingleProduct";
// import Pagination from "../shared/Pagination";
export default {
  name: `TabContent`,

  props: {
      products: null,
      category:null
  },
  components: {
    SingleProduct,
    // Pagination
  },
  data() {
    return {
      page: 1,
      perPage: 4,
      currentPage: 1,
      pageCount: 0,
      pages: []
    };
  },
  methods: {
    setPages() {
      this.pages = [];
      this.page = 1;
      let numberOfPages = Math.ceil(this.products.length / this.perPage);
      for (let index = 1; index <= numberOfPages; index++) {
        this.pages.push(index);
      }
    },
    paginate(products) {
      let page = this.page;
      let perPage = this.perPage;
      let from = page * perPage - perPage;
      let to = page * perPage;
      return products.slice(from, to);
    },

  },
  computed: {
    displayedProducts() {
      return this.paginate(this.products);
    }
  },
  watch: {
    products() {
      this.setPages();
    }
  },
};

</script>
