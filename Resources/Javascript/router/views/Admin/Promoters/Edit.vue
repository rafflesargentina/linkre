<template>
  <div>
    <h4 class="mb-3">
      Editar Desarrolladora: {{ strLimit(onePromoter.name) }}
    </h4>
    <PromoterForm
      :action="'/api/promoters/' + $route.params.id"
      :method="'put'"
    />
  </div>
</template>

<script>
import { promotersComputed } from "@linkre/store/helpers"
import { strLimit } from "@/utilities/helpers"

export default {
    computed: {
        ...promotersComputed,
    },

    methods: {
        strLimit,
    }
}
</script>
