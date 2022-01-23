import Vue from 'vue'
import Vuex from 'vuex'
import product from './modules/product'
import basket from './modules/basket'

Vue.use(Vuex)

export default new Vuex.Store({
  modules: {
    product,
    basket
  }
})
