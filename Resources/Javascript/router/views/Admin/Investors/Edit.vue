<template>
  <div>
    <h4>
      Editar Investor: {{ strLimit(oneInvestor.name) }}
    </h4>
    <InvestorForm 
      :method="'put'" 
      :action="'/api/investors/' + this.$route.params.id"
    />
  </div>
</template>

<script>
import { investorsComputed } from "@linkre/store/helpers"
import { strLimit } from "@/utilities/helpers"

export default {
    computed: {
        ...investorsComputed
    },

    methods: {
        strLimit
    }
}
</script>
