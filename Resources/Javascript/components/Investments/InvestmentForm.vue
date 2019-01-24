<style>
.vue-map-container {
  height: 32rem;
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
      id="investmentPills"
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
          id="description-tab"
          aria-controls="description"
          aria-selected="true"
          class="nav-link"
          data-toggle="tab"
          href="#description"
        >
          Producto
        </a>
      </li>
      <li class="nav-item">
        <a
          id="context-tab"
          aria-controls="context"
          aria-selected="false"
          class="nav-link"
          data-toggle="tab"
          href="#context"
        >
          Contexto
        </a>
      </li>
      <li class="nav-item">
        <a
          id="amenities-tab"
          aria-controls="aminities"
          aria-selected="false"
          class="nav-link"
          data-toggle="tab"
          href="#amenities"
        >
          Amenities
        </a>
      </li>
      <li class="nav-item">
        <a
          id="featured-photo-tab"
          aria-controls="featured-photo"
          aria-selected="false"
          class="nav-link"
          data-toggle="tab"
          href="#featured-photo"
        >
          Foto destacada
        </a>
      </li>
      <li class="nav-item">
        <a
          id="photos-gallery-tab"
          aria-controls="photos-gallery"
          aria-selected="false"
          class="nav-link"
          data-toggle="tab"
          href="#photos-gallery"
        >
          Galería de fotos
        </a>
      </li>
      <li class="nav-item">
        <a
          id="map-tab"
          aria-controls="location"
          aria-selected="true"
          class="nav-link"
          data-toggle="tab"
          href="#map"
        >
          Mapa
        </a>
      </li>
      <li class="nav-item">
        <a
          id="financial-tab"
          aria-controls="financial"
          aria-selected="true"
          class="nav-link"
          data-toggle="tab"
          href="#financial"
        >
          Financial
        </a>
      </li>
    </ul>

    <div class="card">
      <div
        id="project-pills-content"
        class="border-left border-right tab-content"
      >
        <div
          id="main"
          class="card-body tab-pane fade show active"
          role="tabpanel"
          aria-labelledby="main-tab"
        >
          <h5
            class="mb-2"
          >
            Principal
          </h5>
          <div class="form-group">
            <label for="name">
              Nombre *
            </label>
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

          <div class="form-group">
            <label for="slug">
              Identificador amistoso *
            </label>
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

          <div class="row">
            <div class="col-md-4 form-group">
              <label for="city">
                Ciudad *
              </label>
              <input
                v-model="form.city"
                :class="{ 'is-invalid': form.errors.has('city') }"
                class="form-control"
                name="city"
                placeholder="Ciudad"
                required
                type="text"
              >
              <span
                v-if="form.errors.has('city')"
                class="invalid-feedback"
                role="alert"
              >
                <strong v-text="form.errors.get('city')" />
              </span>
            </div>

            <div class="col-md-4 form-group">
              <label for="state">
                Provincia
              </label>
              <input
                v-model="form.state"
                :class="{ 'is-invalid': form.errors.has('state') }"
                class="form-control"
                name="state"
                placeholder="Estado"
                type="text"
              >
              <span
                v-if="form.errors.has('state')"
                class="invalid-feedback"
                role="alert"
              >
                <strong v-text="form.errors.get('state')" />
              </span>
            </div>
  
            <div class="col-md-4 form-group">
              <label for="country">
                País
              </label>
              <input
                v-model="form.country"
                :class="{ 'is-invalid': form.errors.has('country') }"
                class="form-control"
                name="country"
                placeholder="País"
                type="text"
              >
              <span
                v-if="form.errors.has('country')"
                class="invalid-feedback"
                role="alert"
              >
                <strong v-text="form.errors.get('country')" />
              </span>
            </div>
          </div>

          <div class="form-group">
            <label for="total_area">
              Superficie total *
            </label>
            <input
              v-model="form.total_area"
              :class="{ 'is-invalid': form.errors.has('total_area') }"
              class="form-control"
              name="total_area"
              placeholder="Superficie total"
              required
              type="number"
            >
            <span
              v-if="form.errors.has('total_area')"
              class="invalid-feedback"
              role="alert"
            >
              <strong v-text="form.errors.get('total_area')" />
            </span>
          </div>
        </div>

        <div
          id="context"
          class="card-header tab-pane fade show"
          role="tabpanel"
          aria-labelledby="context-tab"
        >
          <h5 class="mb-2">
            Contexto
          </h5>
          <div class="form-group">
            <label
              class="sr-only"
              for="contexto"
            >
              Contexto
            </label>
            <VueEditor
              v-model="form.context"
              :class="{ 'is-invalid': form.errors.has('context') }"
              class="bg-white"
              name="context"
              placeholder="Contexto"
            />
            <span
              v-if="form.errors.has('context')"
              class="invalid-feedback"
              role="alert"
            >
              <strong v-text="form.errors.get('context')" />
            </span>
          </div>
        </div>

        <div
          id="description"
          class="card-header tab-pane fade show"
          role="tabpanel"
          aria-labelledby="description-tab"
        >
          <h5 class="mb-2">
            Producto
          </h5>
          <div class="form-group">
            <label
              class="sr-only"
              for="description"
            >
              Producto
            </label>
            <VueEditor
              v-model="form.description"
              :class="{ 'is-invalid': form.errors.has('description') }"
              class="bg-white"
              name="description"
              placeholder="Descripción"
            />
            <span
              v-if="form.errors.has('description')"
              class="invalid-feedback"
              role="alert"
            >
              <strong v-text="form.errors.get('description')" />
            </span>
          </div>
        </div>

        <div
          id="amenities"
          class="card-header tab-pane fade show"
          role="tabpanel"
          aria-labelledby="amenities-tab"
        >
          <h5 class="mb-2">
            Amenities
          </h5>
          <div class="form-group">
            <label
              class="sr-only"
              for="description"
            >
              Descripción
            </label>
            <VueEditor
              v-model="form.amenities"
              :class="{ 'is-invalid': form.errors.has('amenities') }"
              class="bg-white"
              name="amenities"
              placeholder="Amenities"
            />
            <span
              v-if="form.errors.has('amenities')"
              class="invalid-feedback"
              role="alert"
            >
              <strong v-text="form.errors.get('amenities')" />
            </span>
          </div>
        </div>

        <div
          id="featured-photo"
          class="card-header tab-pane fade show"
          role="tabpanel"
          aria-labelledby="featured-photo-tab"
        >
          <h5 class="mb-2">
            Foto destacada
          </h5>
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

        <div
          id="photos-gallery"
          class="card-header tab-pane fade show"
          role="tabpanel"
          aria-labelledby="photos-gallery-tab"
        >
          <h5 class="mb-2">
            Galería de fotos
          </h5>
          <VueDropzone
            id="dzUnfeaturedPhotos"
            ref="dzUnfeaturedPhotos"
            :options="dzUnfeaturedPhotosOptions"
            @vdropzone-error="dzUnfeaturedPhotosFail"
            @vdropzone-files-added="dzUnfeaturedPhotosAddOrRemoveFiles"
            @vdropzone-removed-file="dzUnfeaturedPhotosRemoveFile"
            @vdropzone-processing="dzUnfeaturedPhotosSetUrl"
            @vdropzone-success-multiple="dzUnfeaturedPhotosSucceed"
          />
        </div>

        <div
          v-if="form.map"
          id="map"
          class="card-header tab-pane fade show"
          role="tabpanel"
          aria-labelledby="map-tab"
        >
          <h5 class="mb-2">
            Mapa
          </h5>
          <div class="row mb-3">
            <div class="col-sm-4 form-group">
              <label for="map.lat">
                Latitud
              </label>
              <input
                v-model="form.map.lat"
                :class="{ 'is-invalid': form.errors.has('map.lat') }"
                class="form-control"
                name="map.lat"
                placeholder="Latitud"
                type="text"
              >
              <span
                v-if="form.errors.has('map.lat')"
                class="invalid-feedback"
                role="alert"
              >
                <strong v-text="form.errors.get('map.lat')" />
              </span>
            </div>
            <div class="col-sm-4 form-group">
              <label for="map.lng">
                Longitud
              </label>
              <input
                v-model="form.map.lng"
                :class="{ 'is-invalid': form.errors.has('map.lng') }"
                class="form-control"
                name="map.lng"
                placeholder="Longitud"
                type="text"
              >
              <span
                v-if="form.errors.has('map.lng')"
                class="invalid-feedback"
                role="alert"
              >
                <strong v-text="form.errors.get('map.lng')" />
              </span>
            </div>

            <div class="col-sm-4 form-group">
              <label for="map.zoom">
                Zoom
              </label>
              <input
                v-model="form.map.zoom"
                :class="{ 'is-invalid': form.errors.has('map.zoom') }"
                :disabled="true"
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

          <gmap-map
            ref="map"
            :center="center"
            :zoom="form.map.zoom"
            @zoom_changed="form.map.zoom = $event"
          >
            <gmap-marker
              ref="marker"
              :draggable="true"
              :position="center"
              @dragend="setMapPositionFromMarker"
            />
          </gmap-map>
        </div>

        <div
          id="financial"
          class="card-header tab-pane fade show"
          role="tabpanel"
          aria-labelledby="financial-tab"
        >
          <h5>Retornos</h5>
          <div class="card card-body mb-3">
            <div class="row">
              <div class="col-md-6">
                <div class="row">
                  <div class="col-12 form-group">
                    <label for="financial.open_offer">
                      Oferta abierta
                    </label>
                    <input
                      v-model="form.financial.open_offer"
                      :class="{ 'is-invalid': form.errors.has('financial.open_offer') }"
                      class="form-control"
                      name="financial.open_offer"
                      placeholder="Oferta abierta"
                      type="number"
                    >
                    <span
                      v-if="form.errors.has('financial.open_offer')"
                      class="invalid-feedback"
                      role="alert"
                    >
                      <strong v-text="form.errors.get('financial.open_offer')" />
                    </span>
                  </div>
      
                  <div class="col-12 form-group">
                    <label for="financial.funded">
                      Financiado
                    </label>
                    <input
                      v-model="form.financial.funded"
                      :class="{ 'is-invalid': form.errors.has('financial.funded') }"
                      class="form-control"
                      name="financial.funded"
                      placeholder="Financiado"
                      type="number"
                    >
                    <span
                      v-if="form.errors.has('financial.funded')"
                      class="invalid-feedback"
                      role="alert"
                    >
                      <strong v-text="form.errors.get('financial.funded')" />
                    </span>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-4 form-group">
                    <label for="financial.irr">
                      TIR (%)
                    </label>
                    <input
                      v-model="form.financial.irr"
                      :class="{ 'is-invalid': form.errors.has('financial.irr') }"
                      class="form-control"
                      name="financial.irr"
                      placeholder="Tasa Interna de Retorno (%)"
                      type="number"
                    >
                    <span
                      v-if="form.errors.has('financial.irr')"
                      class="invalid-feedback"
                      role="alert"
                    >
                      <strong v-text="form.errors.get('financial.irr')" />
                    </span>
                  </div>
                  <div class="col-sm-4 form-group">
                    <label for="financial.apr">
                      TAP (%)
                    </label>
                    <input
                      v-model="form.financial.apr"
                      :class="{ 'is-invalid': form.errors.has('financial.apr') }"
                      class="form-control"
                      name="financial.apr"
                      placeholder="Tasa Anual de Preferencia (%)"
                      type="number"
                    >
                    <span
                      v-if="form.errors.has('financial.apr')"
                      class="invalid-feedback"
                      role="alert"
                    >
                      <strong v-text="form.errors.get('financial.apr')" />
                    </span>
                  </div>
                  <div class="col-sm-4 form-group">
                    <label for="financial.ehp">
                      PET (meses)
                    </label>
                    <input
                      v-model="form.financial.ehp"
                      :class="{ 'is-invalid': form.errors.has('financial.ehp') }"
                      class="form-control"
                      name="financial.ehp"
                      placeholder="Período Estimado de Tenencia (meses)"
                      type="number"
                    >
                    <span
                      v-if="form.errors.has('financial.ehp')"
                      class="invalid-feedback"
                      role="alert"
                    >
                      <strong v-text="form.errors.get('financial.ehp')" />
                    </span>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <pie-chart
                  :donut="true"
                  :data="[['Financiado', form.financial.funded], ['Restante', (form.financial.open_offer - form.financial.funded)]]"
                />
              </div>
            </div>
          </div>

          <h5>Capitalización</h5>
          <div class="card card-body mb-3">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="financial.senior_debt">
                    Deuda Senior
                  </label>
                  <input
                    v-model="form.financial.senior_debt"
                    :class="{ 'is-invalid': form.errors.has('financial.senior_debt') }"
                    class="form-control"
                    name="financial.senior_debt"
                    placeholder="Deuda Senior"
                    type="number"
                  >
                  <span
                    v-if="form.errors.has('financial.senior_debt')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('financial.senior_debt')" />
                  </span>
                </div>
  
                <div class="form-group">
                  <label for="financial.mezzanine_debt">
                    Deuda Mezzanine
                  </label>
                  <input
                    v-model="form.financial.mezzanine_debt"
                    :class="{ 'is-invalid': form.errors.has('financial.mezzanine_debt') }"
                    class="form-control"
                    name="financial.mezzanine_debt"
                    placeholder="Deuda Mezzanine"
                    type="number"
                  >
                  <span
                    v-if="form.errors.has('financial.mezzanine_debt')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('financial.mezzanine_debt')" />
                  </span>
                </div>
      
                <div class="form-group">
                  <label for="financial.equity">
                    Capital existente
                  </label>
                  <input
                    v-model="form.financial.equity"
                    :class="{ 'is-invalid': form.errors.has('financial.equity') }"
                    class="form-control"
                    name="financial.equity"
                    placeholder="Capital Existente"
                    type="number"
                  >
                  <span
                    v-if="form.errors.has('financial.equity')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('financial.equity')" />
                  </span>
                </div>
              </div>

              <div class="col-md-6">
                <pie-chart
                  :donut="true"
                  :data="[['Deuda Senior', form.financial.senior_debt], ['Deuda Mezzanine', form.financial.mezzanine_debt], ['Capital existente', form.financial.equity]]"
                />
              </div>
            </div>
          </div>

          <h5>Fondeo</h5>
          <div class="card card-body mb-2">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="financial.adquisition_cost">
                    Costos de Adquisición
                  </label>
                  <input
                    v-model="form.financial.adquisition_cost"
                    :class="{ 'is-invalid': form.errors.has('financial.adquisition_cost') }"
                    class="form-control"
                    name="financial.adquisition_cost"
                    placeholder="Costos de Adquisición"
                    type="number"
                  >
                  <span
                    v-if="form.errors.has('financial.adquisition_cost')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('financial.adquisition_cost')" />
                  </span>
                </div>
  
                <div class="form-group">
                  <label for="financial.development_cost">
                    Costos de Desarrollo
                  </label>
                  <input
                    v-model="form.financial.development_cost"
                    :class="{ 'is-invalid': form.errors.has('financial.development_cost') }"
                    class="form-control"
                    name="financial.development_cost"
                    placeholder="Costos de Desarrollo"
                    type="number"
                  >
                  <span
                    v-if="form.errors.has('financial.development_cost')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('financial.development_cost')" />
                  </span>
                </div>
      
                <div class="row">
                  <div class="col-sm-6 form-group">
                    <label for="financial.bank">
                      Banco
                    </label>
                    <input
                      v-model="form.financial.bank"
                      :class="{ 'is-invalid': form.errors.has('financial.bank') }"
                      class="form-control"
                      name="financial.bank"
                      placeholder="Banco"
                      type="text"
                    >
                    <span
                      v-if="form.errors.has('financial.bank')"
                      class="invalid-feedback"
                      role="alert"
                    >
                      <strong v-text="form.errors.get('financial.bank')" />
                    </span>
                  </div>
      
                  <div class="col-sm-6 form-group">
                    <label for="financial.crowdfunding">
                      Crowdfunding
                    </label>
                    <input
                      v-model="form.financial.crowdfunding"
                      :class="{ 'is-invalid': form.errors.has('financial.crowdfunding') }"
                      class="form-control"
                      name="financial.crowdfunding"
                      placeholder="Crowdfunding"
                      type="text"
                    >
                    <span
                      v-if="form.errors.has('financial.crowdfunding')"
                      class="invalid-feedback"
                      role="alert"
                    >
                      <strong v-text="form.errors.get('financial.crowdfunding')" />
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <pie-chart
                  :donut="true"
                  :data="[['Desarrollo', form.financial.development_cost], ['Adquisición', form.financial.adquisition_cost]]"
                />
              </div>
            </div>
          </div> 
        </div>
      </div>

      <div class="card-footer text-right">
        <router-link 
          :to="{ name: 'AdminInvestmentsIndex' }" 
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
import * as VueGoogleMaps from "vue2-google-maps"
import { VueEditor } from "vue2-editor"
import { getSavedState, mapDzMockFile, previewDzThumbnailFromFile } from "@/utilities/helpers"
import { investmentsComputed } from "../../store/helpers"
import { photosMethods } from "@/store/helpers"
import { pick } from "lodash"
import { slugify } from "@/utilities/helpers"
import vue2Dropzone from "vue2-dropzone"
import Form from "@/utilities/Form"

const token = getSavedState("auth.token")
const csrfToken = document.head.querySelector("meta[name=\"csrf-token\"]").content

export default {

    name: "InvestmentForm",

    components: {
        VueDropzone: vue2Dropzone,
        VueEditor
    },

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
            center: {},
            dzFeaturedPhotoHasAcceptedFiles: false,
            dzFeaturedPhotoHasError: false,
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
                url: "/api/investments",
            },
            dzUnfeaturedPhotosHasAcceptedFiles: false,
            dzUnfeaturedPhotosHasError: false,
            dzUnfeaturedPhotosOptions: {
                addRemoveLinks: true,
                autoProcessQueue: false,
                dictDefaultMessage: "<i class='fa fa-cloud-upload'></i><br/>Hacé click o arrastrá una o más fotos hacía acá",
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                    "Authorization": "Bearer " + token
                },
                maxFiles: 8,
                maxFilesize: 0.4,
                method: "put",
                parallelUploads: 8,
                paramName: "unfeatured_photos",
                uploadMultiple: true,
                url: "/api/investments",
            },
            form: {},
            marker: {},
            submitted: false,
            tab: "main",
            url: "/api/investments",
        }
    },

    computed: {
        ...investmentsComputed,

        dzFeaturedPhoto() {
            return this.$refs.dzFeaturedPhoto
        },

        dzUnfeaturedPhotos() {
            return this.$refs.dzUnfeaturedPhotos
        },

        gmapApi: VueGoogleMaps.gmapApi,

        validated() {
            return this.form.errors.any()
        }
    },

    created() {
        this.form = new Form(this.oneInvestment),
        this.center = pick(this.oneInvestment.map, ["lat","lng"])

        this.$store.watch(state => state.investments.one, (value)=> {
            this.form = new Form(value)
            this.center = pick(value.map, ["lat","lng"])

            this.dzFeaturedPhotoCancel()
            this.dzUnfeaturedPhotosCancel()

        })
    },

    mounted() {
        return this.setMap()
    },

    methods: {
        ...photosMethods, 

        dzFeaturedPhotoAddOrRemoveFiles() {
            return this.dzFeaturedPhotoHasAcceptedFiles = this.dzFeaturedPhoto.getAcceptedFiles().length > 0
        },

        dzFeaturedPhotoCancel() {
            if (this.dzFeaturedPhoto.getQueuedFiles().length > 0) {
                this.dzFeaturedPhoto.removeAllFiles()
                return this.dzFeaturedPhotoMounted()
            }

            if (this.dzFeaturedPhoto.getAcceptedFiles().length === 0) {
                return this.dzFeaturedPhotoMounted()
            }

            return
        },

        dzFeaturedPhotoRemoveFile(file) {
            if (file.id) {
                this.deleteOnePhoto(file.id)
            }

            this.dzFeaturedPhotoAddOrRemoveFiles()
        },

        dzFeaturedPhotoFail() {
            return this.dzFeaturedPhotoHasError = true
        },

        dzFeaturedPhotoMounted() {
            if (this.oneInvestment.featured_photo) {
                return previewDzThumbnailFromFile(this.dzFeaturedPhoto.dropzone, mapDzMockFile(this.oneInvestment.featured_photo))
            }
        },

        dzFeaturedPhotoProcessQueue() {
            if (this.dzFeaturedPhoto) {
                this.dzFeaturedPhotoHasError = false
                return Promise.resolve(this.dzFeaturedPhoto.processQueue())
            }
        },

        dzFeaturedPhotoSetUrl() {
            if (this.dzFeaturedPhoto) {
                return this.dzFeaturedPhoto.setOption("url", this.url)
            }
        },

        dzFeaturedPhotoSucceed(file, response) {
            return Promise.resolve([file, response])
        },

        dzUnfeaturedPhotosAddOrRemoveFiles() {
            return this.dzUnfeaturedPhotosHasAcceptedFiles = this.dzUnfeaturedPhotos.getAcceptedFiles().length > 0
        },

        dzUnfeaturedPhotosCancel() {
            if (this.dzUnfeaturedPhotos.getQueuedFiles().length > 0) {
                this.dzUnfeaturedPhotos.removeAllFiles()
                return this.dzUnfeaturedPhotosMounted()
            }

            if (this.dzUnfeaturedPhotos.getAcceptedFiles().length === 0) {
                return this.dzUnfeaturedPhotosMounted()
            }

            return
        },

        dzUnfeaturedPhotosFail() {
            return this.dzUnfeaturedPhotosHasError = true
        },

        dzUnfeaturedPhotosMounted() {
            var unfeaturedPhotos = this.oneInvestment.unfeatured_photos
            if (unfeaturedPhotos) {
                return unfeaturedPhotos.forEach(unfeaturedPhoto => {
                    return previewDzThumbnailFromFile(this.dzUnfeaturedPhotos.dropzone, mapDzMockFile(unfeaturedPhoto))
                })
            }
        },

        dzUnfeaturedPhotosProcessQueue() {
            if (this.dzUnfeaturedPhotos) {
                this.dzUnfeaturedPhotosHasError = false
                return Promise.resolve(this.dzUnfeaturedPhotos.processQueue())
            }
        },

        dzUnfeaturedPhotosRemoveFile(file) {
            if (file.id) {
                this.deleteOnePhoto(file.id)
            }

            this.dzUnfeaturedPhotosAddOrRemoveFiles()
        },

        dzUnfeaturedPhotosSetUrl() {
            if (this.dzUnfeaturedPhotos) {
                return this.dzUnfeaturedPhotos.setOption("url", this.url)
            }
        },

        dzUnfeaturedPhotosSucceed(file, response) {
            return Promise.resolve([file, response])
        },

        setMap: function() {
            if (this.gmapApi) {
                var maps = this.gmapApi.maps
                this.$refs.map.$mapPromise.then(map => {
                    this.bounds = new maps.LatLngBounds()
                    this.bounds.extend(this.center)

                    //map.fitBounds(this.bounds)
                    map.panToBounds(this.bounds)

                    return maps.event.trigger(map, "resize")
                })
                    .catch(map => {
                        console.error(map)
                    })
            }
        },

        setMapPositionFromMarker(marker) {
            this.form.map["lat"] = marker.latLng.lat()
            this.form.map["lng"] = marker.latLng.lng()
        },

        submitForm() {
            this.submitted = true

            this.form.featured_photo = {}
            this.form.unfeatured_photos = []

            var id
            this.form[this.method](this.action)
                .then(response => {
                    id = response.data[0].id
                    this.url = "/api/investments/" + id
                    return this.dzFeaturedPhotoProcessQueue()
                })
                .then(() => {
                    return this.dzUnfeaturedPhotosProcessQueue()
                })
                .then(() => {
                    this.$snotify.success("El registro nº " + id + " fue guardado correctamente.")
                    this.$router.push({ name: "AdminInvestmentsIndex" })
                    return this.submitted = false
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
