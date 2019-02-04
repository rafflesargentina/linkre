<template>
  <div>        
    <SiteHeader />
    <!-- CONTENT START -->
    <div class="page-content">
      <!-- INNER PAGE BANNER -->
      <div
        class="wt-bnr-inr overlay-wraper bg-parallax bg-top-center"
        data-stellar-background-ratio="0.5"
        style="background-image:url(images/banner/2.jpg);"
      >
        <div class="overlay-main bg-black opacity-07" />
        <div class="container">
          <div class="wt-bnr-inr-entry">
            <div class="banner-title-outer">
              <div class="banner-title-name">
                <h2 class="text-white text-uppercase letter-spacing-5 font-18 font-weight-300">
                  Conozca nuestros Proyectos
                </h2>
              </div>
            </div>
            <!-- BREADCRUMB ROW -->                            
            <div class="p-tb20">
              <div>
                <ul class="wt-breadcrumb breadcrumb-style-2">
                  <li>
                    <RouterLink :to="{ name: 'ProjectsIndex' }">
                      Home
                    </RouterLink>
                  </li>
                  <li>Proyectos</li>
                </ul>
              </div>
            </div>
            <!-- BREADCRUMB ROW END -->                        
          </div>
        </div>
      </div>
      <!-- INNER PAGE BANNER END -->
        
      <!-- SECTION CONTENT -->
      <div class="section-full p-tb30">
        <!-- GALLERY CONTENT START -->
        <div class="container-fluid">
          <div class="filter-wrap p-tb30">
            <ul class="masonry-filter link-style  text-uppercase">
              <li>
                <a
                  data-filter=".cat-1"
                  href="#"
                >
                  FILTROS
                </a>
              </li>
              <li class="active">
                <a
                  data-filter="*"
                  href="#"
                >
                  TODOS
                </a>
              </li>
              <li>
                <a
                  data-filter=".cat-1"
                  href="#"
                >
                  País
                </a>
              </li>
              <li>
                <a
                  data-filter=".cat-2"
                  href="#"
                >
                  Negocios de Aportación
                </a>
              </li>
              <li>
                <a
                  data-filter=".cat-3"
                  href="#"
                >
                  Negocios de Participación
                </a>
              </li>
              <li>
                <a
                  data-filter=".cat-4"
                  href="#"
                >
                  Negocios Alternativos
                </a>
              </li>
              <li>
                <a
                  data-filter=".cat-5"
                  href="#"
                >
                  Monto
                </a>
              </li>
            </ul>
          </div>
          <div class="portfolio-wrap mfp-gallery work-masonry clearfix">
            <masonry
              :cols="3"
              :gutter="30"
            >
              <div
                v-for="item in allInvestments"
                :key="item.id"
                class="masonry-item m-b30"
              >
                <div class="wt-img-effect ">
                  <img
                    :src="item.featured_photo.url"
                  >
                  <div class="overlay-bx-2 ">
                    <div class="line-amiation  p-a40">
                      <div class="text-white">
                        <h2>
                          <RouterLink
                            :to="{ name: 'ProjectsShow', params: { id: item.id }}"
                            class="text-white font-24 font-weight-300"
                          >
                            {{ item.name }} - {{ item.location }}
                          </RouterLink>
                        </h2>
                        <RouterLink
                          :to="{ name: 'ProjectsShow', params: { id: item.id }}"
                          class="v-button letter-spacing-4 font-12 text-uppercase p-l20"
                        >
                          Leer más
                        </RouterLink>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </masonry>
          </div>
        </div>
        <!-- GALLERY CONTENT END -->
      </div>
      <!-- SECTION CONTENT END -->
    </div>
    <!-- CONTENT END -->
  </div>
</template>

<script>
import { investmentsComputed, investmentsMethods } from "../../../store/helpers"

export default {
    data() {
        return {
            prepared: false
        }
    },

    computed: {
        ...investmentsComputed
    },

    watch: {
        "$route" (value) {
            if (value.name === "ProjectsIndex" && this.prepared === false) {
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
            return this.fetchAllInvestments().then(()=> this.prepared = true)
        }
    },
}
</script> 
