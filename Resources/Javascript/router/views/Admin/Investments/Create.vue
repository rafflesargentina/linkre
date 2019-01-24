<template>
  <div>
    <h4 class="mb-3">
      Nueva Inversión
    </h4>
    <investment-form
      :action="'/api/investments'"
      :method="'post'"
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

    created() {
        return this.prepare()
    },

    methods: {
        prepare() {
            return this.$store.dispatch("investments/fetchOneInvestment", this.$route.params.id).then(() => this.prepared = true)
        }
    },
}
</script>
