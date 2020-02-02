import * as types from "../../mutation-types"

export default {
    deleteOneReport ({ commit }, id) {
        return window.axios.delete("/api/reports/" + id)
            .then(response => {
                const r = response.data.data
                commit(types.REPORTS_DELETE_ONE, r)
                return r
            })
            .catch(error => {
                console.log(error)
                commit(types.REPORTS_ERROR, error)
                return error
            })
    },

    fetchAllReports ({ commit }) {
        return window.axios.get("/api/reports")
            .then(response => {
                const all = response.data.data
                commit(types.REPORTS_FETCH_ALL, all)
                return all
            })
            .catch(error => {
                console.log(error)
                commit(types.REPORTS_ERROR, error)
                return error
            })
    },

    fetchDraftReports ({ commit }) {
        return window.axios.get("/api/draft-reports")
            .then(response => {
                const draft = response.data.data
                commit(types.REPORTS_FETCH_DRAFT, draft)
                return draft
            })
            .catch(error => {
                console.log(error)
                commit(types.REPORTS_ERROR, error)
                return error
            })
    },

    fetchOneReport ({ commit }, id) {
        return window.axios.get("/api/reports/" + id)
            .then(response => {
                const one = response.data
                commit(types.REPORTS_FETCH_ONE, one)
                return one
            })
            .catch(error => {
                commit(types.REPORTS_ERROR, error)
                return error
            })
    },

    fetchPublishedReports ({ commit }) {
        return window.axios.get("/api/published-reports")
            .then(response => {
                const published = response.data.data
                commit(types.REPORTS_FETCH_PUBLISHED, published)
                return published
            })
            .catch(error => {
                console.log(error)
                commit(types.REPORTS_ERROR, error)
                return error
            })
    },

    reset ({ commit }) {
        commit(types.REPORTS_RESET)
        return null
    }
}
