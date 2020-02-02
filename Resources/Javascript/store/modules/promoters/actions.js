import * as types from "../../mutation-types"

export default {
    deleteOnePromoter ({ commit }, id) {
        return window.axios.delete("/api/promoters/" + id)
            .then(response => {
                const r = response.data.data
                commit(types.PROMOTERS_DELETE_ONE, r)
                return r
            })
            .catch(error => {
                console.error(error)
                commit(types.PROMOTERS_ERROR, error)
                return error
            })
    },

    fetchAllPromoters ({ commit }) {
        return window.axios.get("/api/promoters")
            .then(response => {
                const all = response.data.data
                commit(types.PROMOTERS_FETCH_ALL, all)
                return all
            })
            .catch(error => {
                console.error(error)
                commit(types.PROMOTERS_ERROR, error)
                return error
            })
    },

    fetchOnePromoter ({ commit }, id) {
        return window.axios.get("/api/promoters/" + id)
            .then(response => {
                const one = response.data
                commit(types.PROMOTERS_FETCH_ONE, one)
                return one
            })
            .catch(error => {
                commit(types.PROMOTERS_ERROR, error)
                return error
            })
    },

    reset ({ commit }) {
        commit(types.PROMOTERS_RESET)
        return null
    }
}
