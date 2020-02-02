<style lang="scss" scoped>
.logo {
  display: table;
  height: 4rem;
  width: 100%;

  > a {
    display: table-cell;
    height: 100%;
    vertical-align: middle;
  }
}

.site-header {
  &--light { 
    background-color: #fff;
  }
}
</style>

<template>
  <div class="row">
    <div class="col-3 col-lg-2">
      <div class="logo">
        <RouterLink :to="{ name: 'Home' }">
          <img src="/images/logo_linkRE-2.svg">
        </RouterLink>
      </div>
    </div>

    <div class="col-lg-10 col-9 site-header site-header--light py-2">
      <div class="row no-gutters">
        <nav class="col-md-9 d-none d-md-inline-block main-nav">
          <ul class="main-nav__list text-left">
            <li class="main-nav__item main-nav__item--light">
              <RouterLink
                :to="{ name: 'Home' }"
                class="main-nav__link main-nav__link--light"
              >
                &larr; Volver al sitio web
              </RouterLink>
            </li>
          </ul>
        </nav>

        <nav class="col-12 col-md-3 main-nav pr-3 pr-md-5 text-right">
          <ul class="main-nav__list d-lg-none text-right">
            <li class="main-nav__item main-nav__item--light d-inline-block d-lg-none">
              <a
                class="main-nav__link main-nav__link--light navbar-toggler"
                data-toggle="collapse"
                data-target="#mainNavMenu"
                aria-controls="mainNavMenu"
                aria-expanded="false"
                aria-label="Toggle navigation"
                href="#"
              >
                <span class="fa fa-bars main-nav__icon" />
              </a>
            </li>
          </ul>


          <ul class="main-nav__list d-none d-lg-inline-block">
            <li
              v-if="!isAuthenticated"
              class="main-nav__item main-nav__item--light d-none d-lg-inline-block"
            >
              <RouterLink
                to="/login"
                class="main-nav__link main-nav__link--light"
              >
                INGRESAR
              </RouterLink>
            </li>
            <li
              v-if="!isAuthenticated"
              class="main-nav__item main-nav__item--light d-none d-lg-inline-block"
            >
              <RouterLink
                to="/register"
                class="main-nav__link main-nav__link--light"
              >
                SOLICITAR REGISTRO
              </RouterLink>
            </li>

            <li
              v-if="isAuthenticated"
              class="main-nav__item main-nav__item--light"
            >
              <a
                id="sessionMenuLink"
                href="#"
                class="main-nav__link main-nav__link--light dropdown-toggle"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <span class="fa fa-user pr-2" />{{ username }}
              </a>
              <div
                class="dropdown-menu"
                aria-labelledby="sessionMenuLink"
              >
                <RouterLink
                  class="dropdown-item"
                  to="/account"
                >
                  Cuenta
                </RouterLink>
                <RouterLink
                  v-if="isAdmin"
                  class="dropdown-item"
                  to="/admin"
                >
                  Admin
                </RouterLink>
                <div class="dropdown-divider" />
                <RouterLink
                  class="dropdown-item"
                  to="/logout"
                >
                  Cerrar sesión
                </RouterLink>
              </div>
            </li>
          </ul>
        </nav>
      </div>
    </div>

    <nav
      id="mainNavMenu"
      class="collapse d-lg-none main-nav main-nav-menu"
    >
      <ul class="main-nav__list">
        <li class="main-nav__item main-nav__item--dark">
          <RouterLink
            :to="{ name: 'Home' }"
            class="main-nav__link main-nav__link--dark"
          >
            &larr; Volver al sitio web
          </RouterLink>
        </li>
        <li class="main-nav__item main-nav__item--dark">
          <RouterLink
            :to="{ name: 'Dashboard' }"
            class="main-nav__link main-nav__link--dark"
          >
            Dashboard
          </RouterLink>
        </li>
        <li class="main-nav__item main-nav__item--dark">
          <RouterLink
            :to="{ name: 'AdminArticlesIndex' }"
            class="main-nav__link main-nav__link--dark"
          >
            Noticias
          </RouterLink>
        </li>
        <li class="main-nav__item main-nav__item--dark">
          <RouterLink
            :to="{ name: 'AdminReportsIndex' }"
            class="main-nav__link main-nav__link--dark"
          >
            Informes
          </RouterLink>
        </li>
        <li class="main-nav__item main-nav__item--dark">
          <RouterLink
            :to="{ name: 'AdminProyectsIndex' }"
            class="main-nav__link main-nav__link--dark"
          >
            Proyectos
          </RouterLink>
        </li>
        <li class="main-nav__item main-nav__item--dark">
          <RouterLink
            :to="{ name: 'AdminInvestorsIndex' }"
            class="main-nav__link main-nav__link--dark"
          >
            Usuarios Inversores
          </RouterLink>
        </li>

        <li class="main-nav__item main-nav__item--dark">
          <RouterLink
            :to="{ name: 'AdminInvestorsIndex' }"
            class="main-nav__link main-nav__link--dark"
          >
            Usuarios Desarrollistas
          </RouterLink>
        </li>

        <li class="main-nav__item main-nav__item--dark">
          <RouterLink
            :to="{ name: 'AdminCompaniesIndex' }"
            class="main-nav__link main-nav__link--dark"
          >
            Compañías Desarrollistas
          </RouterLink>
        </li>

        <li class="main-nav__item main-nav__item--dark">
          <RouterLink
            :to="{ name: 'AdminPromotersIndex' }"
            class="main-nav__link main-nav__link--dark"
          >
            Compañías Promotoras
          </RouterLink>
        </li>
      </ul>
    </nav>
  </div>
</template>

<script>
import { authComputed } from "@/store/helpers"

export default {
    name: "SiteHeaderB",

    computed: {
        ...authComputed
    },

    watch: {
        "$route" (value) {
            window.$("#mainNavMenu").removeClass("show")
        }
    }
}
</script>
