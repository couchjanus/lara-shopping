<template>
    <div class="cart">
        <span class="cart-size" @click="showCart = !showCart">{{CART.length}}</span><i class="fa fa-shopping-cart" @click="showCart = !showCart"></i>

        <div class="cart-items" v-show="showCart">
            <h1>Your Cart</h1>
            <p v-if="!CART.length">There are no products in cart...</p>
            <CartItem
                v-else
                v-for="(item, index) in CART"
                :key="index"
                :item="item"
             @deleteFromCart="deleteFromCart(index)"
             @increment="increment(index)"
             @decrement="decrement(index)"
            >

            </CartItem>
            <h4 class="cartSubTotal">Total: &dollar;{{cartTotalCost | toFix | formattedPrice}}</h4>
            <button class="clearCart">Clear Cart</button>
            <button class="checkoutCart">Checkout</button>
        </div>
    </div>

</template>

<script>
    import CartItem from "./CartItem";
    import toFix from "../../filters/toFix";
    import formattedPrice from "../../filters/price-format";
    import {mapActions, mapGetters} from "vuex";

    export default {
        name: "Cart",
        components: {
            CartItem,
        },
        filters: {
            formattedPrice,
            toFix
        },
        data() {
            return {
                showCart: false,
                cart_data: {
                    type: Array,
                    default() {
                        return []
                    }
                }
            }
        },

        // props: {
        //     cart_data: {
        //         type: Array,
        //         default() {
        //             return []
        //         }
        //     }
        // },
        computed: {
            cartTotalCost() {
                let result = []

                if (this.CART.length) {
                    for (let item of this.CART) {
                        result.push(item.price * item.quantity)
                    }

                    result = result.reduce(function (sum, el) {
                        return sum + el;
                    })
                    return result;
                } else {
                    return 0
                }
            },
            ...mapGetters([
                'CART',
            ])
        },
        mounted() {
            // this.$set(this.product_data, 'quantity', 1);
            this.cart_data = this.CART;

        },
        methods: {
            ...mapActions([
                'DELETE_FROM_CART',
                'INCREMENT_CART_ITEM',
                'DECREMENT_CART_ITEM'
            ]),
            increment(index) {
                // console.log("Increment Cart Data: ", index);
                this.INCREMENT_CART_ITEM(index)
            },
            decrement(index) {
                this.DECREMENT_CART_ITEM(index)
            },
            deleteFromCart(index) {
                this.DELETE_FROM_CART(index);
            }
        }
    }
</script>
