<template>
  <div>        
    <SiteHeader />

    <!-- CONTENT START -->
    <div class="page-content">
      <!-- INNER PAGE BANNER -->
      <div
        class="wt-bnr-inr overlay-wraper bg-parallax bg-top-center"
        data-stellar-background-ratio="0.5"
        style="background-image:url(images/banner/1.jpg);"
      >
        <div class="overlay-main bg-black opacity-07" />
        <div class="container">
          <div class="wt-bnr-inr-entry">
            <div class="banner-title-outer">
              <div class="banner-title-name">
                <h2 class="text-white text-uppercase letter-spacing-5 font-18 font-weight-300">
                  Noticias
                </h2>
              </div>
            </div>
            <!-- BREADCRUMB ROW -->                            
            <div class="p-tb20">
              <div>
                <ul class="wt-breadcrumb breadcrumb-style-2">
                  <li>
                    <RouterLink
                      :to="{ name: 'Home' }"
                    >
                      Home
                    </RouterLink>
                  </li>
                  <li>Noticias</li>
                </ul>
              </div>
            </div>
            <!-- BREADCRUMB ROW END -->                        
          </div>
        </div>
      </div>
      <!-- INNER PAGE BANNER END -->
            
      <!-- SECTION CONTENT START -->
      <div class="section-full p-tb90">
        <div class="container-fluid">
          <masonry
            :cols="4"
            :gutter="30"
          >
            <div
              v-for="item in allArticles"
              :key="item.id"
              class="masonry-item"
            >
              <div class="blog-post">
                <div class="wt-img-effect zoom-slow">
                  <a href="javascript:void(0);">
                    <img
                      :src="item.featured_photo.url"
                    >
                  </a>
                </div>
                <div class="p-t30 text-black">
                  <div class="wt-post-title">
                    <h2 class="post-title">
                      <a
                        href="javascript:void(0);"
                        class="text-black font-20 letter-spacing-4 font-weight-600"
                      >
                        {{ item.title }}
                      </a>
                    </h2>
                  </div>
                  <div class="wt-post-meta">
                    <ul>
                      <li>
                        <strong>{{ item.published_at }}</strong>
                      </li>
                    </ul>
                  </div>
                  <div class="wt-post-text">
                    <p>{{ item.extract }}</p>
                  </div>
                </div>
              </div>
            </div>
          </masonry>
        </div>
      </div>
      <!-- SECTION CONTENT END  -->
    </div>
    <!-- CONTENT END -->
  </div>
</template>

<script>
import { articlesComputed, articlesMethods } from "../../../store/helpers"

export default {
    data() {
        return {
            prepared: false
        }
    },

    computed: {
        ...articlesComputed
    },

    watch: {
        "$route" (value) {
            if (value.name === "NewsIndex" && this.prepared === false) {
                return this.prepare()
            }
        }
    },

    created() {
        return this.prepare()
    },

    methods: {
        ...articlesMethods,

        prepare() {
            return this.fetchAllArticles().then(()=> this.prepared = true)
        }
    },
}
</script>
