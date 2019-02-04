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
          style="background-image:url(images/banner/6.jpg); height: 600px; margin-top:"
        >
          <div class="overlay-main bg-black opacity-07" />
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
                      <a href="index.html">
                        Home
                      </a>
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
          <!-- GOOGLE MAP & CONTACT FORM -->
          <div class="section-content">
            <!-- CONTACT FORM-->
            <div class="wt-box">
              <form
                class="contact-form cons-contact-form"
                method="post"
                action="form-handler.php"
              >
                <div class="contact-one p-a40 p-r150">
                  <div class="form-group">
                    <input
                      name="username"
                      type="text"
                      required
                      class="form-control"
                      placeholder="Nombre"
                    >
                  </div>
                                       
                  <div class="form-group">
                    <input
                      name="email"
                      type="text"
                      class="form-control"
                      required
                      placeholder="Correo"
                    >
                  </div>
                                       
                  <div class="form-group">
                    <textarea
                      name="message"
                      rows="3"
                      class="form-control "
                      required
                      placeholder="Mensaje"
                    />
                  </div>
                                        
                  <button
                    name="submit"
                    type="submit"
                    value="Submit"
                    class="site-button black radius-no text-uppercase"
                  >
                    <span class="font-12 letter-spacing-5">
                      Enviar
                    </span>
                  </button>
                                            
                  <div class="contact-info bg-black text-white p-a30">
                    <div class="wt-icon-box-wraper left p-b30">
                      <div class="icon-sm">
                        <i class="iconmoon-smartphone-1" />
                      </div>
                      <div class="icon-content text-white ">
                        <h5 class="m-t0 text-uppercase">
                          Teléfono
                        </h5>
                        <p class="text-white">
                          4001-3126
                        </p>
                      </div>
                    </div>
                                                
                    <!-- <div class="wt-icon-box-wraper left p-b30">
                                                    <div class="icon-sm"><i class="iconmoon-email"></i></div>
                                                    <div class="icon-content text-white">
                                                        <h5 class="m-t0  text-uppercase">Email address</h5>
                                                        <p>Moderninfo@gmail.com</p>
                                                    </div>
                                                </div> -->
                                                
                    <div class="wt-icon-box-wraper left">
                      <div class="icon-sm">
                        <i class="iconmoon-travel" />
                      </div>
                      <div class="icon-content text-white">
                        <h5 class="m-t0  text-uppercase">
                          Dirección
                        </h5>
                        <p>Av. Corrientes 222 Piso 10, C1043AAP Catalinas Norte</p>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
           
                 
      <!-- SECTION CONTENT END -->
    </div>
    <!-- CONTENT END -->
  </div>
</template>
