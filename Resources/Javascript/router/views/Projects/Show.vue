<style>
.vue-map-container {
  height: 32rem;
}
</style>

<template>
  <div>
    <SiteHeader />
    <!-- CONTENT START -->
    <div class="page-content ">
      <!--Fade slider-->
      <div
        class="owl-carousel owl-fade-slider-one owl-btn-vertical-center owl-dots-bottom-right"
        style=""
      >
        <div
          v-for="photo in oneInvestment.unfeatured_photos"
          :key="photo.id"
          class="item"
        >
          <div class="aon-thum-bx">
            <img
              :src="photo.url"
              alt=""
              style="background-size:cover;height:32rem;"
            >
          </div>
        </div>
      </div>

      <!-- SECTION CONTENTG START -->
      <div
        class="section-full p-b80 p-t40"
      >
        <!-- LOCATION BLOCK-->
        <div class="container">
          <div
            class="row"
          >
            <div class="col-12">
              <div class="m-b50">
                <div class="mb-5">
                  <h1 class="mb-3">
                    {{ oneInvestment.name }}
                  </h1>
                  <div class="wt-separator-outer">
                    <div class="wt-separator bg-black" />
                  </div>
                </div>

                <div class="section-content">
                  <ul
                    id="investmentTabs"
                    class="nav nav-pills mb-3"
                    role="tablist"
                  >
                    <li class="nav-item">
                      <a
                        id="company-tab"
                        class="nav-link active"
                        data-toggle="tab"
                        href="#company"
                        role="tab"
                        aria-controls="company"
                        aria-selected="true"
                      >
                        Desarrollista
                      </a>
                    </li>
                    <li class="nav-item">
                      <a
                        id="promoter-tab"
                        class="nav-link"
                        data-toggle="tab"
                        href="#promoter"
                        role="tab"
                        aria-controls="promoter"
                        aria-selected="false"
                      >
                        Promotor
                      </a>
                    </li>
                    <li class="nav-item">
                      <a
                        id="product-tab"
                        class="nav-link"
                        data-toggle="tab"
                        href="#product"
                        role="tab"
                        aria-controls="product"
                        aria-selected="false"
                      >
                        Producto
                      </a>
                    </li>
                    <li class="nav-item">
                      <a
                        id="context-tab"
                        :class="{ 'disabled': oneInvestment.context === null }"
                        class="nav-link"
                        data-toggle="tab"
                        href="#context"
                        role="tab"
                        aria-controls="context"
                        aria-selected="false"
                      >
                        Contexto
                      </a>
                    </li>
                    <li class="nav-item">
                      <a
                        id="financial-tab"
                        :class="{ 'disabled': oneInvestment.financial === null }"
                        class="nav-link"
                        data-toggle="tab"
                        href="#financial"
                        role="tab"
                        aria-controls="financial"
                        aria-selected="false"
                      >
                        Financial
                      </a>
                    </li>
                    <li class="nav-item">
                      <a
                        id="downloads-tab"
                        class="nav-link"
                        data-toggle="tab"
                        href="#downloads"
                        role="tab"
                        aria-controls="downloads"
                        aria-selected="false"
                      >
                        Descargas
                      </a>
                    </li>
                  </ul>

                  <div
                    id="investmentTabsContent"
                    class="tab-content"
                  >
                    <div
                      v-if="oneInvestment.company"
                      id="company"
                      class="tab-pane fade show active"
                      role="tabpanel"
                      aria-labelledby="company-tab"
                    >
                      <div class="mb-3">
                        <h2 class="mb-0">
                          {{ oneInvestment.company.name }}
                        </h2>
                        <div class="wt-separator-outer">
                          <div class="wt-separator bg-black" />
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div
                            class="text-font-sz mb-5"
                            v-html="oneInvestment.company.description"
                          />
                          <div class="text-font-sz">
                            Sitio web: <a :href="oneInvestment.company.contact.website">
                              {{ oneInvestment.company.contact.website }}
                            </a>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div
                            v-if="oneInvestment.company.video"
                            class="embed-responsive embed-responsive-16by9"
                          >
                            <iframe
                              class="embed-responsive-item"
                              :src="oneInvestment.company.video"
                              allowfullscreen
                            />
                          </div>
                        </div>
                      </div>
                    </div>

                    <div
                      v-if="oneInvestment.promoter"
                      id="promoter"
                      class="tab-pane fade show"
                      role="tabpanel"
                      aria-labelledby="promoter-tab"
                    >
                      <div class="mb-3">
                        <h2 class="mb-0">
                          {{ oneInvestment.promoter.name }}
                        </h2>
                        <div class="wt-separator-outer">
                          <div class="wt-separator bg-black" />
                        </div>
                      </div>
                      <div
                        class="text-font-sz mb-5"
                        v-html="oneInvestment.promoter.description"
                      />
                      <div class="text-font-sz">
                        Sitio web: <a :href="oneInvestment.promoter.contact.website">
                          {{ oneInvestment.promoter.contact.website }}
                        </a>
                      </div>
                    </div>

                    <div
                      id="product"
                      class="tab-pane fade show"
                      role="tabpanel"
                      aria-labelledby="product-tab"
                    >
                      <div class="mb-3">
                        <h2 class="mb-0">
                          Producto
                        </h2>
                        <div class="wt-separator-outer">
                          <div class="wt-separator bg-black" />
                        </div>
                      </div>

                      <div
                        class="text-font-sz mb-5"
                        v-html="oneInvestment.description"
                      />

                      <gmap-map
                        ref="map"
                        class="mb-5"
                        :center="center"
                        :zoom="14"
                      >
                        <gmap-marker
                          ref="marker"
                          :position="center"
                        />
                      </gmap-map>

                      <div class="mb-3">
                        <h3 class="mb-0">
                          Resumen
                        </h3>
                        <div class="wt-separator-outer">
                          <div class="wt-separator bg-black" />
                        </div>
                      </div>

                      <div
                        class="text-font-sz mb-5"
                        v-html="oneInvestment.resume"
                      />

                      <div class="mb-3">
                        <h3 class="mb-0">
                          Galería de fotos
                        </h3>
                        <div class="wt-separator-outer">
                          <div class="wt-separator bg-black" />
                        </div>
                      </div>

                      <div class="owl-carousel portfolio-carousel-nogap mfp-gallery gallery owl-btn-vertical-center">
                        <div
                          v-for="photo in oneInvestment.unfeatured_photos"
                          :key="photo.id"
                          class="item"
                        >
                          <div class="ow-portfolio">
                            <div class="ow-portfolio-img wt-img-overlay1 wt-img-effect zoom-slow">
                              <img
                                :src="photo.url"
                                alt=""
                                style="height:16rem;object-fit:cover;"
                              >
                              <div class="overlay-bx">
                                <div class="overlay-icon">
                                  <a
                                    :href="photo.url"
                                    class="mfp-link"
                                  >
                                    <i class="fa fa-search-plus wt-icon-box-xs" />
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div
                      id="context"
                      class="tab-pane fade show"
                      role="tabpanel"
                      aria-labelledby="context-tab"
                    >
                      <div class="mb-3">
                        <h2 class="mb-0">
                          Contexto
                        </h2>
                        <div class="wt-separator-outer">
                          <div class="wt-separator bg-black" />
                        </div>
                      </div>
                      <div
                        class="text-font-sz mb-5"
                        v-html="oneInvestment.context"
                      />
                    </div>

                    <div
                      v-if="oneInvestment.financial"
                      id="financial"
                      class="tab-pane fade show"
                      role="tabpanel"
                      aria-labelledby="financial-tab"
                    >
                      <div class="mb-3">
                        <h2 class="mb-0">
                          Financial
                        </h2>
                        <div class="wt-separator-outer">
                          <div class="wt-separator bg-black" />
                        </div>
                      </div>

                      <div class="row mb-5 justify-content-center align-items-center">
                        <div class="col-md-4 offset-md-1">
                          <pie-chart
                            :donut="true"
                            :data="[['Financiado', oneInvestment.financial.funded], ['Restante', (oneInvestment.financial.open_offer - oneInvestment.financial.funded)]]"
                            legend="left"
                          />
                        </div>
                        <div class="col-md-6 offset-md-1">
                          <div class="card">
                            <div class="card-header bg-dark text-white text-uppercase">
                              Retornos
                            </div>
                            <table class="table table-condensed">
                              <tbody class="lead">
                                <tr>
                                  <th>Oferta abierta</th>
                                  <td>{{ formatMoney(oneInvestment.financial.open_offer) }}</td>
                                </tr>
                                <tr>
                                  <th>Financiado</th>
                                  <td>{{ formatMoney(oneInvestment.financial.funded) }}</td>
                                </tr>
                                <tr>
                                  <th>Tasa Interna de Retorno</th>
                                  <td>{{ oneInvestment.financial.irr }} %</td>
                                </tr>
                                <tr>
                                  <th>Tasa Anual de Preferencia</th>
                                  <td>{{ oneInvestment.financial.apr }} %</td>
                                </tr>
                                <tr>
                                  <th>Período Estimado de Tenencia</th>
                                  <td>
                                    {{ oneInvestment.financial.ehp }} meses
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <hr>

                      <div class="row mb-5 justify-content-center align-items-center">
                        <div class="col-md-4 offset-md-1">
                          <pie-chart
                            :donut="true"
                            :data="[['Deuda Senior', oneInvestment.financial.senior_debt], ['Deuda Mezzanine', oneInvestment.financial.mezzanine_debt], ['Capital existente', oneInvestment.financial.equity]]"
                            legend="left"
                          />
                        </div>
                        <div class="col-md-6 offset-md-1">
                          <div class="card">
                            <div class="card-header bg-dark text-white text-uppercase">
                              Capitalización (USD)
                            </div>
                            <table class="table table-condensed">
                              <tbody class="lead">
                                <tr>
                                  <th>Deuda Senior</th>
                                  <td>{{ formatMoney(oneInvestment.financial.senior_debt) }}</td>
                                </tr>
                                <tr>
                                  <th>Deuda Mezzanine</th>
                                  <td>{{ formatMoney(oneInvestment.financial.mezzanine_debt) }}</td>
                                </tr>
                                <tr>
                                  <th>Capital existente</th>
                                  <td>{{ formatMoney(oneInvestment.financial.equity) }}</td>
                                </tr>
                                <tr>
                                  <th>Recursos totales</th>
                                  <td>{{ formatMoney(oneInvestment.financial.senior_debt + oneInvestment.financial.mezzanine_debt + oneInvestment.financial.equity) }}</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <hr>

                      <div class="row justify-content-center align-items-center">
                        <div class="col-md-4 offset-md-1">
                          <pie-chart
                            :donut="true"
                            :data="[['Desarrollo', oneInvestment.financial.development_cost], ['Adquisición', oneInvestment.financial.adquisition_cost]]"
                            legend="left"
                          />
                        </div>
                        <div class="col-md-6 offset-md-1">
                          <div class="card">
                            <div class="card-header bg-dark text-white text-uppercase">
                              Fondeo del Proyecto (USD)
                            </div>
                            <table class="table table-condensed">
                              <tbody class="lead">
                                <tr>
                                  <th>Adquisición</th>
                                  <td>{{ formatMoney(oneInvestment.financial.adquisition_cost) }}</td>
                                </tr>
                                <tr>
                                  <th>Desarrollo</th>
                                  <td>{{ formatMoney(oneInvestment.financial.development_cost) }}</td>
                                </tr>
                                <tr>
                                  <th>Costos totales</th>
                                  <td>{{ formatMoney(oneInvestment.financial.adquisition_cost + oneInvestment.financial.development_cost) }}</td>
                                </tr>
                                <tr>
                                  <th>Banco</th>
                                  <td>{{ oneInvestment.financial.bank }}</td>
                                </tr>
                                <tr>
                                  <th>Crowdfunding</th>
                                  <td>{{ oneInvestment.financial.crowdfunding }}</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div
                      id="downloads"
                      class="tab-pane fade show"
                      role="tabpanel"
                      aria-labelledby="downloads-tab"
                    >
                      <div class="mb-3">
                        <h2 class="mb-0">
                          Descargas
                        </h2>
                        <div class="wt-separator-outer">
                          <div class="wt-separator bg-black" />
                        </div>
                      </div>
                    </div>
                  </div>
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
import * as VueGoogleMaps from "vue2-google-maps"
import { formatMoney } from "@linkre/utilities/helpers"
import { investmentsComputed, investmentsMethods, investmentViewsComputed, investmentViewsMethods } from "@linkre/store/helpers"
import { pick } from "lodash"
import store from "@/store"

