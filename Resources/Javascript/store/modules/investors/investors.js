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
                webmail: "",
            },
            document_number: "",
            document_type_id: "",
            email: "",
            featured_photo: {},
            first_name: "",
            investments: [],
            investor_profile: {
                consulting: 0,
                expertise: 0,
                investment_preferences: [],
                investment_type_id: "",
                investment_type: {},
                investment_value_id: "",
                investment_value: {},
                investor_type: {},
                investor_type_id: "",
                portfolio: 0,
                real_estate: 0,
                reit: 0,
            },
            investor_profile_id: "",
            last_name: "",
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
