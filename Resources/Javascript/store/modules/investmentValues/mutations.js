import * as types from "../../mutation-types"
import { initialState } from "./investmentValues"

export default {
    [types.INVESTMENT_VALUES_DELETE_ONE] () {},

    [types.INVESTMENT_VALUES_ERROR] (state, payload) {
        state.error = JSON.stringify(payload)
    },

    [types.INVESTMENT_VALUES_FETCH_ALL] (state, payload) {
        state.all = payload
    },

    [types.INVESTMENT_VALUES_FETCH_ONE] (state, payload) {
        state.one = Object.freeze(payload)
    },

    [types.INVESTMENT_VALUES_RESET] (state) {
        Object.assign(state, { initialState: initialState(), ...initialState() })
    }
}
