<template>
  <div>
    <h4 class="mb-3">
      Nueva Noticia
    </h4>
    <ArticleForm
      :action="'/api/articles'"
      :method="'post'"
    />
  </div>
</template>
