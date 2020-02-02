import * as types from "../../mutation-types"

export default {
    deleteOneDocument ({ commit }, id) {
        return window.axios.delete("/api/documents/" + id)
            .then(response => {
                const r = response.data.data
                commit(types.DOCUMENTS_DELETE_ONE, r)
                return r
            })
            .catch(error => {
                commit(types.DOCUMENTS_ERROR, error)
                return error
            })
    },

    fetchAllDocuments ({ commit }, params) {
        return window.axios.get("/api/documents", { params: params })
            .then(response => {
                const all = response.data.data
                commit(types.DOCUMENTS_FETCH_ALL, all)
                return all
            })
            .catch(error => {
                commit(types.DOCUMENTS_ERROR, error)
                return error
            })
    },

    fetchOneDocument ({ commit }, id) {
        return window.axios.get("/api/documents/" + id)
            .then(response => {
                const one = response.data
                commit(types.DOCUMENTS_FETCH_ONE, one)
                return one
            })
            .catch(error => {
                commit(types.DOCUMENTS_ERROR, error)
                return error
            })
    },

    reset ({ commit }) {
        commit(types.DOCUMENTS_RESET)
        return null
    }
}
