import actions from "./actions"
import getters from "./getters"
import mutations from "./mutations"

export function initialState()
{
    return {
        all: [],
        one: {
            contact: {
                phone: "",
                website: ""
            },
            description: "",
            featured_photo: {},
            name: "",
            slug: "",
            user_id: "",
        },
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
