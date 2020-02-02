import * as types from "../../mutation-types"
import { initialState } from "./investmentPreferences"

export default {
    [types.INVESTMENT_PREFERENCES_DELETE_ONE] () {},

    [types.INVESTMENT_PREFERENCES_ERROR] (state, payload) {
        state.error = JSON.stringify(payload)
    },

    [types.INVESTMENT_PREFERENCES_FETCH_ALL] (state, payload) {
        state.all = payload
    },

    [types.INVESTMENT_PREFERENCES_FETCH_ONE] (state, payload) {
        state.one = Object.freeze(payload)
    },

    [types.INVESTMENT_PREFERENCES_RESET] (state) {
        Object.assign(state, { initialState: initialState(), ...initialState() })
    }
}
