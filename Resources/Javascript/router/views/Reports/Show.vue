<template>
  <div>
    <SiteHeader />
    <!-- CONTENT START -->
    <div class="page-content ">
      <!-- SECTION CONTENTG START -->
      <div
        class="section-full p-b80 p-t40"
      >
        <!-- LOCATION BLOCK-->
        <div class="container">
          <div class="m-b50">
            <div class="mb-3">
              <h1 class="mb-3">
                {{ oneReport.title }}
              </h1>
              <div class="wt-separator-outer">
                <div class="wt-separator bg-black" />
              </div>
            </div>

            <div class="row">
              <div class="col-md-8">
                <div v-if="oneReport.documents.length > 0">
                  <a
                    v-for="item in oneReport.documents"
                    :key="'documents-' + item.id"
                    :href="item.url"
                    target="_blank"
                    class="border-0 card mb-3"
                  >
                    <div class="row no-gutters">
                      <div class="col-sm-2 col-3">
                        <div class="bg-light embed-responsive embed-responsive-1by1">
                          <img
                            class="embed-responsive-item p-4"
                            :src="item.thumbnail"
                          >
                        </div>
                      </div>
                      <div class="col-sm-8 col-9">
                        <div class="card-body">
                          <h6 class="card-title mb-1"><span class="fa fa-download pr-2" />{{ item.location }}</h6>
                          <div class="card-text small text-muted">Tamaño: {{ item.size > 0 ? Math.ceil(item.size / 1024000) : 0 }} MB</div>
                          <div class="card-text small text-muted">Fecha: {{ new Date(item.created_at).toLocaleString() }}</div>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { reportsComputed, reportsMethods } from "@linkre/store/helpers"

export default {
    data() {
        return {
            prepared: false,
        }
    },

    computed: {
        ...reportsComputed
    },

    watch: {
        "$route" (value) {
            if (value.name === "ReportsShow" && this.prepared) {
                return this.prepare()
            }
        }
    },

    created() {
        return this.prepare().then(this.prepared = true)
    },

    methods: {
        ...reportsMethods,

        prepare() {
            return this.fetchOneReport(this.$route.params.id)
                .then(() => {
                    return window.$(".owl-fade-slider-one").owlCarousel({
                        loop:true,
                        autoplay:true,
                        autoplayTimeout:2000,
                        margin:30,
                        nav:true,
                        navText: ["<i class=\"fa fa-angle-left\"></i>", "<i class=\"fa fa-angle-right\"></i>"],
                        items:1,
                        dots: true,
                        animateOut:"fadeOut",
                    })
                })
        }
    }
}
</script>
