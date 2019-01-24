<template>
  <div id="app">
    <div class="page-wrapper">
      <PageHeader />
      <RouterView />
      <PageFooter v-if="false !== $route.meta.footer" />
    </div>
    <vue-snotify />
  </div>
</template>

<script>
export default {
    name: "App",
}
</script>
