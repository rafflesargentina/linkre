import * as types from "../../mutation-types"
import { initialState } from "./investmentViews"

export default {
    [types.INVESTMENT_VIEWS_COUNT] (state, payload) {
        state.count = payload
    },

    [types.INVESTMENT_VIEWS_DELETE_ONE] () {},

    [types.INVESTMENT_VIEWS_ERROR] (state, payload) {
        state.error = JSON.stringify(payload)
    },

    [types.INVESTMENT_VIEWS_FETCH_ALL] (state, payload) {
        state.all = payload
    },

    [types.INVESTMENT_VIEWS_FETCH_ONE] (state, payload) {
        state.one = Object.freeze(payload)
    },

    [types.INVESTMENT_VIEWS_LAST_CREATED] (state, payload) {
        state.lastCreated = payload
    },
}
