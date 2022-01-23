<template>
  <div class="home">
  <Navbar />
    <Products/>
  </div>
</template>

<script>
import Products from '../components/Site/Products.vue'
import Navbar from '../components/Site/Navbar.vue'

export default {
  name: 'Home',
  components: {
    Products,
    Navbar
  }
}
</script>
