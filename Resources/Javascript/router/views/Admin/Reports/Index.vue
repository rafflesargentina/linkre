<template>
  <div>
    <h4 class="mb-3">
      Informes
    </h4>

    <div class="card">
      <div class="card-header bg-white">
        <div class="row">
          <div class="col-md-5">
            <quick-search
              ref="quickSearch"
              :items="allReports"
            />
          </div>
          <div class="col-md-3">
            <RouterLink
              class="btn btn-block btn-primary text-white"
              :to="{ name: 'AdminLeadsIndex' }"
            >
              Leads
            </RouterLink>
          </div>

          <div class="col-md-3">
            <RouterLink
              class="btn btn-block btn-primary text-white"
              :to="{ name: 'AdminReportsCreate' }"
            >
              <span class="fa fa-plus pr-2" />Nuevo Informe
            </RouterLink>
          </div>
        </div>
      </div>
      <div v-if="$refs.quickSearch">
        <dynamic-table
          v-if="$refs.quickSearch.filteredItems.length > 0"
          :columns="columns"
          :items="$refs.quickSearch.filteredItems"
          :per-page="50"
          :sortd-direction="'desc'"
          :sort-key="'updated_at'"
        >
          <th 
            slot="th" 
            class="th--acciones"
          >
            Acciones
          </th>
          <td 
            slot="td" 
            slot-scope="item"
          >
            <RouterLink 
              :to="{ name: 'AdminReportsEdit', params: { id: item.id } }" 
              class="mr-2"
            >
              <span class="fa fa-pencil pr-1" />Editar
            </RouterLink>
            <a 
              href="#" 
              @click="destroyRecord('/api/reports/' + item.id, item.id)"
            >
              <span class="fa fa-trash pr-1" />Borrar
            </a>
          </td>
        </dynamic-table>

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
import { alertDestroyRecordConfirmation } from "@/utilities/helpers"
import { reportsComputed, reportsMethods } from "@linkre/store/helpers"
import { EventBus } from "@/eventBus"

export default {
    data() {
        return {
            columns: {
                id: "Id.",
                title: "Titulo",
                published: "¿Publicado?",
                created_at: "Creación",
                updated_at: "Actualización"
            },
            prepared: false,
        }
    },

    computed: {
        ...reportsComputed
    },

    watch: {
        "$route" (value) {
            if (value.name === "AdminReportsIndex" && this.prepared) {
                this.$refs.quickSearch.search = ""
                return this.prepare()
            }
        }
    },

    created() {
        EventBus.$on("report-saved", ()=> {
            this.prepare()
        })

        return this.prepare().then(this.prepared = true)
    },

    methods: {
        ...reportsMethods,

        async destroyRecord(url, id) {
            return await alertDestroyRecordConfirmation(url, id)
                .then(this.prepare())
        },

        async prepare() {
            return await this.fetchAllReports()
        }
    }
}
</script>
