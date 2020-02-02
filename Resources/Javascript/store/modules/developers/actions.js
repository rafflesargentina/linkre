import * as types from "../../mutation-types"
import { mapTags } from "@/utilities/helpers"

export default {
    deleteOneDeveloper ({ commit }, id) {
        return window.axios.delete("/api/developers/" + id)
            .then(response => {
                const r = response.data.data
                commit(types.DEVELOPERS_DELETE_ONE, r)
                return r
            })
            .catch(error => {
                console.error(error)
                commit(types.DEVELOPERS_ERROR, error)
                return error
            })
    },

    fetchAllDevelopers ({ commit }) {
        return window.axios.get("/api/developers")
            .then(response => {
                const all = response.data.data
                commit(types.DEVELOPERS_FETCH_ALL, all)
                return all
            })
            .catch(error => {
                console.error(error)
                commit(types.DEVELOPERS_ERROR, error)
                return error
            })
    },

    fetchOneDeveloper ({ commit, dispatch }, id) {
        return window.axios.get("/api/developers/" + id)
            .then(response => {
                const one = response.data
                commit(types.DEVELOPERS_FETCH_ONE, one)
                dispatch("mapOneInvestorTags", one)
                return one
            })
            .catch(error => {
                console.error(error)
                commit(types.DEVELOPERS_ERROR, error)
                return error
            })
    },

    mapOneInvestorTags ({ commit }, one) {
        const oneInvestorTags = mapTags(one.investors)
        commit(types.DEVELOPERS_ONE_INVESTOR_MAP_TAGS, oneInvestorTags)
        return oneInvestorTags
    },

    reset ({ commit }) {
        commit(types.DEVELOPERS_RESET)
        return null
    }
}
