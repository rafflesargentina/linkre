import * as types from "../../mutation-types"

export default {
    deleteOneInvestorType ({ commit }, id) {
        return window.axios.delete("/api/investor-types/" + id)
            .then(response => {
                const r = response.data.data
                commit(types.INVESTOR_TYPES_DELETE_ONE, r)
                return r
            })
            .catch(error => {
                console.error(error)
                commit(types.INVESTOR_TYPES_ERROR, error)
                return error
            })
    },

    fetchAllInvestorTypes ({ commit }) {
        return window.axios.get("/api/investor-types")
            .then(response => {
                const all = response.data.data
                commit(types.INVESTOR_TYPES_FETCH_ALL, all)
                return all
            })
            .catch(error => {
                console.error(error)
                commit(types.INVESTOR_TYPES_ERROR, error)
                return error
            })
    },

    fetchOneInvestorType ({ commit }, id) {
        return window.axios.get("/api/investor-types/" + id)
            .then(response => {
                const one = response.data
                commit(types.INVESTOR_TYPES_FETCH_ONE, one)
                return one
            })
            .catch(error => {
                commit(types.INVESTOR_TYPES_ERROR, error)
                return error
            })
    },

    reset ({ commit }) {
        commit(types.INVESTOR_TYPES_RESET)
        return null
    }
}
