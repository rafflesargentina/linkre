<template>
  <div>       
    <SiteHeader />
    <!-- CONTENT START -->
    <div class="page-content">
      <!-- INNER PAGE BANNER -->
      <div
        class="wt-bnr-inr overlay-wraper bg-parallax bg-top-center"
        data-stellar-background-ratio="0.5"
        style="background-image:url(images/banner/1.jpg);"
      >
        <div class="overlay-main bg-black opacity-07" />
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
                  <li>Que es LinkRE</li>
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
              <div class="col-md-5 col-sm-6">
                <div class="m-about m-l50 m-r50">
                  <div class="owl-carousel about-us-carousel owl-btn-bottom-right">
                    <!-- COLUMNS 1 -->
                    <div class="item">
                      <div class="ow-img wt-img-effect zoom-slow">
                        <a href="javascript:void(0);">
                          <img
                            src="/images/quienes-somos/quienes-SOMOS-1.jpg"
                            alt=""
                          >
                        </a>
                      </div>
                    </div>
                    <!-- COLUMNS 2 -->
                    <!-- <div class="item">
                                            <div class="ow-img wt-img-effect zoom-slow">
                                                <a href="javascript:void(0);"><img src="images/gallery/portrait/pic3.jpg" alt=""></a>
                                            </div>
                                        </div> -->
                    <!-- COLUMNS 3 -->
                    <!-- <div class="item">
                                            <div class="owl-img wt-img-effect zoom-slow">
                                                <a href="javascript:void(0);"><img src="images/gallery/portrait/pic4.jpg" alt=""></a>
                                            </div>
                                        </div> -->
                    <!-- COLUMNS 4 -->
                    <!-- <div class="item">
                                            <div class="ow-img wt-img-effect zoom-slow">
                                                <a href="javascript:void(0);"><img src="images/gallery/portrait/pic5.jpg" alt=""></a>
                                            </div>
                                        </div> -->
                    <!-- COLUMNS 5 -->
                    <!-- <div class="item">
                                            <div class="ow-img wt-img-effect zoom-slow">
                                                <a href="javascript:void(0);"><img src="images/gallery/portrait/pic6.jpg" alt=""></a>
                                            </div>
                                        </div> -->
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-6">
                <div class="m-about-containt text-uppercase text-black p-t30">
                  <span class="font-30 font-weight-300">
                    Sobre LinkRE
                  </span>
                  <h2
                    class="font-40"
                    style="font-size: 20px; line-height: 1.3;"
                  >
                    LinkRE le acerca a los Desarrollistas inmobiliarios la posibilidad de llegar a los inversores de todo el mundo de una manera rápida, clara y eficaz.
                  </h2>
                  <p><b>Por la otra parte los inversores podrán encontrar de formar transparente y clasificada las opciones que mejor se acomoden a su perfil, expectativas y disponibilidad de inversión.</b></p>
                  <p class="">
                    LinkRE nace como una plataforma para asistir a los inversores en la búsqueda de nuevas oportunidades en toda la región, para lo cual acompañamos al inversor en el armado de su cartera y con la pre calificación independiente de una auditora calificada para su tranquilidad.
                  </p>
                  <RouterLink
                    :to="{ name: 'Register' }"
                    class="m-b15 site-button black radius-no text-uppercase"
                  >
                    <span class="font-12 letter-spacing-5">
                      Unirse a LinkRE
                    </span>
                  </RouterLink>
                </div>
              </div>                            
            </div>
          </div>
        </div>
      </div>   
      <!-- ABOUT COMPANY SECTION END -->
            
      <!-- OUR SERVICES SECTION START -->
      <div class="section-full bg-black p-tb90 square_shape1">
        <div class="container">
          <!-- TITLE START -->
          <div class="section-head text-left text-white">
            <h2 class="text-uppercase font-36">
              Beneficios de ser parte
            </h2>
            <div class="wt-separator-outer">
              <div class="wt-separator bg-white" />
            </div>
          </div>
          <!-- TITLE END -->                	
          <div
            class="section-content circle-block-outer"
            data-toggle="tab-hover"
          >
            <div class="row">
              <div class="col-md-4 col-sm-12 m-b30">
                <div
                  class="wt-icon-box-wraper right p-a20 m-b50 text-white"
                  data-target="#tab1"
                  data-toggle="tab"
                >
                  <div class="icon-content">
                    <h4 class="wt-tilte text-uppercase">
                      Innovación y Tecnología
                    </h4>
                    <p>Constante búsqueda de innovación en nuestros procesos y productos.</p>
                  </div>
                </div> 
                <div
                  class="wt-icon-box-wraper right p-a20 m-b50 text-white"
                  data-target="#tab2"
                  data-toggle="tab"
                >
                  <!-- <div class="icon-md text-primary">
                                        <span class="icon-cell  text-primary"><img src="images/icon/leaves.png" alt=""></span>
                                    </div> -->
                  <div class="icon-content">
                    <h4 class="wt-tilte text-uppercase">
                      Retorno para los Inversores
                    </h4>
                    <p>Incrementar el patrimonio de nuestros clientes durante toda su vida.</p>
                  </div>
                </div>
                <div
                  class="wt-icon-box-wraper right p-a20 m-b50 text-white"
                  data-target="#tab3"
                  data-toggle="tab"
                >
                  <!-- <div class="icon-md text-primary">
                                        <span class="icon-cell  text-primary"><img src="images/icon/lotus-position.png" alt=""></span>
                                    </div> -->
                  <div class="icon-content">
                    <h4 class="wt-tilte text-uppercase">
                      Elegir estando informado
                    </h4>
                    <p>Vamos más allá de proporcionar información adicional para que estén mejor informados.</p>
                  </div>
                </div>
              </div>
                            
              <div class="col-md-4 col-sm-12 m-b30">
                <div class="circle-content-pic tab-content ">
                  <div
                    id="tab1"
                    class="tab-pane active"
                  >
                    <div class="wt-box">
                      <div class="wt-media text-primary m-b20 ">
                        <img
                          src="/images/quienes-somos/quienes-SOMOS-2.jpg"
                          alt=""
                          style="width: 360px; height: 560px;"
                        >
                      </div>
                    </div>
                  </div>
                                     
                  <div
                    id="tab2"
                    class="tab-pane"
                  >
                    <div class="wt-box">
                      <div class="wt-media text-primary m-b20">
                        <img
                          src="/images/quienes-somos/quienes-SOMOS-2.jpg"
                          alt=""
                          style="width: 360px; height: 560px;"
                        >
                      </div>
                    </div>
                  </div>
                                     
                  <div
                    id="tab3"
                    class="tab-pane"
                  >
                    <div class="wt-box">
                      <div class="wt-media text-primary m-b20">
                        <img
                          src="/images/quienes-somos/quienes-SOMOS-2.jpg"
                          alt=""
                          style="width: 360px; height: 560px;"
                        >
                      </div>
                    </div>
                  </div> 
                                    
                  <div
                    id="tab4"
                    class="tab-pane"
                  >
                    <div class="wt-box">
                      <div class="wt-media text-primary m-b20">
                        <img
                          src="/images/quienes-somos/quienes-SOMOS-2.jpg"
                          alt=""
                          style="width: 360px; height: 560px;"
                        >
                      </div>
                    </div>
                  </div> 
                                    
                  <div
                    id="tab5"
                    class="tab-pane"
                  >
                    <div class="wt-box">
                      <div class="wt-media text-primary m-b20">
                        <img
                          src="/images/quienes-somos/quienes-SOMOS-2.jpg"
                          alt=""
                          style="width: 360px; height: 560px;"
                        >
                      </div>
                    </div>
                  </div>
                                     
                  <div
                    id="tab6"
                    class="tab-pane"
                  >
                    <div class="wt-box">
                      <div class="wt-media text-primary m-b20">
                        <img
                          src="/images/quienes-somos/quienes-SOMOS-2.jpg"
                          alt=""
                          style="width: 360px; height: 560px;"
                        >
                      </div>
                    </div>
                  </div>
                </div>  
              </div>
                            
              <div class="col-md-4 col-sm-12 m-b30">
                <div
                  class="wt-icon-box-wraper left p-a20 m-b50 text-white"
                  data-target="#tab4"
                  data-toggle="tab"
                >
                  <div class="icon-content">
                    <h4 class="wt-tilte text-uppercase">
                      Proactividad
                    </h4>
                    <p>En la búsqueda de nuevos inversores y mejora de procesos.</p>
                  </div>
                </div> 
                <div
                  class="wt-icon-box-wraper left p-a20 m-b50 text-white"
                  data-target="#tab5"
                  data-toggle="tab"
                >
                  <div class="icon-content">
                    <h4 class="wt-tilte text-uppercase">
                      Trasparencia
                    </h4>
                    <p>Con nuestros socios estratégicos, clientes y sobre todo inversores.</p>
                  </div>
                </div>
                <div
                  class="wt-icon-box-wraper left p-a20 m-b50 text-white"
                  data-target="#tab6"
                  data-toggle="tab"
                >
                  <div class="icon-content">
                    <h4 class="wt-tilte text-uppercase">
                      Mantenerse actualizado
                    </h4>
                    <p>Configure alertas de correo electrónico para mantenerse a la vanguardia.</p>
                  </div>
                </div>                                
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

