<script>
import { mapActions, mapGetters } from "vuex";
import {
  FETCH_GET_BASKET_ITEMS,
  FETCH_DELETE_BASKET_ITEM,
  FETCH_UPDATE_BASKET,
  FETCH_GET_BASKET_TOTAL,
  BASKET_ITEMS,
  BASKET_TOTAL,
} from "../store/constants/basketConstants";
import Navbar from '../components/Site/Navbar.vue'

export default {
  components: {
    Navbar
  },
  computed: {
    ...mapGetters([BASKET_ITEMS, BASKET_TOTAL]), //getters
  },
  created() {
    //actions
    this.$store.dispatch(FETCH_GET_BASKET_ITEMS);
    this.$store.dispatch(FETCH_GET_BASKET_TOTAL);
  },
  methods: {
    ...mapActions({
      deleteBasketItem: FETCH_DELETE_BASKET_ITEM,
      updateBasket: FETCH_UPDATE_BASKET,
    }),
    updateQuantity(id, qty) {
      this.updateBasket({ id, qty });
    },
    deleteItem(id) {
      this.deleteBasketItem({ id });
    },
  },
};
</script>

<template>
  <div class="flex justify-center my-6">
    <div
      class="
        flex flex-col
        w-full
        p-8
        text-gray-800
        bg-white
        shadow-lg
        pin-r pin-y
        md:w-4/5
        lg:w-4/5
      "
    >
      <div class="flex sm:flex-1">
        <!-- Basket Table -->
        <table class="w-full text-sm lg:text-base" cellspacing="0">
          <thead>
            <tr class="h-12 uppercase">
              <th class="hidden md:table-cell"></th>
              <th class="text-left">Ürün</th>
              <th class="lg:text-right text-left pl-5 lg:pl-0">
                <span class="lg:hidden" title="Miktar">Miktar</span>
                <span class="hidden lg:inline">Miktar</span>
              </th>
              <th class="hidden text-right md:table-cell">Ürün fiyatı</th>
              <th class="text-right">Toplam Fiyat</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="basket in basketItems" :key="basket.id">
              <td class="hidden pb-4 md:table-cell">
                <a href="#">
                  <img
                    :src="'http://localhost:8000/' + basket.photo_url"
                    class="w-20 rounded"
                    :alt="basket.name"
                  />
                </a>
              </td>
              <td>
                <a href="#">
                  <p class="mb-2 md:ml-4">{{ basket.name }}</p>
                  <form @submit.prevent="deleteItem(basket.basketId)">
                    <button type="submit" class="text-gray-700 md:ml-4">
                      <small class="text-red-400">(Sepetten kaldır)</small>
                    </button>
                  </form>
                </a>
              </td>
              <td class="justify-center md:justify-end md:flex mt-6">
                <div class="w-20 h-10">
                  <div class="relative flex flex-row w-full h-8">
                    <!-- :value="basket.quantity" -->
                    <input
                      type="number"
                      min="1"
                      max="10"
                      v-model="basket.quantity"
                      @change="updateQuantity(basket.basketId, basket.quantity)"
                      class="
                        w-full
                        font-semibold
                        text-center text-gray-700
                        bg-gray-200
                        outline-none
                        focus:outline-none
                        hover:text-black
                        focus:text-black
                      "
                    />
                  </div>
                </div>
              </td>
              <td class="hidden text-right md:table-cell">
                <span class="text-sm lg:text-base font-medium">
                  {{ basket.price }} ₺
                </span>
              </td>
              <td class="text-right">
                <span class="text-sm lg:text-base font-medium">
                  {{ basket.price * basket.quantity }} ₺
                </span>
              </td>
            </tr>
          </tbody>
        </table>
        <!-- End basket table -->
        <hr class="pb-6 mx-6" />
        <!-- Basket Footer -->
        <div class="my-4 mt-6 lg:flex">
          <div class="lg:px-2 lg:w-1/2">
            <!-- total price -->
            <div class="p-4 w-max bg-gray-100 rounded-full">
              <h1 class="ml-2 font-bold uppercase">
                Toplam Fiyat: {{ basketTotal }} ₺
              </h1>
            </div>
            <!-- end total price -->
            <!-- send order -->
            <div class="p-3 w-full">
              <a href="#">
                <button
                  class="
                    flex
                    justify-center
                    w-full
                    px-12
                    py-1
                    mt-2
                    font-medium
                    text-white
                    uppercase
                    bg-gray-800
                    rounded-sm
                    shadow
                    item-center
                    hover:bg-gray-700
                    focus:shadow-outline focus:outline-none
                  "
                >
                  <span class="ml-2 mt-5px">Siparişi Gönder</span>
                </button>
              </a>
            </div>
            <!-- end send order -->
          </div>
        </div>
        <!-- end basket footer -->
      </div>
    </div>
  </div>
</template>