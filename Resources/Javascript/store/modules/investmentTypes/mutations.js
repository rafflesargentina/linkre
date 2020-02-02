import * as types from "../../mutation-types"
import { initialState } from "./investmentTypes"

export default {
    [types.INVESTMENT_TYPES_DELETE_ONE] () {},

    [types.INVESTMENT_TYPES_ERROR] (state, payload) {
        state.error = JSON.stringify(payload)
    },

    [types.INVESTMENT_TYPES_FETCH_ALL] (state, payload) {
        state.all = payload
    },

    [types.INVESTMENT_TYPES_FETCH_ONE] (state, payload) {
        state.one = Object.freeze(payload)
    },

    [types.INVESTMENT_TYPES_RESET] (state) {
        Object.assign(state, { initialState: initialState(), ...initialState() })
    }
}
