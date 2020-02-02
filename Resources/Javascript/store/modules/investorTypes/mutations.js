import * as types from "../../mutation-types"
import { initialState } from "./investorTypes"

export default {
    [types.INVESTOR_TYPES_DELETE_ONE] () {},

    [types.INVESTOR_TYPES_ERROR] (state, payload) {
        state.error = JSON.stringify(payload)
    },

    [types.INVESTOR_TYPES_FETCH_ALL] (state, payload) {
        state.all = payload
    },

    [types.INVESTOR_TYPES_FETCH_ONE] (state, payload) {
        state.one = Object.freeze(payload)
    },

    [types.INVESTOR_TYPES_RESET] (state) {
        Object.assign(state, { initialState: initialState(), ...initialState() })
    }
}
