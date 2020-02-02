import * as types from "../../mutation-types"
import { initialState } from "./companies"

export default {
    [types.COMPANIES_DELETE_ONE] () {},

    [types.COMPANIES_ERROR] (state, payload) {
        state.error = JSON.stringify(payload)
    },

    [types.COMPANIES_FETCH_ALL] (state, payload) {
        state.all = payload
    },

    [types.COMPANIES_FETCH_ONE] (state, payload) {
        state.one = Object.freeze(payload)
    },

    [types.COMPANIES_RESET] (state) {
        Object.assign(state, { initialState: initialState(), ...initialState() })
    }
}
