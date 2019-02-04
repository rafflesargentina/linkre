<template>
  <div>
    <!-- CONTENT START -->
    <div class="page-content">
      <!-- INNER PAGE BANNER -->
      <div
        class="wt-bnr-inr overlay-wraper bg-parallax bg-top-center"
        data-stellar-background-ratio="0.5"
        style="background-image:url(/images/main-slider/invertir-negocios.jpg); padding-top: 0px;"
      >
        <SiteHeader />
        <div
          class="container"
          style="height: 430px;"
        >
          <div class="wt-bnr-inr-entry">
            <div class="row">
              <h1
                class="text-uppercase letter-spacing-5 font-weight-300 text-center"
                style="font-size: 30px; line-height: 40px; color: #222222;"
              >
                LA PRIMERA PLATAFORMA DE CROWDLENDING PARA INVERSIONES PROFESIONALES DEL REAL ESTATE EN LATINOAMÉRICA
              </h1>
            </div>
            <br>
            <div
              class="row cont-responsive justify-content-center"
            >
              <div class="sub-responsive cont-b-responsive">
                <div class="sub-b-responsive right-responsive">
                  <RouterLink
                    :to="{ name: 'Invest' }"
                    class="m-b15 site-button black radius-no text-uppercase"
                  >
                    <span class="font-12 letter-spacing-5">
                      Invierta su capital
                    </span>
                  </RouterLink>
                </div>
                <div class="sub-b-responsive left-responsive">
                  <RouterLink
                    :to="{ name: 'Develop' }"
                    class="ornt-responsive m-b15 site-button black radius-no text-uppercase text-center"
                  >
                    <span
                      class="font-12 letter-spacing-5"
                      style=""
                    >
                      Reúna su capital
                    </span>
                  </RouterLink>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- INNER PAGE BANNER END -->

      <!-- WHO WE ARE SECTION START -->
      <div
        class="section-full p-t140 bg-repeat"
        style="background-image:url(images/background/ptn-1.png);"
      >
        <div class="container-fluid">
          <div class="section-content">
            <div class="row">
              <div class="col-lg-6 col-md-4 col-sm-12">
                <div class="wt-left-part">
                  <div class="text-black">
                    <span class="font-30 font-weight-300">
                      <b>Qué es LinkRE</b>
                    </span>
                    <h2 class="font-60" />
                    <p style="font-size: 18px; line-height: 34px;">
                      LinkRE es una plataforma que le permite como inversor descubrir y encontrar una amplia cartera de proyectos en distintas etapas de desarrollo, previamente pre certificados para que los inversores se incorporen aportando Equity o bien como socios u otorgando créditos sindicados (Lending), sin riesgos innecesarios y en cuatro fáciles pasos. Empiece a invertir ahora.
                    </p>
                    <RouterLink
                      :to="{ name: 'About' }"
                      class="btn-half site-button button-lg m-b15"
                    >
                      <span>Leer Más</span><em />
                    </RouterLink>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-8 col-sm-12">
                <div class="m-carousel-2">
                  <div class="owl-carousel carousel-hover home-carousel-2 owl-btn-vertical-center">
                    <!-- COLUMNS 1 -->
                    <div class="item">
                      <div class="wt-box">
                        <div class="ow-img wt-carousel-block gradi-black">
                          <img
                            src="images/projects/pic-1.jpg"
                            alt=""
                          >
                          <div class="p-a50 wt-carousel-info text-white dv-responsive">
                            <div>
                              <h2 class="font-28 font-weight-400 m-b10 tt-responsive">
                                Asistimos a los inversores
                              </h2>
                              <p class="m-b0">
                                Buscamos nuevas oportunidades en toda la región, para lo cual acompañamos al inversor en el armado de su cartera y con la pre calificación independiente de una auditora calificada para su tranquilidad.
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- COLUMNS 2 -->
                    <div class="item">
                      <div class="wt-box">
                        <div class="ow-img wt-carousel-block gradi-black">
                          <img
                            src="images/projects/pic-2.jpg"
                            alt=""
                          >
                          <div class="p-a50 wt-carousel-info text-white dv-responsive">
                            <div>
                              <h2 class="font-28 font-weight-400 m-b10 tt-responsive">
                                Regístrese como inversor
                              </h2>
                              <p class="m-b0">
                                Conozca todos nuestros proyectos en profundidad y tenga siempre disponible información actualizada del sector inmobiliario y financiero indispensable para la toma de decisiones.
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-bg-img">
                    <img
                      src="images/slider-corner.jpg"
                      alt=""
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- WHO WE ARE SECTION END -->

      <!-- BLOG SECTION START -->
      <div
        class="section-full p-t140 bg-repeat"
        style="background-image:url(/images/background/ptn-1.png);"
      >
        <div class="container">
          <div class="section-content">
            <!-- TITLE START -->
            <div class="section-head text-left">
              <h2 class="text-uppercase font-36">
                Proyectos Destacados
              </h2>
              <div class="wt-separator-outer">
                <div class="wt-separator bg-black" />
              </div>
            </div>
            <!-- TITLE END -->

            <div
              class="row"
            >
              <div class="col-md-6 col-sm-12">
                <div
                  v-for="(item,index) in investmentsFeaturedSlice"
                  v-if="index < 2"
                  :key="item.id"
                  class="overlay-wraper bg-no-repeat bg-cover latest-blog-dark-outer p-a20 m-b30"
                  :style="'background-image:url(' + item.featured_photo.url + ')'"
                >
                  <div class="latest-blog-dark text-uppercase p-a20">
                    <h3 class="m-a0">
                      <span class="text-white">
                        {{ item.name }}
                      </span>
                    </h3>
                    <div class="v-date  text-white font-weight-700">
                      {{ item.city || item.state }}
                    </div>
                    <RouterLink
                      :to="{ name: 'ProjectsShow', params: { id: item.id }}"
                      class="v-button letter-spacing-4 font-12 text-uppercase p-l20"
                    >
                      Ver Más &rarr;
                    </RouterLink>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div
                  v-for="(item,index) in investmentsFeaturedSlice"
                  v-if="index === 2"
                  :key="item.id"
                  class="overlay-wraper bg-no-repeat bg-cover latest-blog-dark-outer2 m-b30"
                  :style="'background-image:url(' + item.featured_photo.url + ');'"
                >
                  <div class="latest-blog-square text-uppercase text-white">
                    <h2 class="mt-0 m-b10">
                      <span class="text-white font-30">
                        {{ item.name }}
                      </span>
                    </h2>
                    <p class="font-weight-300">
                      {{ item.city || item.state }}
                    </p>
                    <a
                      href="javascript:;"
                      class="letter-spacing-4 font-12 text-white text-uppercase"
                    />
                    <div class="v-date  text-white font-weight-700 text-uppercase" />
                    <RouterLink
                      :to="{ name: 'ProjectsShow', params: { id: item.id }}"
                      class="v-button letter-spacing-4 font-12 text-uppercase p-l20"
                    >
                      Ver Más &rarr;
                    </RouterLink>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- BLOG SECTION END -->

      <div
        class="section-full p-t10 bg-repeat"
        style="background-image:url(/images/background/ptn-1.png);"
      >
        <div class="container">
          <div class="section-content">
            <div class="row">
              <div class="col-md-12 col-sm-12">
                <div class="section-head">
                  <h3>Opciones de Inversión</h3>
                  <div class="wt-separator-outer">
                    <div class="wt-separator bg-black" />
                  </div>
                </div>



                <div class="row p-lr15">
                  <div class="col-sm-4 col-md-4 col-lg-4 m-b40">
                    <div class="pricingtable-wrapper pricing-table-style-4">
                      <div class="pricingtable-inner bg-gray">
                        <div
                          class="overlay-wraper pricingtable-inner-overlay bg-no-repeat bg-cover"
                          style="background-image:url(/images/negocios-aportacion.jpg);"
                        >
                          <div class="pricingtable-title">
                            <h3 />
                          </div>
                          <div class="pricingtable-price">
                            <span
                              class="pricingtable-bx text-uppercase"
                              style="font-family:Poppins;font-weight: 600; font-size: 30px;    line-height: 46px;"
                            >
                              Negocios de aportación
                            </span>
                            <span class="pricingtable-type" />
                          </div>
                          <div class="overlay-main bg-black opacity-07" />
                        </div>


                        <div class="pricingtable-footer">
                          <a
                            href="javascript:void(0);"
                            class="site-button text-uppercase letter-spacing-2"
                          >
                            Ver Más
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-4 col-md-4 col-lg-4 m-b40">
                    <div class="pricingtable-wrapper pricing-table-style-4">
                      <div class="pricingtable-inner pricingtable-highlight bg-gray">
                        <div
                          class="overlay-wraper pricingtable-inner-overlay bg-no-repeat bg-cover"
                          style="background-image:url(/images/negocios-de-participacion.jpg);"
                        >
                          <div class="pricingtable-title">
                            <h3 />
                          </div>
                          <div class="pricingtable-price">
                            <span
                              class="pricingtable-bx text-uppercase"
                              style="font-family:Poppins;font-weight: 600; font-size: 30px;    line-height: 46px;"
                            >
                              Negocios de Participación
                            </span>
                            <span class="pricingtable-type" />
                          </div>
                          <div class="overlay-main bg-black opacity-07" />
                        </div>



                        <div class="pricingtable-footer">
                          <a
                            href="javascript:void(0);"
                            class="site-button text-uppercase letter-spacing-2"
                          >
                            Ver Más
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-4 col-md-4 col-lg-4 m-b40">
                    <div class="pricingtable-wrapper pricing-table-style-4">
                      <div class="pricingtable-inner bg-gray">
                        <div
                          class="overlay-wraper pricingtable-inner-overlay bg-no-repeat bg-cover"
                          style="background-image:url(/images/negocios-altenativos.jpg);"
                        >
                          <div class="pricingtable-title">
                            <h3 />
                          </div>
                          <div class="pricingtable-price">
                            <span
                              class="pricingtable-bx text-uppercase"
                              style="font-family:Poppins;font-weight: 600; font-size: 30px;    line-height: 46px;"
                            >
                              Negocios alternativos
                            </span>
                            <span class="pricingtable-type" />
                          </div>
                          <div class="overlay-main bg-black opacity-07" />
                        </div>




                        <div class="pricingtable-footer">
                          <a
                            href="javascript:void(0);"
                            class="site-button text-uppercase letter-spacing-2"
                          >
                            Ver más
                          </a>
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

      <!-- LATEST PRJECTS SLIDER START -->
      <!-- <div class="section-full p-t90 p-lr80 latest_project-outer square_shape3"> -->


      <!-- COMPANY DETAIL SECTION START -->
      <div
        class="section-full p-tb100 overlay-wraper bg-top-center bg-parallax"
        data-stellar-background-ratio="0.5"
        style="background-image:url(/images/gallery/imagen03.jpg);"
      >
        <div class="overlay-main opacity-08 bg-black" />
        <div class="container ">
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="some-facts">
                <div class="text-white text-uppercase">
                  <span class="font-40 font-weight-300">
                    Algunas
                  </span>
                  <h2 class="font-50">
                    Importantes Cifras
                  </h2>
                  <p class="font-18 font-weight-300">
                    La importancia de los datos radica en que éste impacta tanto en la industria, como en el negocio  y además ofrece una ventaja competitiva considerable.
                  </p>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-sm-12">
              <div class="row some-facts-counter">
                <div class="col-md-4 col-sm-4">
                  <div class="wt-icon-box-wraper p-a10 text-white m-b30">
                    <div class="icon-content text-center">
                      <div class="font-40 font-weight-600 m-b5">
                        <span class="counter">
                          451
                        </span>
                      </div>
                      <div class="wt-separator-outer m-b20">
                        <div class="wt-separator bg-white" />
                      </div>
                      <span class="text-uppercase">
                        Inversores
                      </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-4">
                  <div class="wt-icon-box-wraper p-a10 text-white m-b30">
                    <div class="icon-content text-center">
                      <div class="font-40 font-weight-600 m-b5">
                        <span class="counter">
                          532
                        </span>
                      </div>
                      <div class="wt-separator-outer m-b20">
                        <div class="wt-separator bg-white" />
                      </div>
                      <span class="text-uppercase">
                        Proyectos financiados
                      </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-4">
                  <div class="wt-icon-box-wraper p-a10 text-white m-b30">
                    <div class="icon-content text-center">
                      <div class="font-40 font-weight-600 m-b5">
                        <span class="counter">
                          40
                        </span>%
                      </div>
                      <div class="wt-separator-outer m-b20">
                        <div class="wt-separator bg-white" />
                      </div>
                      <span class="text-uppercase">
                        TIR Promedio
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- COMPANY DETAIL SECTION End -->

      <!-- LATEST PRJECTS SLIDER START -->
      <div class="section-full p-t90 p-lr80 latest_project-outer square_shape3">
        <!-- TITLE START -->
        <div class="section-head text-left">
          <div class="row">
            <div class="col-md-4">
              <h2 class="text-uppercase font-36">
                Últimos Proyectos
              </h2>
              <div class="wt-separator-outer">
                <div class="wt-separator bg-black" />
              </div>
            </div>
            <div class="col-md-8">
              <ul class="btn-filter-wrap">
                <li
                  class="btn-filter btn-active"
                  data-filter="*"
                >
                  <RouterLink
                    :to="{ name: 'ProjectsIndex' }"
                  >
                    Ver todos los proyectos
                  </RouterLink>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- TITLE END -->

        <!-- IMAGE CAROUSEL START -->
        <div class="section-content">
          <div class="owl-carousel owl-carousel-filter  owl-btn-bottom-left">
            <div
              v-for="item in allInvestments"
              :key="item.id"
              class="item fadingcol building-col"
            >
              <div class="wt-img-effect">
                <img
                  :src="item.featured_photo.url"
                  style="min-height:24rem;object-fit:cover;"
                >
                <div class="overlay-bx-2">
                  <div>
                    <div class="text-white font-weight-300 p-a40">
                      <div>
                        <h2>
                          <RouterLink
                            :to="{ name: 'ProjectsShow', params: { id: item.id }}"
                            class="text-white font-20 letter-spacing-4 text-uppercase"
                            style="word-break:break-word;"
                          >
                            {{ item.name }}
                          </RouterLink>
                        </h2>
                        <p class="font-weight-700">
                          {{ item.location }}
                        </p>
                      </div>
                      <RouterLink
                        :to="{ name: 'ProjectsShow', params: { id: item.id }}"
                        class="v-button letter-spacing-4 font-12 text-uppercase p-l20"
                      >
                        Ver Más &rarr;
                      </RouterLink>
                    </div>
                  </div>
                </div>
              </div>
              </di>
            </div>
          </div>
        </div>

        <br>
        <!-- CLIENT LOGO SECTION START -->
        <div class="section-full p-tb40 bg-black square_shape4">
          <div class="container">
            <div class="section-content">
              <!-- TESTIMONIAL 4 START ON BACKGROUND -->
              <div class="section-content">
                <div class="row">
                  <div class="col-md-5 col-sm-12">
                    <!-- TITLE START -->
                    <div class="text-left">
                      <h2 class="text-uppercase font-36 text-white">
                        Partners de Negocios
                      </h2>
                      <div class="wt-separator-outer">
                        <div class="wt-separator bg-white" />
                      </div>
                    </div>
                  <!-- TITLE END -->
                  </div>

                  <div class="col-md-7 col-sm-12">
                    <div class="section-content bg-white p-tb10">
                      <div class="owl-carousel home-client-carousel owl-btn-center-v">
                        <div class="item">
                          <div class="ow-client-logo">
                            <div class="client-logo client-logo-media">
                              <a href="javascript:void(0);">
                                <img
                                  src="/images/logos-partners/jll.png"
                                >
                              </a>
                            </div>
                          </div>
                        </div>

                        <div class="item">
                          <div class="ow-client-logo">
                            <div class="client-logo client-logo-media">
                              <a href="javascript:void(0);">
                                <img
                                  src="/images/logos-partners/deloitte.png"
                                  alt=""
                                >
                              </a>
                            </div>
                          </div>
                        </div>

                        <div class="item">
                          <div class="ow-client-logo">
                            <div class="client-logo client-logo-media">
                              <a href="javascript:void(0);">
                                <img
                                  src="/images/logos-partners/vizora-2.png"
                                  alt=""
                                >
                              </a>
                            </div>
                          </div>
                        </div>

                        <div class="item">
                          <div class="ow-client-logo">
                            <div class="client-logo client-logo-media">
                              <a href="javascript:void(0);">
                                <img
                                  src="/images/logos-partners/lennar.png"
                                  alt=""
                                >
                              </a>
                            </div>
                          </div>
                        </div>

                        <div class="item">
                          <div class="ow-client-logo">
                            <div class="client-logo client-logo-media">
                              <a href="javascript:void(0);">
                                <img
                                  src="/images/logos-partners/retco.png"
                                  alt=""
                                >
                              </a>
                            </div>
                          </div>
                        </div>

                        <div class="item">
                          <div class="ow-client-logo">
                            <div class="client-logo client-logo-media">
                              <a href="javascript:void(0);">
                                <img
                                  src="/images/logos-partners/nostra-luna.png"
                                  alt=""
                                >
                              </a>
                            </div>
                          </div>
                        </div>

                        <div class="item">
                          <div class="ow-client-logo">
                            <div class="client-logo client-logo-media">
                              <a href="javascript:void(0);">
                                <img
                                  src="/images/logos-partners/prodigy.png"
                                  alt=""
                                >
                              </a>
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
    </div>
  </div>
