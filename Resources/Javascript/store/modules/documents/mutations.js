import * as types from "../../mutation-types"
import { initialState } from "./documents"

export default {
    [types.DOCUMENTS_DELETE_ONE] () {},

    [types.DOCUMENTS_ERROR] (state, payload) {
        state.error = JSON.stringify(payload)
    },

    [types.DOCUMENTS_FETCH_ALL] (state, payload) {
        state.all = payload
    },

    [types.DOCUMENTS_FETCH_ONE] (state, payload) {
        state.one = Object.freeze(payload)
    },

    [types.DOCUMENTS_RESET] (state) {
        Object.assign(state, { initialState: initialState(), ...initialState() })
    }
}
