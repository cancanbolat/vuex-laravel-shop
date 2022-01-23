import api from "../../api";
import { 
    ORDERS, 
    SET_ORDERS, 
    FETCH_CREATE_ORDER, 
    FETCH_DELETE_ORDER, 
    FETCH_ORDERS, 
    FETCH_UPDATE_ORDER 
} from '../constants/orderConstants'

const state = {
    orderItems = []
}

const getters = {
    orderItems(state){
        return state.orderItems
    }
}

const mutations = {
    SET_ORDERS(state, item){
        return state.orderItems = item
    }
}

const actions = {
    //get orders
    async [FETCH_ORDERS]({commit}){
        api.get("order").then((res) => {
            commit(SET_ORDERS, res.data.data)
        })
    },

    //create order
    async [FETCH_CREATE_ORDER]({commit}){
        api.post("order", payload).then((res) => {
            commit(SET_ORDERS, res)
        })
    },

    //delete order
    async [FETCH_DELETE_ORDER]({commit}, payload){
        api.delete("basket/" + payload.id, payload).then((res) => {
            commit(SET_ORDERS,)
        })
    }
}
