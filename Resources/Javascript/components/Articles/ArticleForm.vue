<template>
  <form 
    :action="action"
    :class="[validated ? 'needs-validation' : 'needs-validation']"
    :method="method"
    novalidate
    @submit.prevent="handleSubmitForm"
    @keydown="form.errors.clear($event.target.name)"
  >
    <div class="card shadow">
      <div class="card-header bg-white p-2 p-md-4">
        <h5 class="text-primary m-0">
          Principal
        </h5>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
          <div class="form-group row mb-0">
            <label
              for="category_id"
              class="col-lg-3 col-form-label text-muted"
            >
              Categoría
            </label>
            <div class="col-lg-6">
              <select
                v-model="form.category_id"
                name="category_id"
                class="form-control"
              >
                <option value="">
                  Categoría
                </option>
              </select>
              <span
                v-if="form.errors.has('category_id')"
                class="invalid-feedback"
                role="alert"
              >
                <strong v-text="form.errors.get('category_id')" />
              </span>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <div class="form-group row mb-0">
            <label
              for="title"
              class="col-lg-3 col-form-label text-muted"
            >
              Título *
            </label>
            <div class="col-lg-6">
              <input
                v-model="form.title"
                :class="{ 'is-invalid': form.errors.has('title') }"
                class="form-control"
                name="title"
                placeholder="Título"
                required
                type="text"
                @keyup="updateSlug($event.target.value)"
              >
              <span
                v-if="form.errors.has('title')"
                class="invalid-feedback"
                role="alert"
              >
                <strong v-text="form.errors.get('title')" />
              </span>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <div class="form-group row mb-0">
            <label
              for="slug"
              class="col-lg-3 col-form-label text-muted"
            >
              Identificador URI *
            </label>
            <div class="col-lg-6">
              <input
                v-model="form.slug"
                v-slugify
                :class="{ 'is-invalid': form.errors.has('slug') }"
                class="form-control"
                name="slug"
                placeholder="Identificador amistoso"
                required
                type="text"
              >
              <span
                v-if="form.errors.has('slug')"
                class="invalid-feedback"
                role="alert"
              >
                <strong v-text="form.errors.get('slug')" />
              </span>
            </div>
          </div>
        </li>

        <li class="list-group-item">
          <div class="form-group">
            <label
              for="body"
            >
              Cuerpo
            </label>
            <VueEditor
              v-model="form.body"
              :class="{ 'is-invalid': form.errors.has('body') }"
              class="bg-white"
              name="body"
              placeholder="Cuerpo"
            />
            <span
              v-if="form.errors.has('body')"
              class="d-block invalid-feedback"
              role="alert"
            >
              <strong v-text="form.errors.get('body')" />
            </span>
          </div>

          <div class="form-group form-check">
            <input
              id="published"
              v-model="form.published"
              type="checkbox"
              class="form-check-input"
              name="published"
            >
            <label
              class="form-check-label"
              for="published"
            >Terminé de trabajar con la noticia, quiero que aparezca publicada.</label>
          </div>
        </li>
        <li class="list-group-item">
          <div class="form-group">
            <label
              for="featured_photo"
            >
              Foto destacada
            </label>
            <VueDropzone
              id="dzFeaturedPhoto"
              ref="dzFeaturedPhoto"
              :options="dzFeaturedPhotoOptions"
              @vdropzone-error="dzFeaturedPhotoError"
              @vdropzone-removed-file="dzFeaturedPhotoRemovedFile"
              @vdropzone-processing="dzFeaturedPhotoProcessing"
              @vdropzone-success-multiple="dzFeaturedPhotoSuccess"
              @vdropzone-upload-progress="dzFeaturedPhotoUploadProgress"
            />
          </div>
        </li>
      </ul>

      <div class="card-footer bg-white text-right">
        <router-link 
          :to="{ name: 'AdminArticlesIndex' }" 
          class="btn btn-outline-primary mr-2"
        >
          <span class="fa fa-arrow-left pr-2" />Volver
        </router-link>
        <button
          :disabled="submitted"
          class="btn btn-primary"
          type="submit"
        >
          <span class="fa fa-check pr-2" />Guardar
        </button>
      </div>
    </div>
  </form>
