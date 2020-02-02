<template>
  <div>
    <h4 class="mb-3">
      Nuevo Promotor (GP)
    </h4>
    <DeveloperForm 
      :method="'post'" 
      :action="'/api/developers'"
    />
  </div>
</template>

<script>
export default {
    data() {
        return {
            prepared: false,
        }
    },

    watch: {
        "$route" (value) {
            if (value.name === "AdminDevelopersCreate" && this.prepared) {
                this.prepare()
            }
        }
    },

    created() {
        return this.prepare().then(this.prepared = true)
    },

    methods: {
        prepare() {
            var reset = this.$store.dispatch("developers/reset")
            var documentTypes = this.$store.dispatch("documentTypes/fetchAllDocumentTypes")
            var investors = this.$store.dispatch("investors/fetchAllInvestors")

            return Promise.all([reset, documentTypes, investors])
        },
    }
}
</script>
