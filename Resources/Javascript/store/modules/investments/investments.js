import actions from "./actions"
import getters from "./getters"
import mutations from "./mutations"

export function initialState()
{
    return {
        all: [],
        featured: [],
        nonFeatured: [],
        mappedCityTags: [],
        one: {
            amenities: "",
            city: "",
            company_id: "",
            country: "",
            context: "",
            description: "",
            developer_id: "",
            featured: "",
            financial: {},
            name: "",
            promoter_id: "",
            published: "",
            published_at: "",
            resume: "",
            slug: "",
            state: "",
            total_area: "",
            website: "",
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
