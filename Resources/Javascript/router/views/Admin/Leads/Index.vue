<template>
  <div>
    <h4 class="mb-3">
      Leads
    </h4>

    <div class="card">
      <div class="card-header bg-white">
        <div class="row">
          <div class="col-md-4">
            <quick-search
              ref="quickSearch"
              :items="allLeads"
            />
          </div>
          <div class="col-md-4">
            <RouterLink
              class="btn btn-block btn-primary"
              :to="{ name: 'AdminReportsIndex' }"
            >
              Exportar a XLS
            </RouterLink>
          </div>
          <div class="col-md-4">
            <RouterLink
              class="btn btn-block btn-primary"
              :to="{ name: 'AdminReportsIndex' }"
            >
              &larr; Volver a Reportes
            </RouterLink>
          </div>
        </div>
      </div>
      <div v-if="$refs.quickSearch">
        <dynamic-table
          v-if="$refs.quickSearch.filteredItems.length > 0"
          :columns="columns"
          :items="$refs.quickSearch.filteredItems"
          :per-page="12"
          :sort-direction="'desc'"
          :sort-key="'created_at'"
        />

        <div v-if="$refs.quickSearch.filteredItems.length === 0">
          <div class="card-body">
            <p class="mb-0">
              No hay resultados para mostrar.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { leadsComputed, leadsMethods } from "@linkre/store/helpers"

export default {
    data() {
        return {
            columns: {
                id: "Id.",
                first_name: "Nombre",
                last_name: "Apellido",
                email: "Email",
                created_at: "Registro",
            },
            prepared: false,
        }
    },

    computed: {
        ...leadsComputed
    },

    watch: {
        "$route" (value) {
            if (value.name === "AdminLeadsIndex" && this.prepared) {
                this.prepare()
            }
        }
    },

    created() {
        return this.prepare().then(this.prepared = true)
    },

    methods: {
        ...leadsMethods,

        prepare() {
            window.$(()=> {
                this.$refs.quickSearch.search = ""
            })

            var leads = this.fetchAllLeads()

            return Promise.all([leads])
        }
    }
}
</script>