</template>

<script>
import { dz } from "@/utilities/mixins/dz"
import { articlesComputed, articlesMethods, photosMethods } from "@/store/helpers"
import { alertErrorMessage, alertSuccessMessage, deepClone, getSavedState, removeDzPreviewTemplate, slugify } from "@/utilities/helpers"
import { EventBus } from "@/eventBus"
import { VueEditor } from "vue2-editor"

import store from "@/store"
import vue2Dropzone from "vue2-dropzone"
import Form from "@/utilities/Form"

const token = getSavedState("auth.token")
const csrfToken = document.head.querySelector("meta[name=\"csrf-token\"]").content

var fields = deepClone(store.state.articles.initialState.one)

export default {

    name: "ArticleForm",

    components: {
        VueDropzone: vue2Dropzone,
        VueEditor
    },

    mixins: [dz],

    props: {
        action: {
            type: String,
            required: true
        },

        method: {
            type: String,
            required: true
        }
    },

    data() {
        return {
            dzFeaturedPhotoOptions: {
                addRemoveLinks: true,
                autoProcessQueue: false,
                dictDefaultMessage: "<i class='fa fa-cloud-upload'></i><br/>Hacé click o arrastrá una foto hacía acá",
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                    "Authorization": "Bearer " + token
                },
                maxFiles: 1,
                maxFilesize: 1,
                method: "put",
                paramName: "featured_photo",
                uploadMultiple: true,
                url: "/api/articles",
            },
            form: new Form(fields),
            isDestroying: false,
            prepared: false,
            submitted: false,
            url: "/api/articles",
        }
    },

    computed: {
        ...articlesComputed,

        validated() {
            return this.form.errors.any()
        }
    },

    watch: {
        "$route" (value) {
            var routeName = value.name
            if (routeName === "AdminArticlesCreate" && this.prepared) {
                this.prepareCreate()
            }

            if (routeName === "AdminArticlesEdit" && this.prepared) {
                this.prepareEdit()
            }
        }
    },

    beforeDestroy() {
        this.isDestroying = true
    },

    created() {
        var routeName = this.$route.name
        if (routeName === "AdminArticlesCreate") {
            return this.prepareCreate().then(this.prepared = true)
        }

        if (routeName === "AdminArticlesEdit") {
            return this.prepareEdit().then(this.prepared = true)
        }
    },

    methods: {
        ...articlesMethods,
        ...photosMethods, 

        dzFeaturedPhotoSuccess() {
            alertSuccessMessage("Noticias", "La noticia fue guardada correctamente.")
            return this.$router.push({ name: "AdminArticlesIndex" })
        },

        prepareCreate() {
            this.isDestroying = false

            store.dispatch("articles/reset")

            // Elimina errores de validación
            this.form.reset()

            this.form = new Form(deepClone(this.oneArticle))

            window.$(()=> {
                removeDzPreviewTemplate(this.dzFeaturedPhoto.dropzone)
            })

            return Promise.resolve()
        },

        async prepareEdit() {
            this.isDestroying = false

            return await this.fetchOneArticle(this.$route.params.id)
                .then(value => {
                    this.form.reset()
                    this.form = new Form(value)

                    this.dzFeaturedPhotoMounted(value.featured_photo)

                    return value
                })
        },

        handleSubmitForm() {
            this.submitted = true

            this.form.featured_photo = {}

            var id
            return this.form[this.method](this.action)
                .then(response => {
                    id = response.data[0].id
                    this.url = "/api/articles/" + id

                    EventBus.$emit("article-saved", response.data[0])

                    this.dzFeaturedPhotoProcessQueue()

                    this.submitted = false

                    return response
                }).catch(error => {
                    if (error.status === 422) {
                        var message = ""
                        Object.entries(error.data.errors).forEach(msg => {
                            message += "<p>" + msg[1] + "</p>"
                        })

                        alertErrorMessage("Errores de validación", message)
                    }

                    if (error.status !== 422) {
                        alertErrorMessage("Noticias" + error.data.message)
                    }

                    this.submitted = false

                    return error
                })
        },

        updateSlug(value) {
            return this.form.slug = slugify(value)
        }
    }
}
</script>
