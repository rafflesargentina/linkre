<template>
  <div>
    <h4 class="mb-3">
      Nueva Contructora
    </h4>
    <CompanyForm
      :action="'/api/companies'"
      :method="'post'"
    />
  </div>
</template>
