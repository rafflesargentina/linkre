<template>
  <div>
    <h4 class="mb-3">
      Nueva Desarrolladora
    </h4>
    <PromoterForm
      :action="'/api/promoters'"
      :method="'post'"
    />
  </div>
</template>
