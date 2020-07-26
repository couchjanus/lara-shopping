<template>
    <form class="form-inline my-2 my-lg-0">
        <input
          class="form-control mr-sm-2"
          type="search"
          placeholder="Search"
          aria-label="Search"
          name="query"
        />
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
          Search
        </button>
    </form>
</template>

<script>
    // import {mapActions, mapGetters} from "vuex";

    export default {
        name: "Search",
        data() {
            return {
                search_result: {
                    type: Array,
                    default() {
                        return []
                    }
                }
            }
        },

        computed: {
            // cartTotalCost() {
            //     let result = []

            //     if (this.CART.length) {
            //         for (let item of this.CART) {
            //             result.push(item.price * item.quantity)
            //         }

            //         result = result.reduce(function (sum, el) {
            //             return sum + el;
            //         })
            //         return result;
            //     } else {
            //         return 0
            //     }
            // },
            // ...mapGetters([
            //     'CART',
            // ])
        },
        mounted() {
            // this.$set(this.product_data, 'quantity', 1);
            // this.cart_data = this.CART;

        },
        methods: {
            // ...mapActions([
            //     'DELETE_FROM_CART',
            //     'INCREMENT_CART_ITEM',
            //     'DECREMENT_CART_ITEM'
            // ]),
            // increment(index) {
            //     // console.log("Increment Cart Data: ", index);
            //     this.INCREMENT_CART_ITEM(index)
            // },
            // decrement(index) {
            //     this.DECREMENT_CART_ITEM(index)
            // },
            // deleteFromCart(index) {
            //     this.DELETE_FROM_CART(index);
            // }
        }
    }
</script>
