<template>
  <div>
    <h4 class="mb-3">
      Editar Constructora: {{ strLimit(oneCompany.name) }}
    </h4>
    <CompanyForm
      :action="'/api/companies/' + $route.params.id"
      :method="'put'"
    />
  </div>
</template>

<script>
import { companiesComputed } from "@linkre/store/helpers"
import { strLimit } from "@/utilities/helpers"

export default {
    computed: {
        ...companiesComputed,
    },

    methods: {
        strLimit,
    }
}
</script>
