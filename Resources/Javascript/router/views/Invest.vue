<style lang="scss" scoped>
.tab-pane {
  &--join {
    background-image: url(/images/slider-pla-inversor/step1.jpg);
    background-repeat: no-repeat;
    background-size: cover;
  }

  &--oportunities {
    background-image: url(/images/slider-pla-inversor/step2.jpg);
    background-repeat: no-repeat;
    background-size: cover;
  }

  &--invest {
    background-image: url(/images/slider-pla-inversor/step3.jpg);
    background-repeat: no-repeat;
    background-size: cover;
  }

  &--follow {
    background-image: url(/images/slider-pla-inversor/step4.jpg);
    background-repeat: no-repeat;
    background-size: cover;
  }

  &--update {
    background-image: url(/images/slider-pla-inversor/step5.jpg);
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
        class="section-full p-b50 m-b50"
      >
        <div class="container">
          <div
            class="project-detail-outer bg-top-left bg-parallax bg-center"
            data-stellar-background-ratio="0.5"
            style="background-image:url(images/banner/invierta_su_capital.jpg)"
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
                    <p>Unirse a LinkRE le dará acceso a las oportunidades comerciales de bienes raíces de calidad institucional, previamente evaluadas por un equipo profesional para invertir directamente en los mejores preseleccionados<br><br>¿Eres inversor? ¿Que tipo de inversor eres? Regístrate, y completa la siguiente encuesta en línea definiéndote a ti mismo o a tu grupo; qué perfil tienes o cuales son tus objetivos de Rentas/Activos</p>
                    <div class="product-block">
                      <div class="row">
                        <div class="col-sm-6 m-b30">
                          <RouterLink
                            :to="{ name: 'InvestorRegister' }"
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
        <div class="col-12 m-b20"> 
          <!-- TITLE START -->
          <div class="section-head">
            <h3>Invierta su capital</h3>
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
                    Oportunidades
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    data-toggle="tab"
                    href="#invtr"
                  >
                    Invertir
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    data-toggle="tab"
                    href="#sgmto"
                  >
                    Seguimiento
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    data-toggle="tab"
                    href="#actlizc"
                  >
                    Actualización
                  </a>
                </li>
              </ul>
              <div class="tab-content">
                <div
                  id="uns-lnk"
                  class="p-5 tab-pane tab-pane--join text-center text-white active"
                >
                  <p class="m-b0 pt-sm-5">
                    <strong /><br> Complete el formulario y únase a LinkRE. De esta forma tendrá acceso a la plataforma de Crowdlending más importante de Latinoamérica, donde encontrará todos los detalles para identificar la inversión más adecuada recibiendo la información de acuerdo a sus preferencias, analizando la misma integralmente.
                  </p>
                  <br><br>
                  <div class="row cont-responsive justify-content-center">
                    <div class="m-b30">
                      <RouterLink
                        :to="{ name: 'InvestorRegister' }"
                        class="m-b15 site-button black radius-no text-uppercase"
                      >
                        <span class="font-12 letter-spacing-5">
                          Invierta su capital
                        </span>
                      </RouterLink>
                    </div>
                  </div>
                </div>
                                
                <div
                  id="oprtnd"
                  class="p-5 tab-pane tab-pane--oportunities text-center text-white"
                >
                  <p class="m-b0 pt-sm-5">
                    <strong /><br> Encuentre oportunidades de inversión profesional como los hacen los grandes fondos. Con la misma certeza y un análisis profesional.
                  </p>
                  <br><br>
                  <div class="row cont-responsive justify-content-center">
                    <div class="m-b30">
                      <RouterLink
                        :to="{ name: 'InvestorRegister' }"
                        class="m-b15 site-button black radius-no text-uppercase"
                      >
                        <span class="font-12 letter-spacing-5">
                          Invierta su capital
                        </span>
                      </RouterLink>
                    </div>
                  </div>
                </div>
                                
                <div
                  id="invtr"
                  class="p-5 tab-pane tab-pane--invest text-center text-white"
                >
                  <p class="m-b0 pt-sm-5">
                    <strong /><br>Invierta con la misma certeza y análisis independiente. Como hacen los inversores experimentados. Para ellos es clave contar con la información adecuada. LinkRE se ocupa de la mayor tarea, identificar los mejores proyectos, que más allá de la calidad pueden soportar un minucioso análisis realizado por profesionales.
                  </p>
                  <br><br>
                  <div class="row cont-responsive justify-content-center">
                    <div class="m-b30">
                      <RouterLink
                        :to="{ name: 'InvestorRegister' }"
                        class="m-b15 site-button black radius-no text-uppercase"
                      >
                        <span class="font-12 letter-spacing-5">
                          Invierta su capital
                        </span>
                      </RouterLink>
                    </div>
                  </div>
                </div>

                <div
                  id="sgmto"
                  class="p-5 tab-pane tab-pane--follow text-center text-white"
                >
                  <p
                    class="m-b0"
                    pt-sm-5
                  >
                    <strong /><br>LinkRE le brinda la oportunidad de seguir de cerca sus inversiones. Reciba informes trimestrales sobre sus inversiones y su evolución. Mediante la utilización de la tecnología es factible estar informado con solo entrar a la suite de gestión donde se podrá monitorear la evolución del negocio y compartir con otros miembros registrados.
                  </p>
                  <br><br>
                  <div class="row cont-responsive justify-content-center">
                    <div class="m-b30">
                      <RouterLink
                        :to="{ name: 'InvestorRegister' }"
                        class="m-b15 site-button black radius-no text-uppercase"
                      >
                        <span class="font-12 letter-spacing-5">
                          Invierta su capital
                        </span>
                      </RouterLink>
                    </div>
                  </div>
                </div>

                <div
                  id="actlizc"
                  class="p-5 tab-pane tab-pane--update text-center text-white"
                >
                  <p class="m-b0 pt-sm-5">
                    <strong /><br>En todo momento manténgase actualizado como hacen los que saben. Siga la actualidad de los negocios de las inversiones del Real Estate. Acceso exclusivo a informes especiales de importantes consultores, así como entrevistas a los grandes fondos para saber sus políticas y planes de inversiones en Latinoamérica. Esté informado para decidir.
                  </p>
                  <br><br>
                  <div class="row cont-responsive justify-content-center">
                    <div class="m-b30">
                      <RouterLink
                        :to="{ name: 'InvestorRegister' }"
                        class="m-b15 site-button black radius-no text-uppercase"
                      >
                        <span class="font-12 letter-spacing-5">
                          Invierta su capital
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
