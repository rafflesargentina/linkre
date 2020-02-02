import actions from "./actions"
import getters from "./getters"
import mutations from "./mutations"

export function initialState()
{
    return {
        all: [],
        featured: [],
        nonFeatured: [],
        one: {
            address: {
                country: "",
                lat: "",
                lng: "",
                locality: "",
                state: "",
                sublocality: "", 
            },
            amenities: "",
            company_id: "",
            company: {},
            context: "",
            description: "",
            documents: [],
            developer_id: "",
            featured: "",
            featured_photo: {},
            financial: {},
            map: {
                lat: "",
                lng: "",
                zoom: 14,
            },
            name: "",
            promoter_id: "",
            promoter: {},
            published: "",
            published_at: "",
            resume: "",
            slug: "",
            total_area: "",
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
