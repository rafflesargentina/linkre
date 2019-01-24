<template>
  <div>
    <h4 class="mb-3">
      Proyectos
    </h4>

    <div class="card">
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
              <span class="fa fa-plus pr-2" />Nuevo Proyecto
            </router-link>
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
              @click="destroyRecordConfirmation('/api/investments/' + item.id, item.id)"
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
import { investmentsComputed, investmentsMethods } from "../../../../store/helpers"

export default {
    data() {
        return {
            prepared: false,
            columns: {
                id: "Id.",
                name: "Nombre",
                location: "Ubicación",
                created_at: "Creación",
            }
        }
    },

    computed: {
        ...investmentsComputed
    },

    watch: {
        "$route" (value) {
            if (value.name === "InvestmentsIndex" && this.prepared === false) {
                return this.prepare()
            }
        }
    },

    created() {
        return this.prepare()
    },

    methods: {
        ...investmentsMethods,

        prepare() {
            return this.$store.dispatch("investments/fetchAllInvestments").then(() => this.prepared = true)
        }
    }
}
</script>
