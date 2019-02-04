<style scoped>
body {
  background-color: #eee;
}

.container {
  margin-right:  auto;
  margin-top: 177px;
  max-width: 1170px;
  padding-right: 15px;
  padding-left: 15px;
}

.row:before, .row:after {
  display: table;
  content: " ";
}

.col-md-6 {
  width: 70%;
}

.col-md-push-3 {
  margin-left: 15%;
}

h1 {
  font-size: 48px;
  font-weight: 300;
  margin: 0 0 20px 0;
}

.lead {
  font-size: 21px;
  font-weight: 200;
  margin-bottom: 20px;
}

p {
  margin: 0 0 10px;
}

a {
  color: #3282e6;
  text-decoration: none;
}
</style>

<template>
  <div
    id="error"
    class="container text-center"
  >
    <svg
      height="100"
      width="100"
    >
      <polygon
        points="50,25 17,80 82,80"
        stroke-linejoin="round"
        style="fill:none;stroke:#000;stroke-width:8"
      />
      <text
        x="42"
        y="74"
        fill="#000"
        font-family="sans-serif"
        font-weight="900"
        font-size="42px"
      >
        !
      </text>
    </svg>
    <div class="row">
      <div class="col-12">
        <div class="main-icon text-warning">
          <span class="uxicon uxicon-alert" />
        </div>
        <h1>Página no encontrada</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <p class="lead">
          La pagina solicitada no existe o no esta disponible.<br>Volver a <RouterLink :to="{ name: 'Home' }">
            LinkRE
          </RouterLink>
        </p>
        <RouterLink :to="{ name: 'Home' }">
          <img
            src="/images/logo_linkRE-2.svg"
            style="height: 49px;"
          >
        </RouterLink>
      </div>
    </div>
  </div>
</template>
