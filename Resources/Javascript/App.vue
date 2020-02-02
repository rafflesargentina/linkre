<template>
  <div
    id="app"
  >
    <!-- LOADING AREA START ===== -->
    <div class="loading-area">
      <div class="loading-box" />
      <div class="loading-pic">
        <svg
          id="triangle"
          width="140px"
          height="140px"
          viewBox="-3 -4 39 39"
        >
          <polygon
            fill="#fff"
            stroke="#000"
            stroke-width="2"
            points="16,0 32,32 0,32"
          />
        </svg>
      </div>
    </div>
    <!-- LOADING AREA  END ====== -->

    <div class="page-wraper">
      <router-view />
      <SiteFooter v-if="false !== $route.meta.footer" />
    </div>

    <!-- BUTTON TOP START -->
    <button class="scroltop">
      <span
        id="btn-vibrate"
        class="fa fa-angle-up  relative"
      />
    </button>

    <vue-snotify />
  </div>
</template>

<script>
import "owl.carousel"
import "jquery-ui-dist/jquery-ui.js"
//import "jquery.stellar/jquery.stellar.js"

export default {
    name: "App",

    data() {
        return {
            prepared: false
        }
    },

    watch: {
        "$route" () {
            if (this.prepared === true) {
                return this.prepare()
            }
        }
    },

    mounted() {
        return this.prepare(),
        this.prepared = true
    },

    methods: {
        animate_content(){
            window.$(".animate").scrolla({
                mobile: false,
                once: true
            })
        },

        bg_image_stellar(){
            window.$(function(){
                window.$.stellar({
                    horizontalScrolling: false,
                    verticalOffset:100
                })
            })
        },

        equalheight(container) {
            var currentTallest = 0,
                currentRowStart = 0,
                rowDivs = [],
                currentDiv = 0

            window.$(container).each(function() {
                window.$el = window.$(this)
                window.$($el).height("auto")
                var topPostion = window.$el.position().top
                if (currentRowStart != topPostion) {
                    for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
                        rowDivs[currentDiv].height(currentTallest)
                    }
                    rowDivs.length = 0 // empty the array
                    currentRowStart = topPostion
                    currentTallest = window.$el.height()
                    rowDivs.push($el)
                } else {

                    rowDivs.push($el)
                    currentTallest = (currentTallest < window.$el.height()) ? ($el.height()) : (currentTallest)
                }

                for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
                    rowDivs[currentDiv].height(currentTallest)
                }
            })
        },

        masonryBox() {
            if (window.$().isotope) {
                var $container = window.$(".portfolio-wrap")
                $container.isotope({
                    itemSelector: ".masonry-item",
                    transitionDuration: "1s",
                    originLeft: true
                })

                window.$(".masonry-filter li").on("click",function() {
                    var selector = window.$(this).find("a").attr("data-filter")
                    window.$(".masonry-filter li").removeClass("active")
                    window.$(this).addClass("active")
                    $container.isotope({ filter: selector })
                    return false
                })
            }
        },

        page_loader() {
            window.$(".loading-area").fadeOut(1000)
        },

        prepare() {
            //if (this.$route.name.indexOf("Admin") === -1) {
            this.equalheight(".equal-wraper .equal-col")
            //this.animate_content()
            //this.masonryBox()
            //this.bg_image_stellar()
            //this.work_carousel()
            //}

            this.page_loader()
        },

        work_carousel(){
            window.$(".work-carousel").owlCarousel({
                loop:true,
                autoplay:false,
                center: true,
                items:3,
                margin:0,
                nav:true,
                dots: false,
                navText: ["<i class=\"fa fa-angle-left\"></i>", "<i class=\"fa fa-angle-right\"></i>"],
                responsive:{
                    0:{
                        items:1
                    },
                    854:{
                        items:2
                    }

                }
            })
        },
    }
}
</script>
