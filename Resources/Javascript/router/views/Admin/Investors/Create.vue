<template>
  <div>
    <h4 class="mb-3">
      Nuevo Inversor
    </h4>
    <InvestorForm 
      :method="'post'" 
      :action="'/api/investors'"
    />
  </div>
</template>
