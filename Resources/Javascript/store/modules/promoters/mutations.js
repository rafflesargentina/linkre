import * as types from "../../mutation-types"
import { initialState } from "./promoters"

export default {
    [types.PROMOTERS_DELETE_ONE] () {},

    [types.PROMOTERS_ERROR] (state, payload) {
        state.error = JSON.stringify(payload)
    },

    [types.PROMOTERS_FETCH_ALL] (state, payload) {
        state.all = payload
    },

    [types.PROMOTERS_FETCH_ONE] (state, payload) {
        state.one = Object.freeze(payload)
    },

    [types.PROMOTERS_RESET] (state) {
        Object.assign(state, { initialState: initialState(), ...initialState() })
    }
}
