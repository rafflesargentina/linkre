<style lang="scss" scoped>
.fade-enter-active, .fade-leave-active {
  transition: opacity .25s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}

.logo {
  display: table;
  height: 4rem;
  width: 100%;

  > a {
    display: table-cell;
    vertical-align: middle;
  }
}

.site-main {
  background: #eee;
  height: calc(100vh - 4rem);
}

.site-sidebar {
  height: 100vh;

  &--dark {
    background: #222;
  }
}
</style>

<template>
  <div>
    <SiteHeaderB />
    <div class="row no-gutters">
      <aside
        id="sidebar"
        class="col-lg-2 col-md-3 d-none d-md-block fixed-top site-sidebar site-sidebar--dark"
      >
        <div class="logo">
          <RouterLink :to="{ name: 'Home' }">
            <img
              src="/images/logo_linkRE-blanco.svg"
              style="height: 49px;"
            >
          </RouterLink>
        </div>

        <nav class="sidebar-nav text-white">
          <h4 class="sidebar-nav-header mb-0">
            Admin
          </h4>
          <ul class="sidebar-nav__list">
            <li class="sidebar-nav__item sidebar-nav__item--dark">
              <RouterLink
                :to="{ name: 'Dashboard' }"
                class="sidebar-nav__link sidebar-nav__link--dark"
              >
                Dashboard
              </RouterLink>
            </li>
            <li class="sidebar-nav__item sidebar-nav__item--dark">
              <RouterLink
                :to="{ name: 'AdminArticlesIndex' }"
                class="sidebar-nav__link sidebar-nav__link--dark"
              >
                Noticias
              </RouterLink>
            </li>
            <li class="sidebar-nav__item sidebar-nav__item--dark">
              <RouterLink
                :to="{ name: 'AdminReportsIndex' }"
                class="sidebar-nav__link sidebar-nav__link--dark"
              >
                Informes
              </RouterLink>
            </li>
            <li class="sidebar-nav__item sidebar-nav__item--dark">
              <RouterLink 
                :to="{ name: 'AdminInvestmentsIndex' }"
                class="sidebar-nav__link sidebar-nav__link--dark"
              >
                Proyectos
              </RouterLink>
            </li>
            <li class="sidebar-nav__item sidebar-nav__item--dark">
              <RouterLink
                :to="{ name: 'AdminInvestorsIndex' }"
                class="sidebar-nav__link sidebar-nav__link--dark"
              >
                Inversores (LP)
              </RouterLink>
            </li>
            <li class="sidebar-nav__item sidebar-nav__item--dark">
              <RouterLink
                :to="{ name: 'AdminDevelopersIndex' }"
                class="sidebar-nav__link sidebar-nav__link--dark"
              >
                Promotores (GP)
              </RouterLink>
            </li>
            <li class="sidebar-nav__item sidebar-nav__item--dark">
              <RouterLink
                :to="{ name: 'AdminPromotersIndex' }"
                class="sidebar-nav__link sidebar-nav__link--dark"
              >
                Desarrolladoras
              </RouterLink>
            </li>
            <li class="sidebar-nav__item sidebar-nav__item--dark">
              <RouterLink
                :to="{ name: 'AdminCompaniesIndex' }"
                class="sidebar-nav__link sidebar-nav__link--dark"
              >
                Constructoras
              </RouterLink>
            </li>
          </ul>
        </nav>
      </aside>

      <div
        id="main-inner"
        class="col-lg-10 col-md-9 offset-lg-2 offset-md-3 p-3 p-md-4 site-main"
      >
        <Transition 
          name="fade" 
          mode="out-in"
        >
          <KeepAlive>
            <RouterView />
          </KeepAlive>
        </Transition>
      </div>
    </div>
  </div>
</template>

<script>

export default {
}
</script>
