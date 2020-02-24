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
            featured: "",
            featured_photo: {},
            financial: {
                adquisition_cost: 0,
                apr: 0,
                bank: 0,
                crowdfunding: 0,
                development_cost: 0,
                ehp: 0,
                equity: 0,
                funded: 0,
                irr: 0,
                mezzanine_debt: 0,
                open_offer: 0,
                senior_debt: 0,
            },
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
