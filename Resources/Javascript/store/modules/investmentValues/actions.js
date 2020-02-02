import * as values from "../../mutation-types"

export default {
    deleteOneInvestmentValue ({ commit }, id) {
        return window.axios.delete("/api/investment-values/" + id)
            .then(response => {
                const r = response.data.data
                commit(values.INVESTMENT_VALUES_DELETE_ONE, r)
                return r
            })
            .catch(error => {
                console.error(error)
                commit(values.INVESTMENT_VALUES_ERROR, error)
                return error
            })
    },

    fetchAllInvestmentValues ({ commit }) {
        return window.axios.get("/api/investment-values")
            .then(response => {
                const all = response.data.data
                commit(values.INVESTMENT_VALUES_FETCH_ALL, all)
                return all
            })
            .catch(error => {
                console.error(error)
                commit(values.INVESTMENT_VALUES_ERROR, error)
                return error
            })
    },

    fetchOneInvestmentValue ({ commit }, id) {
        return window.axios.get("/api/investment-values/" + id)
            .then(response => {
                const one = response.data
                commit(values.INVESTMENT_VALUES_FETCH_ONE, one)
                return one
            })
            .catch(error => {
                commit(values.INVESTMENT_VALUES_ERROR, error)
                return error
            })
    },

    reset ({ commit }) {
        commit(values.INVESTMENT_VALUES_RESET)
        return null
    }
}
