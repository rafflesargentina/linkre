<template>
  <div>       
    <SiteHeader />
    <!-- CONTENT START -->
    <div class="page-content">
      <!-- INNER PAGE BANNER -->
      <div
        class="wt-bnr-inr overlay-wraper bg-parallax bg-top-center"
        data-stellar-background-ratio="0.5"
        style="background-image:url(images/encabezado_que_es_linkre.jpg);"
      >
        <div class="overlay-main bg-black opacity-03" />
        <div class="container">
          <div class="wt-bnr-inr-entry">
            <div class="banner-title-outer">
              <div class="banner-title-name">
                <h2 class="text-white text-uppercase letter-spacing-5 font-18 font-weight-300">
                  Somos la plataforma de Crowdlending más importante de Latinoamérica
                </h2>
              </div>
            </div>
            <!-- BREADCRUMB ROW -->                            
            <div class="p-tb20">
              <div>
                <ul class="wt-breadcrumb breadcrumb-style-2">
                  <li>
                    <RouterLink :to="{ name:' Home' }">
                      Home
                    </RouterLink>
                  </li>
                  <li>Nosotros</li>
                </ul>
              </div>
            </div>
            <!-- BREADCRUMB ROW END -->                        
          </div>
        </div>
      </div>
      <!-- INNER PAGE BANNER END -->
             
      <!-- ABOUT COMPANY SECTION START -->
      <div class="section-full p-tb90 bg-gray square_shape2">
        <div class="container">
          <div class="section-content ">
            <div class="row">
              <div class="col-md-4 text-center">
                <img
                  src="/img/rfrattini.png"
                  class="p-4 rounded-circle"
                >
                <h3 class="mb-0">
                  Rubén Frattini
                </h3>
                <h5>Creador</h5>
                <a
                  href="https://www.linkedin.com/in/frattiniruben/"
                  target="_blank"
                  class="fa fa-lg fa-linkedin"
                />
              </div>
              <div class="col-md-4 text-center">
                <img
                  src="/img/lbracco.jpeg"
                  class="p-4 rounded-circle"
                >
                <h3 class="mb-0">
                  Leonardo Bracco
                </h3>
                <h5>Angel Investor & Advisory</h5>
                <a
                  href="https://www.linkedin.com/in/leonardo-bracco-bb06881a/"
                  target="_blank"
                  class="fa fa-lg fa-linkedin"
                />
              </div>
              <div class="col-md-4 text-center">
                <img
                  src="/img/dtabakman.jpeg"
                  class="p-4 rounded-circle"
                >
                <h3 class="mb-0">
                  Damián Tabakman
                </h3>
                <h5>Advisory</h5>
                <a
                  href="https://www.linkedin.com/in/damian-tabakman-7a590510/"
                  target="_blank"
                  class="fa fa-lg fa-linkedin"
                />
              </div>
            </div>
          </div>                    
        </div>
      </div>   
      <!-- OUR SERVICES SECTION END -->
    </div>
    <!-- CONTENT END -->
  </div>
</template> 

<script>
export default {

    mounted() {
        return this.prepare()
    },
    methods: {
        aboutus_carousel() {
            window.$(".about-us-carousel").owlCarousel({
                loop:true,
                autoplay:true,
                autoplayTimeout:3000,
                margin:30,
                nav:true,
                navText: ["<i class=\"fa fa-angle-left\"></i>", "<i class=\"fa fa-angle-right\"></i>"],
                items:1,
                dots: false,
            })
        },

        prepare() {
            this.aboutus_carousel()
        }
    }
}
</script>

