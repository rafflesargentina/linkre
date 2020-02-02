<style lang="scss" scoped>
</style>

<template>
  <div>        
    <SiteHeader />

    <!-- CONTENT START -->
    <div class="page-content">
      <!-- INNER PAGE BANNER -->
      <div
        class="wt-bnr-inr overlay-wraper bg-parallax bg-top-center"
        data-stellar-background-ratio="0.5"
        style="background-image:url(images/encabezado_informes.jpg);"
      >
        <div class="overlay-main bg-black opacity-04" />
        <div class="container">
          <div class="wt-bnr-inr-entry">
            <div class="banner-title-outer">
              <div class="banner-title-name">
                <h2 class="text-white text-uppercase letter-spacing-5 font-18 font-weight-300">
                  Informes
                </h2>
              </div>
            </div>
            <!-- BREADCRUMB ROW -->                            
            <div class="p-tb20">
              <div>
                <ul class="wt-breadcrumb breadcrumb-style-2">
                  <li>
                    <RouterLink
                      :to="{ name: 'Home' }"
                    >
                      Home
                    </RouterLink>
                  </li>
                  <li>Informes</li>
                </ul>
              </div>
            </div>
            <!-- BREADCRUMB ROW END -->                        
          </div>
        </div>
      </div>
      <!-- INNER PAGE BANNER END -->
            
      <!-- SECTION CONTENT START -->
      <div class="section-full p-tb90">
        <div class="container">
          <div v-for="(row, index) in chunk(reports.filter(item => item.download == '1'), 3)" key="index" class="row">
            <div
              v-for="item in row"
              :key="item.id"
              class="col-sm-4"
            >
              <div class="blog-post">
                <div>
                  <a
                    href="#"
                    class="embed-responsive embed-responsive-1by1 text-black font-20 letter-spacing-4 font-weight-600"
                  >
                    <img
                      v-if="item.slug === 'prequin'"
                      class="embed-responsive-item"
                      style="object-fit:contain;"
                      :src="item.featured_photo.url"
                    >
                    <img
                      v-else
                      class="embed-responsive-item"
                      style="object-fit:cover;"
                      :src="item.featured_photo.url"
                    >
                  </a>
                </div>
                <div class="p-t30 text-black">
                  <div class="wt-post-title">
                    <h2 class="post-title">
                      <RouterLink
                        v-if="item.download"
                        :to="{ name: 'ReportsLanding', params: { id: item.id }}"
                        class="text-black font-20 letter-spacing-4 font-weight-600"
                      >
                        {{ item.title }}
                      </RouterLink>
                    </h2>
                  </div>
                  <div class="wt-post-meta">
                    <ul>
                      <li>
                        <strong>{{ item.published_at }}</strong>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <hr>

          <div v-for="(row, index) in chunk(reports.filter(item => item.download == '0'), 3)" key="index" class="row">
            <div
              v-for="item in row"
              :key="item.id"
              class="col-sm-4"
            >
              <div class="blog-post">
                <div>
                  <a
                    href="#"
                    class="embed-responsive embed-responsive-1by1 text-black font-20 letter-spacing-4 font-weight-600"
                  >
                    <img
                      v-if="item.slug === 'linkre'"
                      class="embed-responsive-item"
                      style="object-fit:contain;"
                      :src="item.featured_photo.url"
                    >

                    <img
                      v-else
                      class="embed-responsive-item"
                      style="object-fit:cover;"
                      :src="item.featured_photo.url"
                    >
                  </a>
                </div>
                <div class="p-t30 text-black">
                  <div class="wt-post-title">
                    <h2 class="post-title">
                      <RouterLink
                        :to="{ name: 'ReportsShow', params: { id: item.id }}"
                        class="text-black font-20 letter-spacing-4 font-weight-600"
                      >
                        {{ item.title }}
                      </RouterLink>
                    </h2>
                  </div>
                  <div class="wt-post-meta">
                    <ul>
                      <li>
                        <strong>{{ item.published_at }}</strong>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- SECTION CONTENT END  -->
    </div>
    <!-- CONTENT END -->
  </div>
</template>

<script>
import { reportsComputed, reportsMethods } from "@linkre/store/helpers"

import chunk from "lodash/chunk"

export default {
    data() {
        return {
            prepared: false,
            reports: [],
        }
    },

    computed: {
        ...reportsComputed
    },

    watch: {
        "$route" (value) {
            if (value.name === "ReportsIndex" && this.prepared) {
                return this.prepare()
            }
        }
    },

    created() {
        return this.prepare().then(this.prepared = true)
    },

    methods: {
        ...reportsMethods,

        chunk,

        prepare() {
            var reports = this.fetchPublishedReports()
                .then(value => {
                    if (value) {
                        this.reports = value
                    }

                    return value
                })

            return Promise.all([reports])
        }
    },
}
</script>
