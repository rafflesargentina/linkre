<style lang="scss" scoped>
.tab-pane {
  &--join {
    background-image: url(/images/bg_login.jpg);
    background-repeat: no-repeat;
    background-size: cover;
  }

  &--company {
    background-image: url(/images/bg_big.jpg);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }

  &--project {
    background-image: url(/images/slider-pla-developer/step3.jpg);
    background-repeat: no-repeat;
    background-size: cover;
  }

  &--due-diligence {
    background-image: url(/images/slider-pla-developer/step4.jpg);
    background-repeat: no-repeat;
    background-size: cover;
  }

  &--approval {
    background-image: url(/images/slider-pla-developer/step5.jpg);
    background-repeat: no-repeat;
    background-size: cover;
  }
}
</style>

<template>
  <div>        
    <SiteHeader />

    <!-- CONTENT START -->
    <div class="page-content">
      <!-- SECTION CONTENT START -->
      <div
        class="section-full p-b90 m-b90"
      >
        <div class="container">
          <div
            class="project-detail-outer bg-top-left bg-parallax bg-center"
            data-stellar-background-ratio="0.5"
            style="background-image:url(images/banner/reuna_su_capital.jpg)"
          >
            <div class="row">
              <div class="col-md-6 col-sm-12 project-detail-pic" />
              <div class="col-md-6 col-sm-12 project-detail-containt bg-black square_shape3">
                <div class="p-lr20 p-tb80">
                  <div class="bg-white p-lr30 p-tb50 text-black">
                    <h2 class="m-t0">
                      <span class="font-34 text-uppercase">
                        EL FUTURO DE LA FINANCIACIÓN EN LÍNEA ESTÁ AQUÍ.
                      </span>
                    </h2>
                    <p>Existe un Mercado de inversores profesionales ávidos de apoyar a los desarrollistas, ellos quieren saber de Ud. y de su empresa. Family Office, Private Equity y Fondos de Inversión o Crowdfunding están dispuestos a escuchar todas sus necesidades de Capital o alianzas estratégicas.</p>
                    <p>Descubra una nueva forma de estructurar sus negocios de manera inteligente, más cerca del mercado de capitales con certeza de que sus inversores son altamente confiables y flexibles para adecuarse a la oportunidades que usted les está acercando.</p>
                    <div class="product-block">
                      <div class="row">
                        <div class="col-md-6 col-sm-6 m-b30">
                          <RouterLink
                            :to="{ name: 'DeveloperRegister' }"
                            class="m-b15 site-button black radius-no text-uppercase"
                          >
                            <span class="font-12 letter-spacing-5">
                              Unirse a LinkRE
                            </span>
                          </RouterLink>
                        </div>
                      </div>
                    </div>
                    <div class="p-t0">
                      <ul class="social-icons social-square social-darkest m-b0">
                        <li>
                          <a
                            class="fa fa-linkedin"
                            href="javascript:void(0);"
                          />
                        </li>
                      </ul>
                    </div>
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

    <div class="container">
      <div class="row">
        <div class="col-12 m-b50"> 
          <!-- TITLE START -->
          <div class="section-head">
            <h3>Reuna su capital</h3>
            <div class="wt-separator-outer">
              <div class="wt-separator bg-black" />
            </div>
          </div>
          <!-- TITLE END -->
                    
          <!-- TAB DEFAULT -->
          <div class="section-content">
            <div class="wt-tabs tabs-default">
              <ul class="nav nav-tabs mb-5">
                <li class="nav-item">
                  <a
                    class="nav-link active"
                    data-toggle="tab"
                    href="#uns-lnk"
                  >
                    Unirse a LinkRE
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    data-toggle="tab"
                    href="#oprtnd"
                  >
                    Perfil empresa
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    data-toggle="tab"
                    href="#invtr"
                  >
                    Presentar Proyecto
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    data-toggle="tab"
                    href="#sgmto"
                  >
                    Due Diligence
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    data-toggle="tab"
                    href="#actlizc"
                  >
                    Recibe Aprobación
                  </a>
                </li>
              </ul>
              <div class="tab-content">
                <div
                  id="uns-lnk"
                  class="p-5 tab-pane tab-pane--join text-center text-white active"
                >
                  <p
                    class="m-b0 pt-sm-5"
                  >
                    <strong /><br> Envíenos sus datos para pertenecer al centro latinoamericano más grande de inversión de capitales en proyectos inmobiliarios.
                  </p>
                  <br><br>
                  <div class="row cont-responsive justify-content-center">
                    <div class="m-b30">
                      <RouterLink
                        :to="{ name: 'DeveloperRegister' }"
                        class="m-b15 site-button black radius-no text-uppercase"
                      >
                        <span class="font-12 letter-spacing-5">
                          Reuna su capital
                        </span>
                      </RouterLink>
                    </div>
                  </div>
                </div>
                                
                <div
                  id="oprtnd"
                  class="p-5 tab-pane tab-pane--company text-center text-white"
                >
                  <p class="m-b0 pt-sm-5">
                    <strong /><br> Comience a crear un perfil de su empresa, incluyendo su experiencia, trayectoria, proyectos anteriores y toda la información que crea pertinente.
                  </p>
                  <br><br>
                  <div class="row cont-responsive justify-content-center">
                    <div class="m-b30">
                      <RouterLink
                        :to="{ name: 'DeveloperRegister' }"
                        class="m-b15 site-button black radius-no text-uppercase"
                      >
                        <span class="font-12 letter-spacing-5">
                          Reuna su capital
                        </span>
                      </RouterLink>
                    </div>
                  </div>
                </div>
                                
                <div
                  id="invtr"
                  class="p-5 tab-pane tab-pane--project text-center text-white"
                >
                  <p class="m-b0 pt-sm-5">
                    <strong /><br>Complete por favor el siguiente formulario para someter fácilmente su proyecto para su financiación mediante nuestro simplificado proceso de gestión.
                  </p>
                  <br><br>
                  <div class="row cont-responsive justify-content-center">
                    <div class="m-b30">
                      <RouterLink
                        :to="{ name: 'DeveloperRegister' }"
                        class="m-b15 site-button black radius-no text-uppercase"
                      >
                        <span class="font-12 letter-spacing-5">
                          Reuna su capital
                        </span>
                      </RouterLink>
                    </div>
                  </div>
                </div>

                <div
                  id="sgmto"
                  class="p-5 tab-pane tab-pane--due-diligence text-center text-white"
                >
                  <p class="m-b0 pt-sm-5">
                    <strong /><br>Nuestro experimentado equipo interno le proporcionará una breve lista de comprobación y una guía para efectuar un PRE Due Diligence.
                  </p>
                  <br><br>
                  <div class="row cont-responsive justify-content-center">
                    <div class="m-b30">
                      <RouterLink
                        :to="{ name: 'DeveloperRegister' }"
                        class="m-b15 site-button black radius-no text-uppercase"
                      >
                        <span class="font-12 letter-spacing-5">
                          Reuna su capital
                        </span>
                      </RouterLink>
                    </div>
                  </div>
                </div>

                <div
                  id="actlizc"
                  class="p-5 tab-pane tab-pane--approval text-center text-white"
                >
                  <p class="m-b0 pt-sm-5">
                    <strong /><br>
                  </p>
                  <br><br>
                  <div class="row cont-responsive justify-content-center">
                    <div class="m-b30">
                      <RouterLink
                        :to="{ name: 'DeveloperRegister' }"
                        class="m-b15 site-button black radius-no text-uppercase"
                      >
                        <span class="font-12 letter-spacing-5">
                          Reuna su capital
                        </span>
                      </RouterLink>
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
