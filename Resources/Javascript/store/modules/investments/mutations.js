import * as types from "../../mutation-types"
import { initialState } from "./investments"

export default {
    [types.INVESTMENTS_ERROR] (state, payload) {
        state.error = JSON.stringify(payload)
    },

    [types.INVESTMENTS_FEATURED] (state, payload) {
        state.featured = payload
    },

    [types.INVESTMENTS_FETCH_ALL] (state, payload) {
        state.all = payload
    },

    [types.INVESTMENTS_FETCH_ONE] (state, payload) {
        state.one = Object.freeze(payload)
    },

    [types.INVESTMENTS_NON_FEATURED] (state, payload) {
        state.nonFeatured = payload
    },

    [types.INVESTMENTS_RESET] (state) {
        Object.assign(state, { initialState: initialState(), ...initialState() })
    }
}
