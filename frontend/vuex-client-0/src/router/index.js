import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Basket from '../views/Basket.vue'
import Products from '../components/Site/Products.vue'
import Admin from '../views/Panel/Admin.vue'
import AdminProducts from '../components/Panel/Products/ProductList.vue'
import AddProduct from '../components/Panel/Products/AddProduct.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/products',
    name: 'Products',
    component: Products
  },
  {
    path: '/basket',
    name: 'Basket',
    component: Basket
  },
  {
    path: '/admin',
    name: 'Admin',
    component: Admin
  },
  {
    path: '/productlist',
    name: 'AdminProducts',
    component: AdminProducts
  },
  {
    path: '/addproduct',
    name: 'AddProduct',
    component: AddProduct
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
