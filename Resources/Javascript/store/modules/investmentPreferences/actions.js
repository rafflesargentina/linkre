import * as types from "../../mutation-types"

export default {
    deleteOneInvestmentPreference ({ commit }, id) {
        return window.axios.delete("/api/investment-preferences/" + id)
            .then(response => {
                const r = response.data.data
                commit(types.INVESTMENT_PREFERENCES_DELETE_ONE, r)
                return r
            })
            .catch(error => {
                console.error(error)
                commit(types.INVESTMENT_PREFERENCES_ERROR, error)
                return error
            })
    },

    fetchAllInvestmentPreferences ({ commit }) {
        return window.axios.get("/api/investment-preferences")
            .then(response => {
                const all = response.data.data
                commit(types.INVESTMENT_PREFERENCES_FETCH_ALL, all)
                return all
            })
            .catch(error => {
                console.error(error)
                commit(types.INVESTMENT_PREFERENCES_ERROR, error)
                return error
            })
    },

    fetchOneInvestmentPreference ({ commit }, id) {
        return window.axios.get("/api/investment-preferences/" + id)
            .then(response => {
                const one = response.data
                commit(types.INVESTMENT_PREFERENCES_FETCH_ONE, one)
                return one
            })
            .catch(error => {
                commit(types.INVESTMENT_PREFERENCES_ERROR, error)
                return error
            })
    },

    reset ({ commit }) {
        commit(types.INVESTMENT_PREFERENCES_RESET)
        return null
    }
}
