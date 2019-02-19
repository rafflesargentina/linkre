<template>        
  <!-- FOOTER START -->
  <footer class="site-footer bg-gray footer-light footer-wide">
    <div class="footer-bottom overlay-wraper">
      <div
        class="overlay-main bg-black"
        style="opacity:0;"
      />
      <div class="container p-t30">
        <div class="row mb-4">
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
        <div class="row">
          <div class="col-12 text-justify">
            <h6 class="pt-4" style="border-top:1px solid;">DISCLAIMER</h6>
            <p>Las inversiones en real estate y sus activos subyacente requieren de atención constante y asesoramiento profesional. El rendimiento pasado no es un indicador de los resultados futuros. Invertir siempre implica un riesgo para su capital. Le sugerimos No invierta más de lo que esté dispuesto a perder. Es responsabilidad del usuario leer con detenimiento las condiciones generales y/o contratos proporcionados por cada patrocinador de negocio (desarrollistas inmobiliarios, fondo de inversiones o broker), puesto que los mismos no forman parte de la relación entre el usuario y LinkRE.biz, sino de la relación jurídica entre el usuario y el patrocinador del negocio. Desde el momento en el que el usuario accede al entorno del patrocinador del negocio, la relación jurídica y comercial correspondiente a las acciones que el usuario pretende realizar se materializa entre el patrocinador del negocio  y el usuario, sin la participación de Linkre.biz. En ningún caso Linkre.biz actúa por cuenta y en nombre del usuario. Linkre.biz únicamente pone a disposición del usuario información provista y generada por el patrocinador del negocio, junto a determinadas señales técnicas que llegan diariamente y de forma masiva desde la Aplicación de Link.biz. El usuario debe asesorarse con su equipo de asesores, deslindando de toda responsabilidad la posible perdida total o parcial de su inversión, ya que para ello acepta y reconoce que conoce los riesgo del operar en la compra, vente, financiación  inversion en activos de real estate.</p>
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
