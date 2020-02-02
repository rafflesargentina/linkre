import { mapActions, mapState } from "vuex"

export const articlesComputed = {
    ...mapState(
        "articles", {
            allArticles: state => state.all,
            oneArticle: state => state.one
        }
    ),
}

export const articlesMethods = {
    ...mapActions(
        "articles", [
            "deleteOneArticle",
            "fetchAllArticles",
            "fetchOneArticle"
        ]
    )
}

export const companiesComputed = {
    ...mapState(
        "companies", {
            allCompanies: state => state.all,
            oneCompany: state => state.one
        }
    ),
}

export const companiesMethods = {
    ...mapActions(
        "companies", [
            "deleteOneCompany",
            "fetchAllCompanies",
            "fetchOneCompany"
        ]
    )
}

export const developersComputed = {
    ...mapState(
        "developers", {
            allDevelopers: state => state.all,
            oneDeveloper: state => state.one
        }
    ),
}

export const developersMethods = {
    ...mapActions(
        "developers", [
            "deleteOneDeveloper",
            "fetchAllDevelopers",
            "fetchOneDeveloper",
            "mapOneInvestorTags",
        ]
    )
}

export const documentsComputed = {
    ...mapState(
        "documents", {
            allDocuments: state => state.all,
            oneDocument: state => state.one,
        }
    ),
}

export const documentsMethods = {
    ...mapActions(
        "documents", [
            "deleteOneDocument",
            "fetchAllDocuments",
            "fetchOneDocument"
        ]
    )
}

export const investmentPreferencesComputed = {
    ...mapState(
        "investmentPreferences", {
            allInvestmentPreferences: state => state.all,
            oneInvestmentPreference: state => state.one
        }
    ),
}

export const investmentPreferencesMethods = {
    ...mapActions(
        "investmentPreferences", [
            "deleteOneInvestmentPreference",
            "fetchAllInvestmentPreferences",
            "fetchOneInvestmentPreference"
        ]
    )
}

export const investmentTypesComputed = {
    ...mapState(
        "investmentTypes", {
            allInvestmentTypes: state => state.all,
            oneInvestmentType: state => state.one
        }
    ),
}

export const investmentTypesMethods = {
    ...mapActions(
        "investmentTypes", [
            "deleteOneInvestmentType",
            "fetchAllInvestmentTypes",
            "fetchOneInvestmentType"
        ]
    )
}

export const investmentValuesComputed = {
    ...mapState(
        "investmentValues", {
            allInvestmentValues: state => state.all,
            oneInvestmentValue: state => state.one
        }
    ),
}

export const investmentValuesMethods = {
    ...mapActions(
        "investmentValues", [
            "deleteOneInvestmentValue",
            "fetchAllInvestmentValues",
            "fetchOneInvestmentValue"
        ]
    )
}

export const investmentsComputed = {
    ...mapState(
        "investments", {
            allInvestments: state => state.all,
            oneInvestment: state => state.one
        }
    ),
}

export const investmentsMethods = {
    ...mapActions(
        "investments", [
            "deleteOneInvestment",
            "fetchAllInvestments",
            "fetchOneInvestment"
        ]
    )
}

export const investmentViewsComputed = {
    ...mapState(
        "investmentViews", {
            allInvestmentViews: state => state.all,
            investmentViewsCount: state => state.count,
            lastCreatedInvestmentView: state => state.lastCreated,
            oneInvestmentView: state => state.one,
        }
    ),
}

export const investmentViewsMethods = {
    ...mapActions(
        "investmentViews", [
            "createOneInvestmentView",
            "deleteOneInvestmentView",
            "fetchAllInvestmentViews",
            "fetchInvestmentViewsCount",
            "fetchOneInvestmentView"
        ]
    )
}

export const investorsComputed = {
    ...mapState(
        "investors", {
            allInvestors: state => state.all,
            oneInvestor: state => state.one
        }
    ),
}

export const investorsMethods = {
    ...mapActions(
        "investors", [
            "deleteOneInvestor",
            "fetchAllInvestors",
            "fetchOneInvestor",
            "mapOneInvestmentTags",
        ]
    )
}

export const investorTypesComputed = {
    ...mapState(
        "investorTypes", {
            allInvestorTypes: state => state.all,
            oneInvestorType: state => state.one
        }
    ),
}

export const investorTypesMethods = {
    ...mapActions(
        "investorTypes", [
            "deleteOneInvestorType",
            "fetchAllInvestorTypes",
            "fetchOneInvestorType"
        ]
    )
}

export const leadsComputed = {
    ...mapState(
        "leads", {
            allLeads: state => state.all,
            oneLead: state => state.one
        }
    ),
}

export const leadsMethods = {
    ...mapActions(
        "leads", [
            "deleteOneLead",
            "fetchAllLeads",
            "fetchOneLead",
        ]
    )
}

export const promotersComputed = {
    ...mapState(
        "promoters", {
            allPromoters: state => state.all,
            onePromoter: state => state.one
        }
    ),
}

export const promotersMethods = {
    ...mapActions(
        "promoters", [
            "deleteOnePromoter",
            "fetchAllPromoters",
            "fetchOnePromoter"
        ]
    )
}

export const reportsComputed = {
    ...mapState(
        "reports", {
            allReports: state => state.all,
            draftReports: state => state.draft,
            oneReport: state => state.one,
            publishedReports: state => state.published
        }
    ),
}

export const reportsMethods = {
    ...mapActions(
        "reports", [
            "deleteOneReport",
            "fetchAllReports",
            "fetchDraftReports",
            "fetchOneReport",
            "fetchPublishedReports",
        ]
    )
}
