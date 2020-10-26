<template>
  <div>
    <h4 class="mb-3">
      Noticias
    </h4>

    <div class="card">
      <div class="card-header bg-white">
        <div class="row">
          <div class="col-md-5">
            <quick-search
              ref="quickSearch"
              :items="allArticles"
            />
          </div>
          <div class="col-md-3 offset-md-4">
            <RouterLink
              class="btn btn-block btn-primary text-white"
              :to="{ name: 'AdminArticlesCreate' }"
            >
              <span class="fa fa-plus pr-2" />Nueva Noticia
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
            <RouterLink 
              :to="{ name: 'AdminArticlesEdit', params: { id: item.id } }" 
              class="mr-2"
            >
              <span class="fa fa-pencil pr-1" />Editar
            </RouterLink>
            <a 
              href="#" 
              @click="destroyRecord('/api/articles/' + item.id, item.id)"
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
import { articlesComputed, articlesMethods } from "@/store/helpers"
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
        ...articlesComputed
    },

    watch: {
        "$route" (value) {
            if (value.name === "AdminArticlesIndex" && this.prepared) {
                this.$refs.quickSearch.search = ""
                return this.prepare()
            }
        }
    },

    created() {
        EventBus.$on("article-saved", ()=> {
            this.prepare()
        })

        return this.prepare().then(this.prepared = true)
    },

    methods: {
        ...articlesMethods,

        async destroyRecord(url, id) {
            return await alertDestroyRecordConfirmation(url, id)
                .then(()=> this.prepare())
        },

        async prepare() {
            return await this.fetchAllArticles()
        }
    }
}
</script>
