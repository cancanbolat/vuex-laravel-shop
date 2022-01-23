<script>
import Header from "../../components/Panel/Header.vue";
import Statistics from "../../components/Panel/Statistics.vue";
import Sidebar from "../../components/Panel/Sidebar.vue";
import Table from "../../components/Panel/Table.vue";
import Form from "../../components/Panel/Form.vue";
import Social from "../../components/Panel/Social.vue";
import Tasks from "../../components/Panel/Tasks.vue";

export default {
  components: {
    Header,
    Statistics,
    Sidebar,
    Table,
    Form,
    Social,
    Tasks,
  },
};
</script>

<style lang="">
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

      <div class="h-full ml-14 mt-5 mb-10 md:ml-64">
        <!-- Statistics Cards -->
        <Statistics />
        <!-- ./Statistics Cards -->

        <!-- Social statistics -->
        <Social />
        <!-- ./Social statistics -->

        <!-- Task Summaries -->
        <Tasks />
        <!-- ./Task Summaries -->

        <!-- Client Table -->
        <Table />
        <!-- ./Client Table -->

        <!-- Contact Form -->
        <Form />
        <!-- ./Contact Form -->
      </div>
    </div>
  </div>
</template>