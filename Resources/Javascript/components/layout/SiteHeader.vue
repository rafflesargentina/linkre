<template>
  <header class="site-header nav-wide sticky-no">
    <div
      class="sticky-header main-bar-wraper"
      style="padding-top: 0px;"
    >
      <div
        class="main-bar bg-white p-t10"
        style="background-color: rgba(255,255,255,0) !important;"
      >
        <div
          class="container-fluid"
          style="padding-top: 0px;"
        >
          <div
            class="logo-header"
          >
            <div class="logo-header-inner logo-header-one">
              <RouterLink :to="{ name: 'Home' }">
                <img
                  src="/images/logo_linkRE-2.svg"
                  style="height: 49px;"
                >
              </RouterLink>
            </div>
          </div>
          <div class="extra-nav">
            <div class="extra-cell">
              <a
                class="vnav-btn closed"
                style="background-color: rgba(255,255,255,0) !important;"
                @click="openNavSidebar"
              >
                <span class="fa fa-bars black" />
              </a>
            </div>
          </div> 
          <div
            v-if="isAuthenticated"
            class="extra-nav"
          >
            <div class="extra-cell">
              <div class="dropdown">
                <a
                  href="#"
                  class="dropdown-toggle"
                  data-toggle="dropdown"
                >
                  <i class="fa fa-user" /> {{ username }}
                </a>
                <div class="dropdown-menu bg-white">
                  <RouterLink
                    :to="{ name: 'Logout' }"
                    class="dropdown-item"
                  >
                    Cerrar sesión
                  </RouterLink>
                </div>
              </div>
            </div>
          </div>
          <!-- MAIN Vav -->
          <div class="header-nav">
            <ul
              class="nav navbar"
              style="margin-top: 20px;"
            >
              <li v-if="!isAuthenticated">
                <RouterLink
                  :to="{ name: 'Register' }"
                  class="rgis"
                >
                  Registrarme
                </RouterLink>
              </li>
              <li v-if="!isAuthenticated">
                <RouterLink :to="{ name: 'Login' }">
                  Login
                </RouterLink>
              </li>
            </ul>
          </div>
          <!-- STYLE SWITCHER  ======= --> 
          <div
            class="nav-sidebar"
            style=""
          >
            <a
              class="vnav-close"
              @click="closeNavSidebar"
            />
            <div class="nav-siderbar-scroll">
              <div class="vertical-content-wrap">
                <div
                  class="vertical-content-area vertical-centered"
                >
                  <!-- MAIN Vav -->
                  <div class="vertical-nav">
                    <ul class=" nav navbar">
                      <li>
                        <RouterLink
                          :to="{ name: 'Company' }"
                          style="padding: 10px 10px; border: none;"
                        >
                          Qué es LinkRE
                        </RouterLink>
                      </li>
                      <li>
                        <RouterLink
                          :to="{ name: 'About' }"
                          style="padding: 10px 10px; border: none;"
                        >
                          Nosotros
                        </RouterLink>
                      </li>
                      <li>
                        <RouterLink
                          :to="{ name: 'Invest' }"
                          style="padding: 10px 10px;"
                        >
                          Invierta su Capital
                        </RouterLink>
                      </li>
                      <li>
                        <RouterLink
                          :to="{ name: 'Develop' }"
                          style="padding: 10px 10px;"
                        >
                          Reúna su Capital
                        </RouterLink>
                      </li>
                      <li>
                        <RouterLink
                          :to="{ name: 'ProjectsIndex' }"
                          style="padding: 10px 10px;"
                        >
                          Proyectos
                        </RouterLink>
                      </li>
                      <li>
                        <RouterLink
                          :to="{ name: 'ReportsIndex' }"
                          style="padding: 15px 10px;"
                        >
                          Informes
                        </RouterLink>
                      </li>
                      <li>
                        <RouterLink
                          :to="{ name: 'NewsIndex' }"
                          style="padding: 10px 10px;"
                        >
                          Noticias
                        </RouterLink>
                      </li>
                      <li>
                        <RouterLink
                          :to="{ name: 'Contact' }"
                          style="padding: 10px 10px;"
                        >
                          Contacto
                        </RouterLink>
                      </li>
                      <li v-if="isAuthenticated && (isAdmin || isColaborador)">
                        <RouterLink
                          :to="{ name: 'Dashboard' }"
                          style="padding: 10px 10px;"
                        >
                          Admin
                        </RouterLink>
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
  </header>
</template>

<script>
import { authComputed } from "@/store/helpers"

export default {
    name: "SiteHeader",

    computed: {
        ...authComputed
    },

    methods: {
        openNavSidebar() {
            if (window.$(".vnav-btn").hasClass("open")) {
                window.$(".nav-sidebar").animate({"right": "-500px"})
            } else {
                if (window.$(".vnav-btn").hasClass("closed")) {
                    window.$(".nav-sidebar").animate({"right": "0"})
                }
            }
        },

        closeNavSidebar() {
            window.$(".nav-sidebar").animate({"right": "-500px"})
            window.$(".vnav-btn").addClass("closed")
        }
    }
}
</script>
