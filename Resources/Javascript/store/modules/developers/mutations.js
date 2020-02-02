import * as types from "../../mutation-types"
import { initialState } from "./developers"

export default {
    [types.DEVELOPERS_DELETE_ONE] () {},

    [types.DEVELOPERS_ERROR] (state, payload) {
        state.error = JSON.stringify(payload)
    },

    [types.DEVELOPERS_FETCH_ALL] (state, payload) {
        state.all = payload
    },

    [types.DEVELOPERS_FETCH_ONE] (state, payload) {
        state.one = Object.freeze(payload)
    },

    [types.DEVELOPERS_ONE_INVESTOR_MAP_TAGS] (state, payload) {
        state.oneInvestmentMappedTags = payload
    },

    [types.DEVELOPERS_RESET] (state) {
        Object.assign(state, { initialState: initialState(), ...initialState() })
    }
}
