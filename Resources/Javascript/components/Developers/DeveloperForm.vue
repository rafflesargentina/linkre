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
    @submit.prevent="submitForm"
    @keydown="form.errors.clear($event.target.name)"
  >
    <ul
      id="investor-pills"
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
                  for="document_type_id"
                  class="col-6 col-form-label text-muted"
                >
                  Tipo *
                </label>
                <div class="col-6 col-lg-4">
                  <select
                    v-model="form.document_type_id"
                    :class="{ 'is-invalid': form.errors.has('document_type_id') }"
                    class="form-control"
                    name="document_type_id"
                    required
                  >
                    <option value="">
                      Tipo
                    </option>
                    <option
                      v-for="item in allDocumentTypes"
                      :key="item.id"
                      :value="item.id"
                    >
                      {{ item.name }}
                    </option>
                  </select>
                  <span
                    v-if="form.errors.has('document_type_id')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('document_type_id')" />
                  </span>
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="form-group row mb-0">
                <label
                  for="document_number"
                  class="col-6 col-form-label text-muted"
                >
                  Número *
                </label>
                <div class="col-6 col-lg-4">
                  <input
                    v-model="form.document_number"
                    :class="{ 'is-invalid': form.errors.has('document_number') }"
                    class="form-control"
                    name="document_number"
                    placeholder="Número"
                    required
                    type="text"
                  >
                  <span
                    v-if="form.errors.has('document_number')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('document_number')" />
                  </span>
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="form-group row mb-0">
                <label
                  for="first_name"
                  class="col-6 col-form-label text-muted"
                >
                  Nombre *
                </label>
                <div class="col-6 col-lg-4">
                  <input
                    v-model="form.first_name"
                    :class="{ 'is-invalid': form.errors.has('first_name') }"
                    class="form-control"
                    name="first_name"
                    placeholder="Nombre"
                    required
                    type="text"
                  >
                  <span
                    v-if="form.errors.has('first_name')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('first_name')" />
                  </span>
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="form-group row mb-0">
                <label
                  for="last_name"
                  class="col-6 col-form-label text-muted"
                >
                  Apellido *
                </label>
                <div class="col-6 col-lg-4">
                  <input
                    v-model="form.last_name"
                    :class="{ 'is-invalid': form.errors.has('last_name') }"
                    class="form-control"
                    name="last_name"
                    placeholder="Apellido"
                    required
                    type="text"
                  >
                  <span
                    v-if="form.errors.has('last_name')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('last_name')" />
                  </span>
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="form-group row mb-0">
                <label
                  for="email"
                  class="col-6 col-form-label text-muted"
                >
                  Email *
                </label>
                <div class="col-6 col-lg-4">
                  <input
                    v-model="form.email"
                    :class="{ 'is-invalid': form.errors.has('email') }"
                    class="form-control"
                    name="email"
                    placeholder="Email"
                    required
                    type="email"
                    @keyup="form.slug = updateSlug($event.target.value)"
                  >
                  <span
                    v-if="form.errors.has('email')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('email')" />
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
              Contraseña
            </h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <div class="form-group row mb-0">
                <label
                  for="password"
                  class="col-6 col-form-label text-muted"
                >
                  Contraseña
                </label>
                <div class="col-6 col-lg-4">
                  <input
                    v-model="form.password"
                    :class="{ 'is-invalid': form.errors.has('password') }"
                    class="form-control"
                    name="password"
                    placeholder="Contraseña"
                    required
                    type="password"
                  >
                  <span
                    v-if="form.errors.has('password')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('password')" />
                  </span>
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="form-group row mb-0">
                <label
                  for="password"
                  class="col-6 col-form-label text-muted"
                >
                  Confirmación de contraseña
                </label>
                <div class="col-6 col-lg-4">
                  <input
                    v-model="form.password_confirmation"
                    :class="{ 'is-invalid': form.errors.has('password_confirmation') }"
                    class="form-control"
                    name="password_confirmation"
                    placeholder="Confirmación de contraseña"
                    required
                    type="password"
                  >
                  <span
                    v-if="form.errors.has('password_confirmation')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('password_confirmation')" />
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
                    @vdropzone-error="dzFeaturedPhotoFail"
                    @vdropzone-files-added="dzFeaturedPhotoAddOrRemoveFiles"
                    @vdropzone-removed-file="dzFeaturedPhotoRemoveFile"
                    @vdropzone-processing="dzFeaturedPhotoSetUrl"
                    @vdropzone-success-multiple="dzFeaturedPhotoSucceed"
                  />
                </div>
              </div>
            </li>
          </ul>

          <div class="card-header bg-white p-2 p-md-4">
            <h5 class="text-primary m-0">
              Ubicación y Mapa
            </h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <div class="form-group row mb-0">
                <label
                  for="autocomplete"
                  class="col-6 col-form-label text-muted"
                >
                  Ubicación *
                </label>
                <div class="col-6 col-lg-4">
                  <input
                    id="autocomplete"
                    v-model="location"
                    name="autocomplete"
                    class="form-control"
                    @input="geolocate"
                  >
                  <input
                    id="country"
                    v-model="form.address.country"
                    name="address.country"
                    class="form-control"
                    type="hidden"
                  >
                  <input
                    id="route"
                    v-model="form.address.street_name"
                    name="address.street_name"
                    class="form-control"
                    type="hidden"
                  >
                  <input
                    id="locality"
                    v-model="form.address.locality"
                    name="address.locality"
                    class="form-control"
                    type="hidden"
                  >
                  <input
                    id="administrative_area_level_1"
                    v-model="form.address.state"
                    name="address.state"
                    class="form-control"
                    type="hidden"
                  >
                  <input
                    id="postal_code"
                    v-model="form.address.zip"
                    name="address.zip"
                    class="form-control"
                    type="hidden"
                  >
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="form-group row mb-0">
                <label
                  for="map.lat"
                  class="col-6 col-form-label text-muted"
                >
                  Latitud
                </label>
                <div class="col-6 col-lg-4">
                  <input
                    v-model="form.map.lat"
                    :class="{ 'is-invalid': form.errors.has('map.lat') }"
                    class="form-control"
                    name="map.lat"
                    placeholder="Latitud"
                    type="number"
                  >
                  <span
                    v-if="form.errors.has('map.lat')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('map.lat')" />
                  </span>
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="form-group row mb-0">
                <label
                  for="map.lng"
                  class="col-6 col-form-label text-muted"
                >
                  Longitud
                </label>
                <div class="col-6 col-lg-4">
                  <input
                    v-model="form.map.lng"
                    :class="{ 'is-invalid': form.errors.has('map.lng') }"
                    class="form-control"
                    name="map.lng"
                    placeholder="Longitud"
                    type="number"
                  >
                  <span
                    v-if="form.errors.has('map.lng')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('map.lng')" />
                  </span>
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="form-group row mb-0">
                <label
                  for="map.zoom"
                  class="col-6 col-form-label text-muted"
                >
                  Zoom
                </label>
                <div class="col-6 col-lg-4">
                  <input
                    v-model="form.map.zoom"
                    :class="{ 'is-invalid': form.errors.has('map.zoom') }"
                    class="form-control"
                    name="map.zoom"
                    placeholder="Zoom"
                    type="number"
                  >
                  <span
                    v-if="form.errors.has('map.zoom')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('map.zoom')" />
                  </span>
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <div
                id="map"
                ref="map"
                class="map"
              />
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
import { documentTypesComputed } from "@/store/helpers"
import { developersComputed } from "@linkre/store/helpers"
import { getSavedState } from "@/utilities/helpers"
import { photosMethods } from "@/store/helpers"
import { google } from "@/utilities/mixins/google"
import { slugify } from "@/utilities/helpers"

