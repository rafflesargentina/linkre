import { filter } from "lodash"
import * as types from "../../mutation-types"

export default {
    deleteOneInvestment ({ commit }, id) {
        return window.axios.delete("/api/investments/" + id)
            .then(response => {
                const r = response.data.data
                commit(types.INVESTMENTS_DELETE_ONE, r)
                return r
            })
            .catch(error => {
                console.error(error)
                commit(types.INVESTMENTS_ERROR, error)
                return error
            })
    },

    fetchAllInvestments ({ commit, dispatch }) {
        return window.axios.get("/api/investments")
            .then(response => {
                const all = response.data.data
                commit(types.INVESTMENTS_FETCH_ALL, all)
                dispatch("mapInvestmentsFeatured", all)
                dispatch("mapInvestmentsNonFeatured", all)
                return all
            })
            .catch(error => {
                console.log(error)
                commit(types.INVESTMENTS_ERROR, error)
                return error
            })
    },

    fetchOneInvestment ({ commit }, id) {
        return window.axios.get("/api/investments/" + id)
            .then(response => {
                const one = response.data
                commit(types.INVESTMENTS_FETCH_ONE, one)
                return one
            })
            .catch(error => {
                commit(types.INVESTMENTS_ERROR, error)
                return error
            })
    },

    mapInvestmentsFeatured({ commit, state }, all) {
        const featured = filter(all || state.all, (item)=> item.featured === "1")
        commit(types.INVESTMENTS_FEATURED, featured)
        return featured
    },

    mapInvestmentsNonFeatured({ commit, state }, all) {
        const nonFeatured = filter(all || state.all, (item)=> item.featured !== "1")
        commit(types.INVESTMENTS_NON_FEATURED, nonFeatured)
        return nonFeatured
    },

    reset ({ commit }) {
        commit(types.INVESTMENTS_RESET)
        return null
    }
}
