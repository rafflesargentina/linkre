<template>
  <div class="d-table full-height w-100">
    <div class="align-middle d-table-cell h-100 text-center">
      <h4 class="display-4">
        ¡Gracias por dejarnos sus datos!
      </h4>

      <p>
        Si la descarga no comienza automáticamente en 5 segundos haga click <a
          v-if="oneReport.id"
          href="#"
        >aquí</a><span v-else>aquí</span>
      </p>
    </div>
  </div>
</template>

<script>
import { reportsComputed, reportsMethods } from "@linkre/store/helpers"

export default {
    computed: {
        ...reportsComputed
    },

    created() {
        var report = this.fetchOneReport(this.$route.params.id)

        return Promise.all([report])
    },

    methods: {
        ...reportsMethods,
    }
}
</script>
