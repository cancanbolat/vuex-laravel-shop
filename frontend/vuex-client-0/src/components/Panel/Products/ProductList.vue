<script>
import Sidebar from "../Sidebar.vue";
import Header from "../Header.vue";
import { mapGetters } from "vuex";
import {
  FETCH_DETAILED_PRODUCTS,
  DETAILED_PRODUCTS,
} from "../../../store/constants/productConstants";

export default {
  components: {
    Sidebar,
    Header,
  },
  data() {
    return {
      showModal: false
    }
  },
  computed: {
    ...mapGetters([DETAILED_PRODUCTS]),
  },
  created() {
    this.$store.dispatch(FETCH_DETAILED_PRODUCTS);
  },
};
</script>

<style>
</style>

<template>
  <div>
    <div
      class="
        min-h-screen
        flex flex-col flex-auto flex-shrink-0
        antialiased
        bg-white
        dark:bg-gray-700
        text-black
        dark:text-white
      "
    >
      <!-- Header -->
      <Header />
      <!-- ./Header -->

      <!-- Sidebar -->
      <Sidebar />
      <!-- ./Sidebar -->

      <!-- content -->
      <div class="h-full ml-14 mt-5 mb-10 md:ml-64">
        <div class="mt-4 mx-4">
          <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
              <table class="w-full">
                <thead>
                  <tr
                    class="
                      text-xs
                      font-semibold
                      tracking-wide
                      text-left text-gray-500
                      uppercase
                      border-b
                      dark:border-gray-700
                      bg-gray-50
                      dark:text-gray-400 dark:bg-gray-800
                    "
                  >
                    <th class="px-4 py-3">Image</th>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Price</th>
                    <th class="px-4 py-3 bg-gray-100">Orders</th>
                    <th class="px-4 py-3 bg-gray-100">Total Order</th>
                  </tr>
                </thead>
                <tbody
                  class="
                    bg-white
                    divide-y
                    dark:divide-gray-700 dark:bg-gray-800
                  "
                >
                  <tr
                    v-for="product in detailedProducts"
                    :key="product.id"
                    class="
                      bg-gray-50
                      dark:bg-gray-800
                      hover:bg-gray-100
                      dark:hover:bg-gray-900
                      text-gray-700
                      dark:text-gray-400
                    "
                  >
                    <td class="px-4 py-3">
                      <div class="flex items-center text-sm">
                        <div
                          class="
                            relative
                            hidden
                            w-8
                            h-8
                            mr-3
                            rounded-full
                            md:block
                          "
                        >
                          <!-- :src="'http://localhost:8000/' + productPhoto" -->
                          <img
                            class="object-cover w-full h-full rounded-full"
                            :src="product.photo_url"
                            :alt="product.name"
                            loading="lazy"
                          />
                          <div
                            class="absolute inset-0 rounded-full shadow-inner"
                            aria-hidden="true"
                          ></div>
                        </div>
                        <div>
                          <p class="font-semibold">{{ product.name }}</p>
                          <p class="text-xs text-gray-600 dark:text-gray-400">
                            ...
                          </p>
                        </div>
                      </div>
                    </td>
                    <td class="px-4 py-3 text-sm">{{ product.name }}</td>
                    <td class="px-4 py-3 text-sm">{{ product.price }} ₺</td>
                    <td class="px-4 py-3 text-sm bg-gray-100 font-semibold underline 
                      decoration-2 text-blue-900 cursor-pointer" @click="showModal = true">
                      {{ product.total >  0 ? '' : '' }} {{product.total}} order ->
                    </td>
                    <td class="px-4 py-3 text-sm bg-gray-100 font-semibold">
                      {{ product.total * product.price }} ₺
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div
              class="
                grid
                px-4
                py-3
                text-xs
                font-semibold
                tracking-wide
                text-gray-500
                uppercase
                border-t
                dark:border-gray-700
                bg-gray-50
                sm:grid-cols-9
                dark:text-gray-400 dark:bg-gray-800
              "
            >
              <span class="flex items-center col-span-3">
                Showing 21-30 of 100
              </span>
              <span class="col-span-2"></span>
              <!-- Pagination -->
              <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                <nav aria-label="Table navigation">
                  <ul class="inline-flex items-center">
                    <li>
                      <button
                        class="
                          px-3
                          py-1
                          rounded-md rounded-l-lg
                          focus:outline-none focus:shadow-outline-purple
                        "
                        aria-label="Previous"
                      >
                        <svg
                          aria-hidden="true"
                          class="w-4 h-4 fill-current"
                          viewBox="0 0 20 20"
                        >
                          <path
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd"
                            fill-rule="evenodd"
                          ></path>
                        </svg>
                      </button>
                    </li>
                    <li>
                      <button
                        class="
                          px-3
                          py-1
                          rounded-md
                          focus:outline-none focus:shadow-outline-purple
                        "
                      >
                        1
                      </button>
                    </li>
                    <li>
                      <button
                        class="
                          px-3
                          py-1
                          rounded-md
                          focus:outline-none focus:shadow-outline-purple
                        "
                      >
                        2
                      </button>
                    </li>
                    <li>
                      <button
                        class="
                          px-3
                          py-1
                          text-white
                          dark:text-gray-800
                          transition-colors
                          duration-150
                          bg-blue-600
                          dark:bg-gray-100
                          border border-r-0 border-blue-600
                          dark:border-gray-100
                          rounded-md
                          focus:outline-none focus:shadow-outline-purple
                        "
                      >
                        3
                      </button>
                    </li>
                    <li>
                      <button
                        class="
                          px-3
                          py-1
                          rounded-md
                          focus:outline-none focus:shadow-outline-purple
                        "
                      >
                        4
                      </button>
                    </li>
                    <li>
                      <span class="px-3 py-1">...</span>
                    </li>
                    <li>
                      <button
                        class="
                          px-3
                          py-1
                          rounded-md
                          focus:outline-none focus:shadow-outline-purple
                        "
                      >
                        8
                      </button>
                    </li>
                    <li>
                      <button
                        class="
                          px-3
                          py-1
                          rounded-md
                          focus:outline-none focus:shadow-outline-purple
                        "
                      >
                        9
                      </button>
                    </li>
                    <li>
                      <button
                        class="
                          px-3
                          py-1
                          rounded-md rounded-r-lg
                          focus:outline-none focus:shadow-outline-purple
                        "
                        aria-label="Next"
                      >
                        <svg
                          class="w-4 h-4 fill-current"
                          aria-hidden="true"
                          viewBox="0 0 20 20"
                        >
                          <path
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"
                            fill-rule="evenodd"
                          ></path>
                        </svg>
                      </button>
                    </li>
                  </ul>
                </nav>
              </span>
            </div>
          </div>
        </div>
      </div>
      <!-- modal -->
      <div
        v-show="showModal"
        class="
          flex
          items-center
          justify-center
          fixed
          left-0
          bottom-0
          w-full
          h-full
          bg-gray-300
          opacity-95
          md:ml-36
        "
      >
        <div class="bg-white rounded-lg w-1/2">
          <div class="flex flex-col items-start p-4">
            <div class="flex items-center w-full">
              <div class="text-gray-900 font-medium text-lg">
                Order Detail
              </div>
              <svg
               @click="showModal = false"
                class="
                  ml-auto
                  fill-current
                  text-gray-700
                  w-6
                  h-6
                  cursor-pointer
                "
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 18 18"
              >
                <path
                  d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"
                />
              </svg>
            </div>
            <hr />
            <!-- content -->
            <div class="">
              
            </div>
            <hr />
            <div class="ml-auto">
              <button
                class="
                  bg-blue-500
                  hover:bg-blue-700
                  text-white
                  font-bold
                  py-2
                  px-4
                  rounded
                  mr-4
                "
              >
                Agree
              </button>
              <button
              @click="showModal = false"
                class="
                  bg-transparent
                  hover:bg-gray-500
                  text-blue-700
                  font-semibold
                  hover:text-white
                  py-2
                  px-4
                  border border-blue-500
                  hover:border-transparent
                  rounded
                "
              >
                Close
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>