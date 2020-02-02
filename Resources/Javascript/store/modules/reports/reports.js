import actions from "./actions"
import getters from "./getters"
import mutations from "./mutations"

export function initialState()
{
    return {
        all: [],
        draft: [],
        one: {
            body: "",
            documents: [],
            download: 0,
            featured_photo: {},
            title: "",
            slug: "",
            published: 1,
            published_at: "",
            user: {},
            user_id: ""
        },
        published: [],
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
