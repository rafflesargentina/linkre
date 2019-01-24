import { mapActions, mapState } from "vuex"

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
            "fetchAllInvestments",
            "fetchOneInvestment"
        ]
    )
}
