<template>
  <div>
    <h4 class="mb-3">
      Inversiones
    </h4>

    <div class="card shadow">
      <div class="card-header bg-white">
        <div class="row">
          <div class="col-md-5">
            <quick-search
              ref="quickSearch"
              :items="allInvestments"
            />
          </div>
          <div class="col-md-3 offset-md-4">
            <router-link
              class="btn btn-block btn-primary text-white"
              :to="{ name: 'AdminInvestmentsCreate' }"
            >
              <span class="fa fa-plus pr-2" />Nueva Inversión
            </router-link>
          </div>
        </div>
      </div>
      <div v-if="$refs.quickSearch">
        <dynamic-table
          v-if="$refs.quickSearch.filteredItems.length > 0"
          :columns="columns"
          :items="$refs.quickSearch.filteredItems"
          :per-page="50"
          :sort-direction="'desc'"
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
            <router-link 
              :to="{ name: 'AdminInvestmentsEdit', params: { id: item.id } }" 
              class="mr-2"
            >
              <span class="fa fa-pencil pr-1" />Editar
            </router-link>
            <a 
              href="#" 
              @click="destroyRecord('/api/investments/' + item.id, item.id)"
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
import { EventBus } from "@/eventBus"
import { investmentsComputed, investmentsMethods } from "@linkre/store/helpers"

export default {
    data() {
        return {
            prepared: false,
            columns: {
                id: "Id.",
                name: "Nombre",
                created_at: "Creación",
                updated_at: "Actualización"
            }
        }
    },

    computed: {
        ...investmentsComputed
    },

    watch: {
        "$route" (value) {
            if (value.name === "AdminInvestmentsIndex" && this.prepared) {
                this.$refs.quickSearch.search = ""
                this.prepare()
            }
        }
    },

    created() {
        EventBus.$on("investment-saved", ()=> {
            this.prepare()
        })

        return this.prepare().then(this.prepared = true)
    },

    methods: {
        ...investmentsMethods,

        async destroyRecord(url, id) {
            return await alertDestroyRecordConfirmation(url, id)
                .then(()=> this.prepare())
        },

        async prepare() {
            return await this.fetchAllInvestments()
        }
    }
}
</script>
