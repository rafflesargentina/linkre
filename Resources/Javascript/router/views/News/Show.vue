<template>
  <div>
    <SiteHeader />
    <!-- CONTENT START -->
    <div class="page-content ">
      <!--Fade slider-->
      <div
        class="owl-carousel owl-fade-slider-one owl-btn-vertical-center owl-dots-bottom-right"
        style=""
      >
        <div
          class="item"
        >
          <div class="aon-thum-bx">
            <img
              :src="oneArticle.featured_photo.url"
              alt=""
              style="object-fit:cover;height:32rem;"
            >
          </div>
        </div>
      </div>

      <!-- SECTION CONTENTG START -->
      <div
        class="section-full p-b80 p-t40"
      >
        <!-- LOCATION BLOCK-->
        <div class="container">
          <div
            class="row"
          >
            <div class="col-12">
              <div class="m-b50">
                <div class="mb-5">
                  <h1 class="mb-3">
                    {{ oneArticle.title }}
                  </h1>
                  <div class="wt-separator-outer">
                    <div class="wt-separator bg-black" />
                  </div>
                </div>

                <div class="section-content">
                  <div v-html="oneArticle.body" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { articlesComputed, articlesMethods } from "@/store/helpers"

export default {
    data() {
        return {
            prepared: false,
        }
    },

    computed: {
        ...articlesComputed
    },

    watch: {
        "$route" (value) {
            if (value.name === "NewsShow" && this.prepared) {
                return this.prepare()
            }
        }
    },

    created() {
        return this.prepare().then(this.prepared = true)
    },

    methods: {
        ...articlesMethods,

        prepare() {
            return this.fetchOneArticle(this.$route.params.id)
                .then(() => {
                    return window.$(".owl-fade-slider-one").owlCarousel({
                        loop:true,
                        autoplay:true,
                        autoplayTimeout:2000,
                        margin:30,
                        nav:true,
                        navText: ["<i class=\"fa fa-angle-left\"></i>", "<i class=\"fa fa-angle-right\"></i>"],
                        items:1,
                        dots: true,
                        animateOut:"fadeOut",
                    })
                })
        }
    }
}
</script>
