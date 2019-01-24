<template>
  <div>
    <h4 class="mb-3">
      Editar Inversión: {{ shortenTitle(oneInvestment.name) }}
    </h4>
    <investment-form
      :action="'/api/investments/' + $route.params.id"
      :method="'put'"
    />
  </div>
</template>

<script>
import { investmentsComputed } from "../../../../store/helpers"
import { strLimit } from "@/utilities/helpers"

export default {
    data() {
        return {
            prepared: false,
        }
    },

    computed: {
        ...investmentsComputed
    },

    watch: {
        "$route" (value) {
            if (value.name === "AdminInvestmentsEdit" && this.prepared === false) {
                return this.prepare()
            }
        }
    },

    created() {
        return this.prepare()
    },

    methods: {
        shortenTitle(value) {
            return strLimit(value)
        },

        prepare() {
            return this.$store.dispatch("investments/fetchOneInvestment", this.$route.params.id).then(() => this.prepared = true)
        }
    },
}
</script>
