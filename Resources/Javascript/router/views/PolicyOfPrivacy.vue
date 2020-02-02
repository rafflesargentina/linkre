<template>
  <div>
    <SiteHeader />

    <!-- CONTENT START -->
    <div class="page-content">
      <!-- INNER PAGE BANNER -->
      <div
        class="banner"
        style="margin-top:0;"
      >
        <div
          class="wt-bnr-inr overlay-wraper bg-parallax bg-top-center"
          data-stellar-background-ratio="0.5"
          style="background-image:url(images/banner/6.jpg); height: 600px; margin-top:"
        >
          <div class="overlay-main bg-black opacity-03" />
          <div class="container">
            <div class="wt-bnr-inr-entry">
              <div class="banner-title-outer">
                <div class="banner-title-name">
                  <h2 class="text-white text-uppercase letter-spacing-5 font-18 font-weight-300">
                    POLÍTICA DE PRIVACIDAD
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
                    <li>Términos y Condiciones</li>
                  </ul>
                </div>
              </div>
              <!-- BREADCRUMB ROW END -->
            </div>
          </div>
        </div>
      </div>
      <!-- INNER PAGE BANNER END -->
    </div>
  </div>
</template>