import vue2Dropzone from "vue2-dropzone"
import Form from "@/utilities/Form"

const token = getSavedState("auth.token")
const csrfToken = document.head.querySelector("meta[name=\"csrf-token\"]").content

export default {

    name: "DeveloperForm",

    components: {
        VueDropzone: vue2Dropzone,
    },

    mixins: [dz, google],

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
                maxFilesize: 0.4,
                method: "put",
                paramName: "featured_photo",
                uploadMultiple: true,
                url: "/api/developers",
            },
            form: new Form(),
            isDestroying: false,
            location: "",
            submitted: false,
            url: "/api/developers",
        }
    },

    computed: {
        ...documentTypesComputed,
        ...developersComputed,

        validated() {
            return this.form.errors.any()
        }
    },

    created() {
        this.prepare(this.oneDeveloper)

        this.$store.watch(state => state.developers.one, (value)=> {
            this.isDestroying = false
            this.prepare(value)
            this.dzFeaturedPhotoMounted(value.featured_photo)
        })
    },

    mounted() {
        return this.initAutocomplete()
    },

    methods: {
        ...photosMethods, 

        prepare(one) {
            this.form = new Form(one)
            this.location = one.address.location

            this.geolocate().then(value => {
                if (null !== one.map.lat || null !== one.map.lng) {
                    return this.coordinates = one.map.coordinates
                }
            })

            if (this.$refs.map) {
                this.initMap("map", { center: this.geolocation, zoom: this.oneDeveloper.map.zoom })
            }
        },

        submitForm() {
            this.submitted = true

            this.form.featured_photo = {}

            var id
            this.form[this.method](this.action)
                .then(response => {
                    id = response.data[0].id
                    this.url = "/api/developers/" + id
                    return this.dzFeaturedPhotoProcessQueue()
                })
                .then(() => {
                    this.submitted = false
                    this.$snotify.success("El registro nº " + id + " fue guardado correctamente.")
                    return this.$router.push({ name: "AdminDevelopersIndex" })
                }).catch(error => {
                    if (error.status > 422) {
                        this.$snotify.error("Ocurrió un error con el siguiente mensaje: " + error.data.message)
                    }

                    return this.submitted = false
                })
        },

        updateSlug(value) {
            return this.form.slug = slugify(value)
        }
    }
}
</script>
