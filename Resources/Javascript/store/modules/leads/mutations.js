import * as types from "../../mutation-types"
import { initialState } from "./leads"

export default {
    [types.LEADS_ERROR] (state, payload) {
        state.error = JSON.stringify(payload)
    },

    [types.LEADS_FETCH_ALL] (state, payload) {
        state.all = payload
    },

    [types.LEADS_FETCH_ONE] (state, payload) {
        state.one = payload
    },

    [types.LEADS_RESET] (state) {
        Object.assign(state, { initialState: initialState(), ...initialState() })
    }
}
