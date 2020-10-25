<template>
  <div>
    <h4 class="mb-3">
      Nuevo Informe
    </h4>
    <ReportForm
      :action="'/api/reports'"
      :method="'post'"
    />
  </div>
</template>
