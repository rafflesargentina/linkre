import * as types from "../../mutation-types"

export default {
    deleteOneLead ({ commit }, id) {
        return window.axios.delete("/api/leads/" + id)
            .then(response => {
                const r = response.data.data
                commit(types.LEADS_DELETE_ONE, r)
                return r
            })
            .catch(error => {
                console.log(error)
                commit(types.LEADS_ERROR, error)
                return error
            })
    },

    fetchAllLeads ({ commit }) {
        return window.axios.get("/api/leads")
            .then(response => {
                const all = response.data.data
                commit(types.LEADS_FETCH_ALL, all)
                return all
            })
            .catch(error => {
                console.log(error)
                commit(types.LEADS_ERROR, error)
                return error
            })
    },

    fetchOneLead ({ commit }, id) {
        return window.axios.get("/api/leads/" + id)
            .then(response => {
                const one = response.data
                commit(types.LEADS_FETCH_ONE, one)
                return one
            })
            .catch(error => {
                commit(types.LEADS_ERROR, error)
                return error
            })
    },

    reset ({ commit }) {
        commit(types.LEADS_RESET)
        return null
    }
}
