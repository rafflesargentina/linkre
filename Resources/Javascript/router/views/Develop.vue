<template>
  <div>        
    <SiteHeader />

    <!-- CONTENT START -->
    <div class="page-content">
      <!-- INNER PAGE BANNER -->
      <div class="overlay-main bg-black opacity-07" />
      <div class="container">
        <div class="wt-bnr-inr-entry">                     
          <div class="p-tb20">
            <div>
              <ul class="wt-breadcrumb breadcrumb-style-2">
                <li>
                  <RouterLink :to="{ name: 'Home' }">
                    Home
                  </RouterLink>
                </li>
                <li>Reúna su capital</li>
              </ul>
            </div>
          </div>                      
        </div>
      </div>
      <!-- INNER PAGE BANNER END -->
            
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
                        ACCEDA A LAS POSIBILIDADES EN OFERTA DE INVERSIÓN COMERCIAL
                      </span>
                    </h2>
                    <p>Unirse a LinkRE le dará acceso a las oportunidades comerciales de bienes raíces de calidad institucional, previamente evaluadas por un equipo profesional para invertir directamente en los mejores preseleccionados<br><br>¿Eres inversor? ¿Que tipo de inversor eres?, contesta la siguiente linea de preguntas y definete a ti mismo, que perfil tienes de inversor o cuales son tus objetivos de Rentas/Activos</p>
                    <div class="product-block">
                      <div class="row">
                        <div class="col-md-6 col-sm-6 m-b30">
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
                    <div class="p-t0">
                      <ul class="social-icons social-square social-darkest m-b0">
                        <li>
                          <a
                            href="javascript:void(0);"
                            class="fa fa-linkedin"
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
        <div class="m-b50"> 
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
              <ul class="nav nav-tabs">
                <li>
                  <a
                    class="active"
                    data-toggle="tab"
                    href="#uns-lnk"
                  >
                    Unirse a LinkRE
                  </a>
                </li>
                <li>
                  <a
                    data-toggle="tab"
                    href="#oprtnd"
                  >
                    Perfil empresa
                  </a>
                </li>
                <li>
                  <a
                    data-toggle="tab"
                    href="#invtr"
                  >
                    Presentar Proyecto
                  </a>
                </li>
                <li>
                  <a
                    data-toggle="tab"
                    href="#sgmto"
                  >
                    Due Diligence
                  </a>
                </li>
                <li>
                  <a
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
                  class="tab-pane active"
                >
                  <p
                    class="m-b0"
                    style="font-size: 15px; color: black;"
                  >
                    <strong /><br> Envíenos sus datos para pertenecer al centro latinoamericano más grande de inversión de capitales en proyectos inmobiliarios.
                  </p>
                  <br><br>
                  <div class="row">
                    <div class="col-md-6 col-sm-6 m-b30">
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
                                
                <div
                  id="oprtnd"
                  class="tab-pane"
                >
                  <p class="m-b0">
                    <strong /><br> Comience a crear un perfil de su empresa, incluyendo su experiencia, trayectoria, proyectos anteriores y toda la información que crea pertinente.
                  </p>
                  <br><br>
                  <div class="row">
                    <div class="col-md-6 col-sm-6 m-b30">
                      <RouterLink
                        :to="{ name: 'Register' }"
                        class="m-b15 site-button black radius-no text-uppercase"
                      >
                        <span class="font-12 letter-spacing-5">
                          Reunir capital
                        </span>
                      </RouterLink>
                    </div>
                  </div>
                </div>
                                
                <div
                  id="invtr"
                  class="tab-pane"
                >
                  <p class="m-b0">
                    <strong /><br>Complete por favor el siguiente formulario para someter fácilmente su proyecto para su financiación mediante nuestro simplificado proceso de gestión.
                  </p>
                  <br><br>
                  <div class="row">
                    <div class="col-md-6 col-sm-6 m-b30">
                      <RouterLink
                        :to="{ name: 'Register' }"
                        class="m-b15 site-button black radius-no text-uppercase"
                      >
                        <span class="font-12 letter-spacing-5">
                          Reunir capital
                        </span>
                      </RouterLink>
                    </div>
                  </div>
                </div>

                <div
                  id="sgmto"
                  class="tab-pane"
                >
                  <p class="m-b0">
                    <strong /><br>Nuestro experimentado equipo interno le proporcionará una breve lista de comprobación y una guía para efectuar un PRE Due Diligence.
                  </p>
                  <br><br>
                  <div class="row">
                    <div class="col-md-6 col-sm-6 m-b30">
                      <RouterLink
                        :to="{ name: 'Register' }"
                        class="m-b15 site-button black radius-no text-uppercase"
                      >
                        <span class="font-12 letter-spacing-5">
                          Reunir capital
                        </span>
                      </RouterLink>
                    </div>
                  </div>
                </div>

                <div
                  id="actlizc"
                  class="tab-pane"
                >
                  <p class="m-b0">
                    <strong /><br>
                  </p>
                  <br><br>
                  <div class="row">
                    <div class="col-md-6 col-sm-6 m-b30">
                      <RouterLink
                        :to="{ name: 'Register' }"
                        class="m-b15 site-button black radius-no text-uppercase"
                      >
                        <span class="font-12 letter-spacing-5">
                          Reunir capital
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
