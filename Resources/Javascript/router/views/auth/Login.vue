<template>
  <div>        
    <SiteHeader />

    <!-- CONTENT START -->
    <div class="page-content">
      <div
        class="section-full p-tb90"
        style="padding-top: 10px;"
      >
        <div class="container-fluid">
          <div
            class="project-detail-outer bg-top-left bg-parallax bg-center"
            data-stellar-background-ratio="0.5"
            style="background-image:url(images/banner/invierta_su_capital.jpg)"
          >
            <div class="row no-gutters">
              <div class="col-md-6 col-sm-12 project-detail-pic" />
              <div class="col-md-6 col-sm-12 project-detail-containt bg-black square_shape3">
                <div class="p-lr20 p-tb80">
                  <div class="bg-white p-lr30 p-tb50 text-black">
                    <h2 class="m-t0">
                      <span class="font-34 text-uppercase">
                        Ingrese a su cuenta
                      </span>
                    </h2>
                    <LoginForm
                      :action="'/login'"
                      :method="'post'"
                    />
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
  </div>
</template>   

<script>
import { documentTypesMethods } from "@/store/helpers"

export default {
    data() {
        return {
            prepared: false,
        }
    },

    watch: {
        "$route" (value) {
            if (value.name === "Login" && this.prepared === false) {
                return this.prepare()
            }
        }
    },

    created() {
        return this.prepare()
    },

    methods: {
        ...documentTypesMethods,

        prepare() {
            return this.fetchAllDocumentTypes().then(() => this.prepared = true)
        }
    }
}
</script>
