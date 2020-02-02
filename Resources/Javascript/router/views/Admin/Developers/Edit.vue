<template>
  <div>
    <h4>
      Editar Promotor: {{ strLimit(oneDeveloper.name) }}
    </h4>
    <DeveloperForm 
      :method="'put'" 
      :action="'/api/developers/' + this.$route.params.id"
    />
  </div>
</template>

<script>
import { developersComputed } from "@linkre/store/helpers"
import { strLimit } from "@/utilities/helpers"

export default {
    data() {
        return {
            prepared: false,
        }
    },

    computed: {
        ...developersComputed
    },

    watch: {
        "$route" (value) {
            if (value.name === "AdminDevelopersEdit" && this.prepared) {
                this.prepare()
            }
        }
    },

    created() {
        return this.prepare().then(this.prepared = true)
    },

    methods: {
        prepare() {
            var oneDeveloper = this.$store.dispatch("developers/fetchOneDeveloper", this.$route.params.id)
            var documentTypes = this.$store.dispatch("documentTypes/fetchAllDocumentTypes")
            var investors = this.$store.dispatch("investors/fetchAllInvestors")

            return Promise.all([oneDeveloper, documentTypes, investors])
        },

        strLimit,
    }
}
</script>
