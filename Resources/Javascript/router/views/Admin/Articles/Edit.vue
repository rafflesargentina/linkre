<template>
  <div>
    <h4 class="mb-3">
      Editar Noticia: {{ strLimit(oneArticle.title) }}
    </h4>
    <ArticleForm
      :action="'/api/articles/' + $route.params.id"
      :method="'put'"
    />
  </div>
</template>

<script>
import { articlesComputed } from "@/store/helpers"
import { strLimit } from "@/utilities/helpers"

export default {
    computed: {
        ...articlesComputed
    },

    methods: {
        strLimit
    }
}
</script>
