import * as types from "../../mutation-types"
import { initialState } from "./investors"

export default {
    [types.INVESTORS_DELETE_ONE] () {},

    [types.INVESTORS_ERROR] (state, payload) {
        state.error = JSON.stringify(payload)
    },

    [types.INVESTORS_FETCH_ALL] (state, payload) {
        state.all = payload
    },

    [types.INVESTORS_FETCH_ONE] (state, payload) {
        state.one = Object.freeze(payload)
    },

    [types.INVESTORS_ONE_INVESTMENT_MAP_TAGS] (state, payload) {
        state.oneInvestmentMappedTags = payload
    },

    [types.INVESTORS_RESET] (state) {
        Object.assign(state, { initialState: initialState(), ...initialState() })
    }
}
