import actions from "./actions"
import getters from "./getters"
import mutations from "./mutations"

export function initialState()
{
    return {
        all: [],
        one: {
            address: {},
            contact: {},
            document_number: "",
            document_type_id: "",
            email: "",
            featured_photo: {},
            first_name: "",
            last_name: "",
            map: {},
            password: "",
            password_confirmation: "",
            slug: "",
        },
        oneInvestorMappedTags: [],
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
