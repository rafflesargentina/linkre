<template>
  <div>
    <h4>
      Datos del Investor: {{ strLimit(oneInvestor.name) }}
    </h4>

    <ul
      id="investor-pills"
      class="nav nav-pills mb-3"
      role="tablist"
    >
      <li class="nav-item">
        <a
          id="main-tab"
          aria-controls="main"
          aria-selected="true"
          class="nav-link active"
          data-toggle="tab"
          href="#main"
        >
          Actividades del Inversor
        </a>
      </li>
    </ul>

    <div class="card shadow">
      <div
        class="tab-content"
      >
        <div
          id="main"
          class="tab-pane fade show active"
          role="tabpanel"
          aria-labelledby="main-tab"
        >
          <div class="card-header bg-white p-2 p-md-4">
            <h5 class="text-primary m-0">
              Actividades del Inversor
            </h5>
          </div>

          <div class="card-body">
            <div
              v-for="feed in oneInvestor.feeds"
              :key="feed.id"
            >
              <vue-timeline-update
                theme="dark"
                :date="new Date(moment(feed.created_at))"
                :title="feed.title"
                :description="feed.description"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { investorsComputed, investorsMethods } from "@linkre/store/helpers"
import { strLimit } from "@/utilities/helpers"

import moment from "moment"

export default {
    data() {
        return {
            prepared: false,
        }
    },

    computed: {
        ...investorsComputed
    },

    created() {
        return this.prepare().then(this.prepared = true)
    },

    methods: {
        ...investorsMethods,

        moment,

        prepare() {
            var investor = this.fetchOneInvestor(this.$route.params.id)

            return Promise.all([investor])
        },

        strLimit
    }
}
</script>
