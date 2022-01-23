import api from "../../api";
import {
    SET_BASKET,
    SET_BASKET_QTY,
    SET_BASKET_TOTAL,
    FETCH_GET_BASKET_ITEMS,
    FETCH_ADD_TO_BASKET,
    FETCH_DELETE_BASKET_ITEM,
    FETCH_UPDATE_BASKET,
    FETCH_GET_BASKET_TOTAL,
    FETCH_SET_BASKET_TOTAL,
    FETCH_GET_TOTAL_QTY,
    FETCH_SET_TOTAL_QTY
} from '../constants/basketConstants'

const state = {
    basketItems: [],
    basketQty: 0,
    basketTotal: 0
}

const getters = {
    basketItems(state) {
        return state.basketItems
    },
    basketQty(state) {
        return state.basketQty
    },
    basketTotal(state) {
        return state.basketTotal
    }
}

const mutations = {
    SET_BASKET(state, item) {
        return state.basketItems = item
    },
    SET_BASKET_QTY(state, item) {
        return state.basketQty = item
    },
    SET_BASKET_TOTAL(state, item) {
        return state.basketTotal = item
    },
}

const actions = {

    //get basket items
    async [FETCH_GET_BASKET_ITEMS]({ commit }) {
        api.get("basket").then((res) => {
            commit(SET_BASKET, res.data.basket)
        })
    },

    //add to basket
    async [FETCH_ADD_TO_BASKET]({ commit }, payload) {
        api.post("basket", payload).then((res) => {
            commit(SET_BASKET, res.data)
            commit(SET_BASKET_QTY, res.data.count)
        })
    },

    //delete basket
    async [FETCH_DELETE_BASKET_ITEM]({ commit }, payload) {
        api.delete("basket/" + payload.id, payload).then((res) => {
            commit(SET_BASKET_QTY, state.basketQty - 1)
            commit(SET_BASKET, state.basketItems.filter((basket, index, arr) => {
                console.log(index);
                state.basketItems.splice(index)
                return arr
            }))
            commit(SET_BASKET_TOTAL, res.totalCount)
        })
    },

    //update basket
    async [FETCH_UPDATE_BASKET]({ commit }, payload) {
        api.put("basket/" + payload.id, payload).then((res) => { 
            commit(SET_BASKET_TOTAL, state.basketTotal += res.data.basket.price)
        })
    },

    //basket total
    async [FETCH_GET_BASKET_TOTAL]({ commit }, payload) {
        api.get("basket", payload).then((res) => {
            commit(SET_BASKET_TOTAL, res.data.totalCount)
        })
    },
    async [FETCH_SET_BASKET_TOTAL]({ commit }, totalCount) {
        commit(SET_BASKET_TOTAL, totalCount)
    },

    //quantity
    async [FETCH_GET_TOTAL_QTY]({ commit }, payload) {
        api.get("basket", payload).then((res) => {
            commit(SET_BASKET_QTY, res.data.count)
        })
    },
    async [FETCH_SET_TOTAL_QTY]({ commit }, qty) {
        commit(SET_BASKET_QTY, qty)
    },
}

export default { namespaces: true, state, getters, mutations, actions }