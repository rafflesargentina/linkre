<style lang="scss" scoped>
.map {
  height: 20rem;
}
</style>

<template>
  <form 
    :action="action"
    :class="[validated ? 'needs-validation' : 'needs-validation']"
    :method="method"
    novalidate
    @submit.prevent="handleSubmitForm"
    @keydown="form.errors.clear($event.target.name)"
  >
    <ul
      id="developer-pills"
      class="nav nav-pills mb-3"
      role="tablist"
    >
      <li class="nav-item">
        <a
          id="main-tab"
          aria-controls="main"
          aria-selected="true"
          class="nav-link active"
          data-toggle="tab"
          href="#main"
        >
          Principal
        </a>
      </li>
      <li class="nav-item">
        <a
          id="profile-tab"
          aria-controls="profile"
          aria-selected="false"
          class="nav-link"
          data-toggle="tab"
          href="#profile"
        >
          Perfil
        </a>
      </li>
    </ul>

    <div class="card shadow">
      <div
        class="tab-content"
      >
        <div
          id="main"
          class="tab-pane fade show active"
          role="tabpanel"
          aria-labelledby="main-tab"
        >
          <div class="card-header bg-white p-2 p-md-4">
            <h5 class="text-primary m-0">
              Principal
            </h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <div class="form-group row mb-0">
                <label
                  for="name"
                  class="col-6 col-form-label text-muted"
                >
                  Nombre *
                </label>
                <div class="col-6 col-lg-4">
                  <input
                    v-model="form.name"
                    :class="{ 'is-invalid': form.errors.has('name') }"
                    class="form-control"
                    name="name"
                    placeholder="Nombre"
                    required
                    type="text"
                    @keyup="form.slug = updateSlug($event.target.value)"
                  >
                  <span
                    v-if="form.errors.has('name')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('name')" />
                  </span>
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="form-group row mb-0">
                <label
                  for="slug"
                  class="col-6 col-form-label text-muted"
                >
                  Identificador URI *
                </label>
                <div class="col-6 col-lg-4">
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
          </ul>

          <div class="card-header bg-white p-2 p-md-4">
            <h5 class="text-primary m-0">
              Descripción
            </h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <div class="form-group row mb-0">
                <label
                  for="description"
                  class="col-lg-3 col-form-label text-muted"
                >
                  Descripción
                </label>
                <div class="col-lg-9">
                  <VueEditor
                    v-model="form.description"
                    :class="{ 'is-invalid': form.errors.has('description') }"
                    class="bg-white"
                    name="description"
                    placeholder="Descripción"
                  />
                  <span
                    v-if="form.errors.has('description')"
                    class="d-block invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('description')" />
                  </span>
                </div>
              </div>
            </li>
          </ul>
        </div>

        <div
          id="profile"
          class="tab-pane fade show"
          role="tabpanel"
          aria-labelledby="profile-tab"
        >
          <div class="card-header bg-white p-2 p-md-4">
            <h5 class="text-primary m-0">
              Foto destacada
            </h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <div class="form-group row mb-0">
                <label
                  for="featured_photo"
                  class="col-md-6 col-form-label text-muted"
                >
                  Foto destacada
                </label>
                <div class="col-md-4">
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
              </div>
            </li>
          </ul>

          <div class="card-header bg-white p-2 p-md-4">
            <h5 class="text-primary m-0">
              Contacto
            </h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <div class="form-group row mb-0">
                <label
                  for="contact.phone"
                  class="col-6 col-form-label text-muted"
                >
                  Teléfono
                </label>
                <div class="col-6 col-lg-4">
                  <input
                    v-model="form.contact.phone"
                    :class="{ 'is-invalid': form.errors.has('contact.phone') }"
                    class="form-control"
                    name="contact.phone"
                    placeholder="Teléfono"
                    type="text"
                  >
                  <span
                    v-if="form.errors.has('contact.phone')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('contact.phone')" />
                  </span>
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="form-group row mb-0">
                <label
                  for="contact.website"
                  class="col-6 col-form-label text-muted"
                >
                  Sitio web
                </label>
                <div class="col-6 col-lg-4">
                  <input
                    v-model="form.contact.website"
                    :class="{ 'is-invalid': form.errors.has('contact.website') }"
                    class="form-control"
                    name="contact.website"
                    placeholder="Sitio web"
                    type="text"
                  >
                  <span
                    v-if="form.errors.has('contact.website')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('contact.website')" />
                  </span>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>

      <div class="card-footer bg-white text-right">
        <router-link 
          :to="{ name: 'AdminDevelopersIndex' }" 
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
import { developersComputed, developersMethods } from "@linkre/store/helpers"
import { alertErrorMessage, alertSuccessMessage, deepClone, getSavedState, removeDzPreviewTemplate, slugify } from "@/utilities/helpers"
import { photosMethods } from "@/store/helpers"
import { EventBus } from "@/eventBus"
import { VueEditor } from "vue2-editor"

import store from "@/store"
import vue2Dropzone from "vue2-dropzone"
import Form from "@/utilities/Form"

const token = getSavedState("auth.token")
const csrfToken = document.head.querySelector("meta[name=\"csrf-token\"]").content

var fields = deepClone(store.state.developers.initialState.one)

export default {
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
                url: "/api/developers",
            },
            form: new Form(fields),
            isDestroying: false,
            submitted: false,
            url: "/api/developers",
        }
    },

    computed: {
        ...developersComputed,

        validated() {
            return this.form.errors.any()
        }
    },

    watch: {
        "$route" (value) {
            var routeName = value.name
            if (routeName === "AdminDevelopersCreate" && this.prepared) {
                this.prepareCreate()
            }

            if (routeName === "AdminDevelopersEdit" && this.prepare) {
                this.prepareEdit()
            }
        }
    },

    beforeDestroy() {
        this.isDestroying = true
    },

    created() {
        var routeName = this.$route.name
        if (routeName === "AdminDevelopersCreate") {
            return this.prepareCreate().then(this.prepared = true)
        }

        if (routeName === "AdminDevelopersEdit") {
            return this.prepareEdit().then(this.prepared = true)
        }
    },

    methods: {
        ...photosMethods,
        ...developersMethods,

        dzFeaturedPhotoSuccess() {
            alertSuccessMessage("Promotores", "El promotor fue guardado correctamente.")
            return this.$router.push({ name: "AdminDevelopersIndex" })
        },

        prepareCreate() {
            this.isDestroying = false

            store.dispatch("developers/reset")
            this.form.reset()
            this.form = new Form(this.oneDeveloper)

            window.$(()=> {
                removeDzPreviewTemplate(this.dzFeaturedPhoto.dropzone)
            })

            return Promise.resolve()
        },

        async prepareEdit() {
            this.isDestroying = false

            return await this.fetchOneDeveloper(this.$route.params.id)
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
            this.form[this.method](this.action)
                .then(response => {
                    id = response.data[0].id
                    this.url = "/api/developers/" + id

                    EventBus.$emit("developer-saved", response.data[0])

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
                        alertErrorMessage(error.data.message)
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
