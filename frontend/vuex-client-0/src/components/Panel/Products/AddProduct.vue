<script>
import Sidebar from "../Sidebar.vue";
import Header from "../Header.vue";
export default {
  components: {
    Sidebar,
    Header,
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
      <div class="h-full mt-5 md:ml-64 flex justify-center">
        <div class="md:grid-cols-2">
          <form class="p-6">
            <div class="flex flex-col w-96">
              <label for="name" class="hidden">Full Name</label>
              <input
                type="name"
                name="name"
                id="name"
                placeholder="Full Name"
                class="
                  w-100
                  mt-2
                  py-3
                  px-3
                  rounded-lg
                  bg-white
                  dark:bg-gray-800
                  border border-gray-400
                  dark:border-gray-700
                  text-gray-800
                  dark:text-gray-50
                  font-semibold
                  focus:border-blue-500 focus:outline-none
                "
              />
            </div>

            <div class="flex flex-col mt-2">
              <label for="email" class="hidden">Email</label>
              <input
                type="email"
                name="email"
                id="email"
                placeholder="Email"
                class="
                  w-100
                  mt-2
                  py-3
                  px-3
                  rounded-lg
                  bg-white
                  dark:bg-gray-800
                  border border-gray-400
                  dark:border-gray-700
                  text-gray-800
                  dark:text-gray-50
                  font-semibold
                  focus:border-blue-500 focus:outline-none
                "
              />
            </div>

            <div class="flex flex-col mt-2">
              <label for="tel" class="hidden">Number</label>
              <input
                type="tel"
                name="tel"
                id="tel"
                placeholder="Telephone Number"
                class="
                  w-100
                  mt-2
                  py-3
                  px-3
                  rounded-lg
                  bg-white
                  dark:bg-gray-800
                  border border-gray-400
                  dark:border-gray-700
                  text-gray-800
                  dark:text-gray-50
                  font-semibold
                  focus:border-blue-500 focus:outline-none
                "
              />
            </div>

            <div class="flex flex-col mt-2">
              <label for="tel" class="hidden">Number</label>
              <input
                type="tel"
                name="tel"
                id="tel"
                placeholder="Telephone Number"
                class="
                  w-100
                  mt-2
                  py-3
                  px-3
                  rounded-lg
                  bg-white
                  dark:bg-gray-800
                  border border-gray-400
                  dark:border-gray-700
                  text-gray-800
                  dark:text-gray-50
                  font-semibold
                  focus:border-blue-500 focus:outline-none
                "
              />
            </div>

            <button
              type="submit"
              class="
                md:w-32
                bg-blue-600
                dark:bg-gray-100
                text-white
                dark:text-gray-800
                font-bold
                py-3
                px-6
                rounded-lg
                mt-4
                hover:bg-blue-500
                dark:hover:bg-gray-200
                transition
                ease-in-out
                duration-300
              "
            >
              Submit
            </button>
          </form>
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
        "
      >
        <div class="bg-white rounded-lg w-1/2">
          <div class="flex flex-col items-start p-4">
            <div class="flex items-center w-full">
              <div class="text-gray-900 font-medium text-lg">Order Detail</div>
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
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
              eiusmod tempor incididunt ut labore et dolore magna aliqua.
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