import * as types from "../../mutation-types"

export default {
    createOneInvestmentView ({ commit }, data) {
        return window.axios.post("/api/investment-views", data)
            .then(response => {
                const r = response.data.data[0]
                commit(types.INVESTMENT_VIEWS_LAST_CREATED, r)
                return r
            })
            .catch(error => {
                console.error(error)
                commit(types.INVESTMENT_VIEWS_ERROR, error)
                return error
            })
    },

    deleteOneInvestmentView ({ commit }, id) {
        return window.axios.delete("/api/investment-views/" + id)
            .then(response => {
                const r = response.data.data
                commit(types.INVESTMENT_VIEWS_DELETE_ONE, r)
                return r
            })
            .catch(error => {
                console.error(error)
                commit(types.INVESTMENT_VIEWS_ERROR, error)
                return error
            })
    },

    fetchAllInvestmentViews ({ commit }) {
        return window.axios.get("/api/investment-views")
            .then(response => {
                const all = response.data.data
                commit(types.INVESTMENT_VIEWS_FETCH_ALL, all)
                return all
            })
            .catch(error => {
                console.log(error)
                commit(types.INVESTMENT_VIEWS_ERROR, error)
                return error
            })
    },

    fetchInvestmentViewsCount ({ commit }) {
        return window.axios.get("/api/investment-views-count")
            .then(response => {
                const all = response.data.data
                commit(types.INVESTMENT_VIEWS_COUNT, all)
                return all
            })
            .catch(error => {
                console.log(error)
                commit(types.INVESTMENT_VIEWS_ERROR, error)
                return error
            })
    },

    fetchOneInvestmentView ({ commit }, id) {
        return window.axios.get("/api/investment-views/" + id)
            .then(response => {
                const one = response.data
                commit(types.INVESTMENT_VIEWS_FETCH_ONE, one)
                return one
            })
            .catch(error => {
                commit(types.INVESTMENT_VIEWS_ERROR, error)
                return error
            })
    }
}
