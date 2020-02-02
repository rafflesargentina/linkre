import * as types from "../../mutation-types"
import { mapTags } from "@/utilities/helpers"

export default {
    deleteOneInvestor ({ commit }, id) {
        return window.axios.delete("/api/investors/" + id)
            .then(response => {
                const r = response.data.data
                commit(types.INVESTORS_DELETE_ONE, r)
                return r
            })
            .catch(error => {
                console.error(error)
                commit(types.INVESTORS_ERROR, error)
                return error
            })
    },

    fetchAllInvestors ({ commit }) {
        return window.axios.get("/api/investors")
            .then(response => {
                const all = response.data.data
                commit(types.INVESTORS_FETCH_ALL, all)
                return all
            })
            .catch(error => {
                console.error(error)
                commit(types.INVESTORS_ERROR, error)
                return error
            })
    },

    fetchOneInvestor ({ commit, dispatch }, id) {
        return window.axios.get("/api/investors/" + id)
            .then(response => {
                const one = response.data
                commit(types.INVESTORS_FETCH_ONE, one)
                dispatch("mapOneInvestmentTags", one)
                return one
            })
            .catch(error => {
                console.error(error)
                commit(types.INVESTORS_ERROR, error)
                return error
            })
    },

    mapOneInvestmentTags ({ commit }, one) {
        const oneInvestmentTags = mapTags(one.investments)
        commit(types.INVESTORS_ONE_INVESTMENT_MAP_TAGS, oneInvestmentTags)
        return oneInvestmentTags
    },

    reset ({ commit }) {
        commit(types.INVESTORS_RESET)
        return null
    }
}
