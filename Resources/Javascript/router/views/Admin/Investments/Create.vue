<template>
  <div>
    <h4 class="mb-3">
      Nueva Inversión
    </h4>
    <InvestmentForm
      :action="'/api/investments'"
      :method="'post'"
    />
  </div>
</template>
