<template>
  <div>
    <h4 class="mb-3">
      Editar Inversión: {{ strLimit(oneInvestment.name) }}
    </h4>
    <InvestmentForm
      :action="'/api/investments/' + $route.params.id"
      :method="'put'"
    />
  </div>
</template>

<script>
import { investmentsComputed } from "@linkre/store/helpers"
import { strLimit } from "@/utilities/helpers"

export default {
    computed: {
        ...investmentsComputed
    },

    methods: {
        strLimit
    }
}
</script>
