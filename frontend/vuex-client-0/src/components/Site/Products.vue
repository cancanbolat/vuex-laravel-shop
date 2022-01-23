<script>
import Product from "./Product.vue";
import { mapGetters } from "vuex";
import { FETCH_PRODUCTS, PRODUCTS } from "../../store/constants/productConstants";

export default {
  components: {
    Product,
  },
  computed: {
    ...mapGetters([PRODUCTS]), //getter
  },
  created() {
    this.$store.dispatch(FETCH_PRODUCTS); //action
  },
};
</script>

<style>
</style>

<template>
  <section class="bg-white py-8">
    <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
      <div
        v-for="product in products"
        :key="product.id"
        class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col"
      >
        <Product
          :product="product"
          :productPhoto="product.photo_url"
          :id="product.id"
        />
      </div>
    </div>
  </section>
</template>
