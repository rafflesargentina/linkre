import actions from "./actions"
import getters from "./getters"
import mutations from "./mutations"

export function initialState()
{
    return {
        all: [],
        allPending: true,
        one: {
            company: "",
            email: "",
            first_name: "",
            last_name: "",
            mobile: "",
            phone: "",
            position: "",
            subscribe: "",
        },
        onePending: true,
    }
}

const state = {
    initialState: initialState(),
    ...initialState()
}

export default {
    actions,
    getters,
    mutations,
    state
}
