import * as types from "../../mutation-types"

export default {
    deleteOneInvestmentType ({ commit }, id) {
        return window.axios.delete("/api/investment-types/" + id)
            .then(response => {
                const r = response.data.data
                commit(types.INVESTMENT_TYPES_DELETE_ONE, r)
                return r
            })
            .catch(error => {
                console.error(error)
                commit(types.INVESTMENT_TYPES_ERROR, error)
                return error
            })
    },

    fetchAllInvestmentTypes ({ commit }) {
        return window.axios.get("/api/investment-types")
            .then(response => {
                const all = response.data.data
                commit(types.INVESTMENT_TYPES_FETCH_ALL, all)
                return all
            })
            .catch(error => {
                console.error(error)
                commit(types.INVESTMENT_TYPES_ERROR, error)
                return error
            })
    },

    fetchOneInvestmentType ({ commit }, id) {
        return window.axios.get("/api/investment-types/" + id)
            .then(response => {
                const one = response.data
                commit(types.INVESTMENT_TYPES_FETCH_ONE, one)
                return one
            })
            .catch(error => {
                commit(types.INVESTMENT_TYPES_ERROR, error)
                return error
            })
    },

    reset ({ commit }) {
        commit(types.INVESTMENT_TYPES_RESET)
        return null
    }
}
