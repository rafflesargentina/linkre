import store from "@/store"

export const authRequired = (to, from, next) => {
    if (store.getters["auth/isAuthenticated"]) {
        return next()
    }

    var intended = to.fullpath !== "/logout" ? to.fullPath : "/"
    return next({name: "Login", query: { intended: encodeURI(intended) }})

}

export const authNotRequired = (to, from, next) => {
    if (!store.getters["auth/isAuthenticated"]) {
        return next()
    }

    return next({ name: "Home"})
}

export const canSeeInvestment = (to, from, next) => {
    if (store.getters["auth/isAuthenticated"] && (store.getters["auth/isAdmin"] || store.getters["auth/investments"].includes(to.params.id))) {
        return next()
    }

    return next({ name: "Unauthorized" })
}

export const mustBeDeveloper = (to, from, next) => {
    var user = store.state.auth.user
    if (user.developer) {
        return next()
    }

    return next({ name: "Home" })
}

export const mustBeInvestor = (to, from, next) => {
    var user = store.state.auth.user
    if (user.investor) {
        return next()
    }

    return next({ name: "Home" })
}

export const mustCompleteProfile = (to, from, next) => {
    var user = store.state.auth.user
    if (user.investor) {
        if (!user.investor_profile) {
            return next({ name: "InvestorProfile" })
        }

        var investorProfileFields = [
            "consulting",
            "investment_type_id",
            "investment_value_id",
            "investor_type_id",
            "real_estate",
            "expertise",
            "portfolio",
            "reit",
        ]

        investorProfileFields.forEach(field => {
            if (user.investor_profile[field] === null || user.investor_profile[field] === "") {
                return next({ name: "InvestorProfile" })
            }
        })
    }

    if (user.developer) {
        if (!user.developer_profile) {
            return next({ name: "DeveloperProfile" })
        }

        var developerProfileFields = [
            "city",
            "career",
            "company",
            "country",
            "expertise",
            "project_description",
            "project_name",
        ]

        developerProfileFields.forEach(field => {
            if (user.developer_profile[field] === null || user.developer_profile[field] === "") {
                return next({ name: "DeveloperProfile" })
            }
        })
    }

    return next()
}
