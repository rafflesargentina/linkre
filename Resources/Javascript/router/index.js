import * as middleware from "./middleware"
import multiguard from "vue-router-multiguard"
import router from "@/router"

router.addRoutes(
    [
        {
            name: "About",
            path: "/nosotros",
            component: require("./views/About.vue")
        },
        {
            name: "Company",
            path: "/que-es-linkre",
            component: require("./views/Company.vue")
        },
        {
            children: [
                {
                    beforeEnter: middleware.authRequired,
                    component: require("./views/Admin/Dashboard"),
                    meta: {
                        footer: false,
                    },
                    name: "Dashboard",
                    path: "",
                },
                {
                    component: require("./views/Admin/Articles/Index.vue"),
                    beforeEnter: middleware.authRequired,
                    meta: {
                        footer: false,
                    },
                    name: "AdminArticlesIndex",
                    path: "/admin/articles"
                },
                {
                    beforeEnter: middleware.authRequired,
                    component: require("./views/Admin/Articles/Create.vue"),
                    meta: {
                        footer: false,
                    },
                    name: "AdminArticlesCreate",
                    path: "/admin/articles/create",
                },
                {
                    beforeEnter: middleware.authRequired,
                    component: require("./views/Admin/Articles/Edit.vue"),
                    meta: {
                        footer: false,
                    },
                    name: "AdminArticlesEdit",
                    path: "/admin/articles/:id/edit",
                },
                {
                    component: require("./views/Admin/Companies/Index.vue"),
                    beforeEnter: middleware.authRequired,
                    meta: {
                        footer: false,
                    },
                    name: "AdminCompaniesIndex",
                    path: "/admin/companies",
                },
                {
                    beforeEnter: middleware.authRequired,
                    component: require("./views/Admin/Companies/Create.vue"),
                    meta: {
                        footer: false,
                    },
                    name: "AdminCompaniesCreate",
                    path: "/admin/companies/create",
                },
                {
                    beforeEnter: middleware.authRequired,
                    component: require("./views/Admin/Companies/Edit.vue"),
                    meta: {
                        footer: false,
                    },
                    name: "AdminCompaniesEdit",
                    path: "/admin/companies/:id/edit",
                },
                {
                    component: require("./views/Admin/Developers/Index.vue"),
                    beforeEnter: middleware.authRequired,
                    meta: {
                        footer: false,
                    },
                    name: "AdminDevelopersIndex",
                    path: "/admin/developers",
                },
                {
                    beforeEnter: middleware.authRequired,
                    component: require("./views/Admin/Developers/Create.vue"),
                    meta: {
                        footer: false,
                    },
                    name: "AdminDevelopersCreate",
                    path: "/admin/developers/create",
                },
                {
                    beforeEnter: middleware.authRequired,
                    component: require("./views/Admin/Developers/Edit.vue"),
                    meta: {
                        footer: false,
                    },
                    name: "AdminDevelopersEdit",
                    path: "/admin/developers/:id/edit",
                },
                {
                    component: require("./views/Admin/Investments/Index.vue"),
                    beforeEnter: middleware.authRequired,
                    meta: {
                        footer: false,
                    },
                    name: "AdminInvestmentsIndex",
                    path: "/admin/investments",
                },
                {
                    beforeEnter: middleware.authRequired,
                    component: require("./views/Admin/Investments/Create.vue"),
                    meta: {
                        footer: false,
                    },
                    name: "AdminInvestmentsCreate",
                    path: "/admin/investments/create",
                },
                {
                    beforeEnter: middleware.authRequired,
                    component: require("./views/Admin/Investments/Edit.vue"),
                    meta: {
                        footer: false,
                    },
                    name: "AdminInvestmentsEdit",
                    path: "/admin/investments/:id/edit",
                },
                {
                    component: require("./views/Admin/Investors/Index.vue"),
                    beforeEnter: middleware.authRequired,
                    meta: {
                        footer: false,
                    },
                    name: "AdminInvestorsIndex",
                    path: "/admin/investors",
                },
                {
                    beforeEnter: middleware.authRequired,
                    component: require("./views/Admin/Investors/Create.vue"),
                    meta: {
                        footer: false,
                    },
                    name: "AdminInvestorsCreate",
                    path: "/admin/investors/create",
                },
                {
                    beforeEnter: middleware.authRequired,
                    component: require("./views/Admin/Investors/Edit.vue"),
                    meta: {
                        footer: false,
                    },
                    name: "AdminInvestorsEdit",
                    path: "/admin/investors/:id/edit",
                },
                {
                    beforeEnter: middleware.authRequired,
                    component: require("./views/Admin/Investors/Show.vue"),
                    meta: {
                        footer: false,
                    },
                    name: "AdminInvestorsShow",
                    path: "/admin/investors/:id",
                },
                {
                    beforeEnter: middleware.authRequired,
                    component: require("./views/Admin/Leads/Index.vue"),
                    meta: {
                        footer: false,
                    },
                    name: "AdminLeadsIndex",
                    path: "/admin/leads",
                },
                {
                    component: require("./views/Admin/Promoters/Index.vue"),
                    beforeEnter: middleware.authRequired,
                    meta: {
                        footer: false,
                    },
                    name: "AdminPromotersIndex",
                    path: "/admin/promoters",
                },
                {
                    beforeEnter: middleware.authRequired,
                    component: require("./views/Admin/Promoters/Create.vue"),
                    meta: {
                        footer: false,
                    },
                    name: "AdminPromotersCreate",
                    path: "/admin/promoters/create",
                },
                {
                    beforeEnter: middleware.authRequired,
                    component: require("./views/Admin/Reports/Index.vue"),
                    meta: {
                        footer: false,
                    },
                    name: "AdminReportsIndex",
                    path: "/admin/reports",
                },
                {
                    beforeEnter: middleware.authRequired,
                    component: require("./views/Admin/Reports/Create.vue"),
                    meta: {
                        footer: false,
                    },
                    name: "AdminReportsCreate",
                    path: "/admin/reports/create",
                },
                {
                    beforeEnter: middleware.authRequired,
                    component: require("./views/Admin/Reports/Edit.vue"),
                    meta: {
                        footer: false,
                    },
                    name: "AdminReportsEdit",
                    path: "/admin/reports/:id/edit",
                },
                {
                    beforeEnter: middleware.authRequired,
                    component: require("./views/Admin/Promoters/Edit.vue"),
                    meta: {
                        footer: false,
                    },
                    name: "AdminPromotersEdit",
                    path: "/admin/promoters/:id/edit",
                },
            ],
            component: require("./views/Admin/Admin.vue"),
            meta: {
                footer: false,
            },
            path: "/admin",
        },
        {
            name: "Contact",
            path: "/contactenos",
            component: require("./views/Contact.vue")
        },
        {
            name: "Develop",
            path: "/reuna-su-capital",
            component: require("./views/Develop.vue")
        },
        {
            beforeEnter: middleware.authNotRequired,
            component: require("./views/auth/DeveloperRegister.vue"),
            name: "DeveloperRegister",
            path: "/registrate-como-developer"
        },
        {
            name: "Home",
            path: "/",
            component: require("./views/Home.vue")
        },
        {
            name: "Invest",
            path: "/invierta-su-capital",
            component: require("./views/Invest.vue")
        },
        {
            beforeEnter: middleware.authNotRequired,
            component: require("./views/auth/InvestorRegister.vue"),
            name: "InvestorRegister",
            path: "/registrate-como-investor"
        },
        {
            beforeEnter: multiguard([middleware.authRequired, middleware.mustBeDeveloper]),
            component: require("./views/auth/DeveloperProfile.vue"),
            meta: {
                footer: false
            },
            name: "DeveloperProfile",
            path: "/developer-profile",
        },
        {
            beforeEnter: multiguard([middleware.authRequired, middleware.mustBeInvestor]),
            component: require("./views/auth/InvestorProfile.vue"),
            meta: {
                footer: false
            },
            name: "InvestorProfile",
            path: "/investor-profile",
        },
        {
            beforeEnter: middleware.authNotRequired,
            component: require("./views/auth/Login.vue"),
            meta: {
                footer: false
            },
            name: "Login",
            path: "/login"
        },
        {
            name: "NewsIndex",
            path: "/noticias",
            component: require("./views/News/Index.vue")
        },
        {
            name: "NewsShow",
            path: "/noticias/:id",
            component: require("./views/News/Show.vue")
        },
        {
            beforeEnter: middleware.authNotRequired,
            component: require("./views/auth/passwords/Reset.vue"),
            meta: {
                footer: false
            },
            name: "PasswordReset",
            path: "/password/reset/:token"
        },
        {
            beforeEnter: middleware.authNotRequired,
            component: require("./views/auth/passwords/Request.vue"),
            meta: {
                footer: false
            },
            name: "PasswordRequest",
            path: "/password/request"
        },
        {
            component: require("./views/PolicyOfPrivacy.vue"),
            name: "PolicyOfPrivacy",
            path: "/policy-of-privacy"
        },
        {
            name: "ProjectsIndex",
            path: "/proyectos",
            component: require("./views/Projects/Index.vue")
        },
        {
            beforeEnter: multiguard([middleware.authRequired, middleware.mustCompleteProfile]),
            name: "ProjectsShow",
            path: "/proyectos/:id",
            component: require("./views/Projects/Show.vue")
        },
        {
            beforeEnter: middleware.authNotRequired,
            component: require("./views/auth/Register.vue"),
            name: "Register",
            path: "/register"
        },
        {
            name: "ReportsIndex",
            path: "/informes",
            component: require("./views/Reports/Index.vue")
        },
        {
            //beforeEnter: multiguard([middleware.authRequired, middleware.mustCompleteProfile]),
            name: "ReportsShow",
            path: "/reportes/:id",
            component: require("./views/Reports/Show.vue")
        },
        {
            name: "ReportsDownload",
            path: "/landing-reportes/:id/descarga",
            component: require("./views/Reports/Download.vue")
        },
        {
            name: "ReportsLanding",
            path: "/landing-reportes/:id",
            component: require("./views/Reports/Landing.vue")
        },
        {
            component: require("./views/TermsAndConditions.vue"),
            name: "TermsAndConditions",
            path: "/terms-and-conditions"
        },
        {
            component: require("./views/Errors/Unauthorized.vue"),
            name: "Unauthorized",
            path: "/unauthorized",
        },
        {
            name: "PageNotFound",
            path: "*",
            component: require("./views/Errors/PageNotFound")
        },
    ]
)
