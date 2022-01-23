import api from "../../api";
import { FETCH_PRODUCTS, SET_PRODUCTS, SET_DETAILED_PRODUCTS, FETCH_DETAILED_PRODUCTS } from '../constants/productConstants'

const state = {
    products: [],
    detailedProducts: []
}

const getters = {
    products: state => state.products,
    detailedProducts: state => state.detailedProducts
}

const mutations = {
    SET_PRODUCTS(state, payload) {
        return state.products = payload
    },
    SET_DETAILED_PRODUCTS(state, payload) {
        return state.detailedProducts = payload
    }
}

const actions = {
    async [FETCH_PRODUCTS]
        ({ commit }) {
        api.get("products").then((res) => {
            commit(SET_PRODUCTS, res.data.data)
        })
    },
    async [FETCH_DETAILED_PRODUCTS]
        ({ commit }) {
        api.get("getProductsDetail").then((res) => {
            commit(SET_DETAILED_PRODUCTS, res.data.data)
        })
    }
}

export default { namespaces: true, state, getters, mutations, actions }