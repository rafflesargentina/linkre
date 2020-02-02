import * as types from "../../mutation-types"
import { initialState } from "./reports"

export default {
    [types.REPORTS_ERROR] (state, payload) {
        state.error = JSON.stringify(payload)
    },

    [types.REPORTS_FETCH_ALL] (state, payload) {
        state.all = payload
    },

    [types.REPORTS_FETCH_DRAFT] (state, payload) {
        state.draft = payload
    },

    [types.REPORTS_FETCH_ONE] (state, payload) {
        state.one = Object.freeze(payload)
    },

    [types.REPORTS_FETCH_PUBLISHED] (state, payload) {
        state.published = payload
    },

    [types.REPORTS_RESET] (state) {
        Object.assign(state, { initialState: initialState(), ...initialState() })
    }
}
