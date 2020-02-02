<template>
  <div>
    <h4 class="mb-3">
      Editar Reporte: {{ strLimit(oneReport.title) }}
    </h4>
    <ReportForm
      :action="'/api/reports/' + $route.params.id"
      :method="'put'"
    />
  </div>
</template>

<script>
import { reportsComputed } from "@linkre/store/helpers"
import { strLimit } from "@/utilities/helpers"

export default {
    computed: {
        ...reportsComputed
    },

    methods: {
        strLimit
    }
}
</script>