</template>

<script>
import { investmentsComputed, investmentsMethods } from "../../store/helpers"
import { shuffle, slice } from "lodash"

import "waypoints/lib/jquery.waypoints.min.js"
import "counterup/jquery.counterup.min.js"
import "../../assets/js/jquery.owl-filter.js"

export default {
    data() {
        return {
            investmentsFeaturedSlice: [],
            prepared: false
        }
    },

    computed: {
        ...investmentsComputed,
    },

    watch: {
        "$route" (value) {
            if (value.name === "Home" && this.prepared === false) {
                return this.prepare()
            }
        }
    },

    mounted() {
        return this.prepare()
    },

    methods: {
        ...investmentsMethods,

        home_carousel_2(){
            window.$(".home-carousel-2").owlCarousel({
                loop:true,
                autoplay:true,
                margin:0,
                nav:true,
                dots: false,
                navText: ["<i class=\"fa fa-angle-left\"></i>", "<i class=\"fa fa-angle-right\"></i>"],
                responsive:{
                    0:{
                        items:1
                    },
                    480:{
                        items:1
                    },
                    767:{
                        items:1
                    },
                    1000:{
                        items:1
                    }
                }
            })
        },

        home_client_carousel() {
            window.$(".home-client-carousel").owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                dots: false,
                navText: ["<i class=\"fa fa-angle-left\"></i>", "<i class=\"fa fa-angle-right\"></i>"],
                responsive:{
                    0:{
                        items:2
                    },
                    480:{
                        items:3
                    },
                    767:{
                        items:4
                    },
                    1000:{
                        items:5
                    }
                }
            })
        },

        home_projects_filter() {
            var owl = window.$(".owl-carousel-filter").owlCarousel({
                loop:false,
                autoplay:true,
                margin:20,
                nav:true,
                dots: false,
                navText: ["<i class=\"fa fa-angle-left\"></i>", "<i class=\"fa fa-angle-right\"></i>"],
                responsive:{
                    0:{
                        items:1
                    },
                    480:{
                        items:1
                    },
                    580:{
                        items:2
                    },
                    767:{
                        items:2
                    },
                    991:{
                        items:3
                    },
                    1152:{
                        items:4
                    },
                    1360:{
                        items:4
                    },
                    1366:{
                        items:5
                    }
                }
            })

            /* Filter Nav */
            window.$(".btn-filter-wrap").on("click", ".btn-filter", function(e) {
                var filter_data = window.$(this).data("filter")
        
                /* return if current */
                if(window.$(this).hasClass("btn-active")) return
        
                /* active current */
                window.$(this).addClass("btn-active").siblings().removeClass("btn-active")
       
                /* Filter */
                owl.owlFilter(filter_data, function(_owl) {
                    window.$(_owl).find(".item").each(owlAnimateFilter)
                })
            })
        },

        prepare() {
            return this.fetchAllInvestments().then(value => {
                return this.investmentsFeaturedSlice = slice(shuffle(value), 0, 3),
                this.home_carousel_2(),
                this.home_client_carousel(),
                this.home_projects_filter(),

                window.$(".counter").counterUp({
                    delay: 10,
                    time: 1000
                }),

                this.prepared = true
            })
        }
    },
}
</script>
