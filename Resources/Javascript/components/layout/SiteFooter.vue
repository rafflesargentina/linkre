<template>        
  <!-- FOOTER START -->
  <footer class="site-footer bg-gray footer-light footer-wide">
    <div class="footer-bottom overlay-wraper">
      <div
        class="overlay-main bg-black"
        style="opacity:0;"
      />
      <div class="container p-t30">
        <div class="row">
          <div class="col-md-3 wt-footer-bot-left">
            <RouterLink :to="{ name: 'Home' }">
              <img
                src="/images/logo_linkRE-2.svg"
                width="140"
                height="58"
                alt=""
                style="height: 58px;"
              >
            </RouterLink>
          </div>
                        
          <div class="col-md-4 text-center copyright-block p-t15">
            <span class="copyrights-text">
              Todos los Derechos Reservados, LinkRE 2019.
            </span>
          </div>  
                                             
          <div class="col-md-5 wt-footer-bot-right p-t15">
            <ul class="copyrights-nav pull-right"> 
              <li>
                <a href="Terminos-y-condiciones.html">
                  Terminos y Condiciones
                </a>
              </li>
              <li>
                <a href="javascript:void(0);">
                  Politicas de privacidad
                </a>
              </li>
              <li>
                <RouterLink :to="{ name: 'Contact' }">
                  Contactenos
                </RouterLink>
              </li>
              <li>
                <a
                  href="#"
                  class="fa fa-linkedin"
                />
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- FOOTER END -->
</template>

<script>
export default {
    name: "SiteFooter"
}
</script>
