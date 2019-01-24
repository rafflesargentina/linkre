
import * as middleware from "@/router/middleware"
import router from "@/router"

router.addRoutes(
    [
        {
            children: [
                {
                    beforeEnter: middleware.authRequired,
                    name: "AdminInvestmentsIndex",
                    path: "/admin/investments",
                    component: require("./views/Admin/Investments/Index.vue")
                },
                {
                    beforeEnter: middleware.authRequired,
                    name: "AdminInvestmentsCreate",
                    path: "/admin/investments/create",
                    component: require("./views/Admin/Investments/Create.vue")
                },
                {
                    beforeEnter: middleware.authRequired,
                    name: "AdminInvestmentsEdit",
                    path: "/admin/investments/:id/edit",
                    component: require("./views/Admin/Investments/Edit.vue")
                }
            ],
            component: require("./views/Admin/Admin.vue"),
            path: "/admin"
        },
    ]
)