import "magnific-popup/dist/jquery.magnific-popup.min.js"

export default {
    data() {
        return {
            center: {},
            zoom: ""
        }
    },

    computed: {
        ...investmentsComputed,
        ...investmentViewsComputed,

        gmapApi: VueGoogleMaps.gmapApi,
    },

    watch: {
        "$route" (value) {
            if (this.lastCreatedInvestmentView) {
                this.deleteOneInvestmentView(this.lastCreatedInvestmentView.id)
            }

            if (value.name === "ProjectsShow") {
                return this.prepare()
            }
        }
    },

    beforeDestroy() {
        console.log("DESTROY")
        if (this.lastCreatedInvestmentView) {
            this.deleteOneInvestmentView(this.lastCreatedInvestmentView.id)
        }
    }, 

    created() {
        return this.prepare()
    },

    methods: {
        ...investmentsMethods,
        ...investmentViewsMethods,

        formatMoney,

        magnific_popup() {
            window.$(".mfp-gallery").magnificPopup({
                delegate: ".mfp-link",
                type: "image",
                tLoading: "Loading image #%curr%...",
                mainClass: "mfp-img-mobile",
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                },
                image: {
                    tError: "<a href=\"%url%\">The image #%curr%</a> could not be loaded.",
                }
            })
        },

        portfolio_nogap_carousel() {
            window.$(".portfolio-carousel-nogap").owlCarousel({
                loop:true,
                margin:0,
                nav:true,
                dots: false,
                navText: ["<i class=\"fa fa-angle-left\"></i>", "<i class=\"fa fa-angle-right\"></i>"],
                responsive:{
                    0:{
                        items:1
                    },
                    480:{
                        items:2
                    },
                    767:{
                        items:3
                    },
                    1000:{
                        items:3
                    }
                }
            })
        },

        prepare() {
            return this.fetchOneInvestment(this.$route.params.id)
                .then(()=> {
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
                    }),

                    this.setMap(),

                    this.portfolio_nogap_carousel(),
                    this.magnific_popup(),

                    this.createOneInvestmentView({ investment_id: this.$route.params.id, user_id: store.state.auth.user.id })
                })
        },

        setMap: function() {
            this.center = pick(this.oneInvestment.map, ["lat","lng"])
            this.zoom = this.oneInvestment.map.zoom
   
            if (this.gmapApi) {
                var maps = this.gmapApi.maps
                this.$refs.map.$mapPromise.then(map => {
                    this.bounds = new maps.LatLngBounds()
                    this.bounds.extend(this.center)

                    //map.fitBounds(this.bounds)
                    map.panToBounds(this.bounds)

                    return maps.event.trigger(map, "resize")
                })
                    .catch(map => {
                        console.error(map)
                    })
            }
        },
    }
}
</script>
