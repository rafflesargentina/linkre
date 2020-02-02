<template> 
  <div>
    <SiteHeader />

    <!-- CONTENT START -->
    <div class="page-content">
      <!-- INNER PAGE BANNER -->
      <div
        class="banner"
        style="margin-top:00px;"
      >
        <div
          class="wt-bnr-inr overlay-wraper bg-parallax bg-top-center"
          data-stellar-background-ratio="0.5"
          style="background-image:url(images/Corporate-Booing-Tool.jpg); height: 600px; margin-top:"
        >
          <div class="overlay-main bg-black opacity-03" />
          <div class="container">
            <div class="wt-bnr-inr-entry">
              <div class="banner-title-outer">
                <div class="banner-title-name">
                  <h2 class="text-white text-uppercase letter-spacing-5 font-18 font-weight-300">
                    ACCEDA A LAS POSIBILIDADES EN OFERTA DE INVERSIÓN COMERCIAL
                  </h2>
                </div>
              </div>
              <!-- BREADCRUMB ROW -->                            
              <div class="p-tb20">
                <div>
                  <ul class="wt-breadcrumb breadcrumb-style-2">
                    <li>
                      <RouterLink :to="{ name: 'Home' }">
                        Home
                      </RouterLink>
                    </li>
                    <li>Contactenos</li>
                  </ul>
                </div>
              </div>
              <!-- BREADCRUMB ROW END -->                        
            </div>
          </div>
        </div>
      </div>
      <!-- INNER PAGE BANNER END -->
             
      <!-- SECTION CONTENTG START -->
      <div class="section-full p-tb80">
        <!-- LOCATION BLOCK-->
        <div class="container">
          <!-- TITLE START -->
          <div class="section-head text-left text-black">
            <h2 class="text-uppercase font-36">
              Donde encontrarnos
            </h2>
            <div class="wt-separator-outer">
              <div class="wt-separator bg-black" />
            </div>
          </div>
          <!-- TITLE END -->                

          <!-- CONTACT FORM -->
          <div class="section-content">
            <!-- CONTACT FORM-->
            <div class="wt-box">
              <ContactForm
                :action="'/contact'"
                :method="'post'"
              />
            </div>
          </div>
        </div>
      </div>
                 
      <!-- SECTION CONTENT END -->
    </div>
    <!-- CONTENT END -->
  </div>
</template>
