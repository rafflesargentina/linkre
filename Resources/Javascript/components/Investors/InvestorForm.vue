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
          Perfil
        </a>
      </li>

      <li class="nav-item">
        <a
          id="assigned-investments-tab"
          aria-controls="assigned-investments"
          aria-selected="false"
          class="nav-link"
          data-toggle="tab"
          href="#assigned-investments"
        >
          Proyectos asignados
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
              Perfil
            </h5>
          </div>

          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <div class="form-group row mb-0">
                <label
                  for="preferences"
                  class="col-6 col-form-label text-muted"
                >
                  Preferencias de Inversión
                </label>
                <div class="col-6 col-lg-4">
                  <ul>
                    <li
                      v-for="item in allInvestmentPreferences"
                      :key="item.id"
                    >
                      <span v-if="oneInvestor.investor_profile.investment_preferences.map(i => i.id).includes(item.id)">{{ item.name }}</span><del
                        v-else
                        class="text-muted"
                      >{{ item.name }}</del>
                    </li>
                  </ul>
                </div>
              </div>
            </li>

            <li class="list-group-item">
              <div class="form-group row mb-0">
                <label
                  for="investor_profile.investor_type_id"
                  class="col-6 col-form-label text-muted"
                >
                  ¿Qué tipo de Inversor es?
                </label>
                <div class="col-6 col-lg-4">
                  <select
                    v-model="form.investor_profile.investor_type_id"
                    :class="{ 'is-invalid': form.errors.has('investor_profile.investor_type_id') }"
                    :disabled="true"
                    class="form-control"
                    name="investor_profile.investor_type_id"
                    placeholder="¿Qué tipo de Inversor es?"
                  >
                    <option
                      value=""
                      :selected="true"
                    >
                      Tipo de Inversor
                    </option>
                    <option
                      v-for="item in allInvestorTypes"
                      :key="'investorType-' + item.id"
                      :value="item.id"
                    >
                      {{ item.name }}
                    </option>
                  </select>
                  <span
                    v-if="form.errors.has('investor_profile.investor_type_id')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('investor_profile.investor_type_id')" />
                  </span>
                </div>
              </div>
            </li>

            <li class="list-group-item">
              <div class="form-group row mb-0">
                <label
                  for="investor_profile.investment_type_id"
                  class="col-6 col-form-label text-muted"
                >
                  ¿Qué tipos de Inversión busca?
                </label>
                <div class="col-6 col-lg-4">
                  <select
                    v-model="form.investor_profile.investment_type_id"
                    :class="{ 'is-invalid': form.errors.has('investor_profile.investment_type_id') }"
                    :disabled="true"
                    class="form-control"
                    name="investor_profile.investment_type_id"
                    placeholder="¿Qué tipo de Inversión busca?"
                  >
                    <option
                      value=""
                      :selected="true"
                    >
                      Tipo de Inversión
                    </option>
                    <option
                      v-for="item in allInvestmentTypes"
                      :key="'investmentType-' + item.id"
                      :value="item.id"
                    >
                      {{ item.name }}
                    </option>
                  </select>
                  <span
                    v-if="form.errors.has('investor_profile.investment_type_id')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('investor_profile.investment_type_id')" />
                  </span>
                </div>
              </div>
            </li>

            <li class="list-group-item">
              <div class="form-group row mb-0">
                <label
                  for="investor_profile.investment_value_id"
                  class="col-6 col-form-label text-muted"
                >
                  ¿Entre qué valores?
                </label>
                <div class="col-6 col-lg-4">
                  <select
                    v-model="form.investor_profile.investment_value_id"
                    :class="{ 'is-invalid': form.errors.has('investor_profile.investment_value_id') }"
                    :disabled="true"
                    class="form-control"
                    name="investor_profile.investment_value_id"
                    placeholder="¿Entre qué valores?"
                  >
                    <option
                      value=""
                      :selected="true"
                    >
                      Valor de Inversión
                    </option>
                    <option
                      v-for="item in allInvestmentValues"
                      :key="'investmentValue-' + item.id"
                      :value="item.id"
                    >
                      {{ item.name }}
                    </option>
                  </select>
                  <span
                    v-if="form.errors.has('investor_profile.investment_value_id')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('investor_profile.investment_value_id')" />
                  </span>
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
                    <option
                      value=""
                      :selected="true"
                    >
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
              Perfil Inversor
            </h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <div class="form-group row mb-0">
                <label
                  for="preferences"
                  class="col-6 col-form-label text-muted"
                >
                  Preferencias de Inversión
                </label>
                <div class="col-6 col-lg-4">
                  <ul>
                    <li
                      v-for="item in allInvestmentPreferences"
                      :key="item.id"
                    >
                      <span v-if="oneInvestor.investor_profile.investment_preferences.find(investment_preference => investment_preference.id === item.id)">{{ item.name }}</span><del v-else>{{ item.name }}</del>
                    </li>
                  </ul>
                </div>
              </div>
            </li>

            <li class="list-group-item">
              <div class="form-group row mb-0">
                <label
                  for="investor_profile.investor_type_id"
                  class="col-6 col-form-label text-muted"
                >
                  ¿Qué tipo de Inversor es?
                </label>
                <div class="col-6 col-lg-4">
                  <select
                    v-model="form.investor_profile.investor_type_id"
                    :class="{ 'is-invalid': form.errors.has('investor_profile.investor_type_id') }"
                    :disabled="true"
                    class="form-control"
                    name="investor_profile.investor_type_id"
                    placeholder="¿Qué tipo de Inversor es?"
                  >
                    <option
                      value=""
                      :selected="true"
                    >
                      Tipo de Inversor
                    </option>
                    <option
                      v-for="item in allInvestorTypes"
                      :key="'investorType-' + item.id"
                      :value="item.id"
                    >
                      {{ item.name }}
                    </option>
                  </select>
                  <span
                    v-if="form.errors.has('investor_profile.investor_type_id')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('investor_profile.investor_type_id')" />
                  </span>
                </div>
              </div>
            </li>

            <li class="list-group-item">
              <div class="form-group row mb-0">
                <label
                  for="investor_profile.investment_type_id"
                  class="col-6 col-form-label text-muted"
                >
                  ¿Qué tipos de Inversión busca?
                </label>
                <div class="col-6 col-lg-4">
                  <select
                    v-model="form.investor_profile.investment_type_id"
                    :class="{ 'is-invalid': form.errors.has('investor_profile.investment_type_id') }"
                    :disabled="true"
                    class="form-control"
                    name="investor_profile.investment_type_id"
                    placeholder="¿Qué tipo de Inversión busca?"
                  >
                    <option
                      value=""
                      :selected="true"
                    >
                      Tipo de Inversión
                    </option>
                    <option
                      v-for="item in allInvestmentTypes"
                      :key="'investmentType-' + item.id"
                      :value="item.id"
                    >
                      {{ item.name }}
                    </option>
                  </select>
                  <span
                    v-if="form.errors.has('investor_profile.investment_type_id')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('investor_profile.investment_type_id')" />
                  </span>
                </div>
              </div>
            </li>

            <li class="list-group-item">
              <div class="form-group row mb-0">
                <label
                  for="investor_profile.investment_value_id"
                  class="col-6 col-form-label text-muted"
                >
                  ¿Entre qué valores?
                </label>
                <div class="col-6 col-lg-4">
                  <select
                    v-model="form.investor_profile.investment_value_id"
                    :class="{ 'is-invalid': form.errors.has('investor_profile.investment_value_id') }"
                    :disabled="true"
                    class="form-control"
                    name="investor_profile.investment_value_id"
                    placeholder="¿Entre qué valores?"
                  >
                    <option
                      value=""
                      :selected="true"
                    >
                      Valor de Inversión
                    </option>
                    <option
                      v-for="item in allInvestmentValues"
                      :key="'investmentValue-' + item.id"
                      :value="item.id"
                    >
                      {{ item.name }}
                    </option>
                  </select>
                  <span
                    v-if="form.errors.has('investor_profile.investment_value_id')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('investor_profile.investment_value_id')" />
                  </span>
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

        <div
          id="assigned-investments"
          class="tab-pane fade"
          role="tabpanel"
          aria-labelledby="assigned-investments-tab"
        >
          <div class="card-header bg-white p-2 p-md-4">
            <h5 class="text-primary m-0">
              Proyectos asignados
            </h5>
          </div>
          <div class="card-body">
            <quick-search
              ref="quickSearch"
              :items="allInvestments"
            />
          </div>

          <div v-if="$refs.quickSearch">
            <dynamic-table
              v-if="$refs.quickSearch.filteredItems.length > 0"
              :columns="columns"
              :items="$refs.quickSearch.filteredItems"
              :per-page="12"
              :sort-direction="'desc'"
              :sort-key="'updated_at'"
            >
              <th
                slot="th"
                class="th--acciones"
              >
                Asignación
              </th>
              <td
                slot="td"
                slot-scope="item"
              >
                <input
                  v-model="assignedInvestments"
                  type="checkbox"
                  class="form-check-input"
                  :checked="isInvestmentAssigned(item.id)"
                  :value="item.id"
                >
                <label
                  class="form-check-label"
                  for="assignedInvestments"
                >
                  Asignado
                </label>
              </td>
            </dynamic-table>

            <div v-if="$refs.quickSearch.filteredItems.length === 0">
              <div class="card-body">
                <p class="mb-0">
                  No hay resultados para mostrar.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="card-footer bg-white text-right">
        <router-link 
          :to="{ name: 'AdminInvestorsIndex' }" 
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
import { alertErrorMessage, alertSuccessMessage, deepClone, getSavedState, removeDzPreviewTemplate, slugify } from "@/utilities/helpers"
import { documentTypesComputed, documentTypesMethods, photosMethods } from "@/store/helpers"
import { dz } from "@/utilities/mixins/dz"
import { investmentsComputed, investmentsMethods, investmentPreferencesComputed, investmentPreferencesMethods, investmentTypesComputed, investmentTypesMethods, investmentValuesComputed, investmentValuesMethods, investorsComputed, investorsMethods, investorTypesComputed, investorTypesMethods } from "@linkre/store/helpers"
import { EventBus } from "@/eventBus"

import store from "@/store"
import vue2Dropzone from "vue2-dropzone"
import Form from "@/utilities/Form"

const token = getSavedState("auth.token")
const csrfToken = document.head.querySelector("meta[name=\"csrf-token\"]").content

var fields = deepClone(store.state.investors.initialState.one)

export default {
    components: {
        VueDropzone: vue2Dropzone,
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
            assignedInvestments: [],
            selectedInvestmentPreferences: [],
            columns: {
                id: "Id.",
                name: "Nombre",
                created_at: "Creación",
                updated_at: "Actualización"
            },
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
                url: "/api/investors",
            },
            form: new Form(fields),
            isDestroying: false,
            submitted: false,
            url: "/api/investors",
        }
    },

    computed: {
        ...documentTypesComputed,
        ...investmentPreferencesComputed,
        ...investmentTypesComputed,
        ...investmentValuesComputed,
        ...investmentsComputed,
        ...investorsComputed,
        ...investorTypesComputed,

        validated() {
            return this.form.errors.any()
        }
    },

    watch: {
        "$route" (value) {
            var routeName = value.name
            if (routeName === "AdminInvestorsCreate" && this.prepared) {
                this.prepareCreate()
            }

            if (routeName === "AdminInvestorsEdit" && this.prepared) {
                this.prepareEdit()
            }
        }
    },

    beforeDestroy() {
        this.isDestroying = true
    },

    created() {
        var routeName = this.$route.name
        if (routeName === "AdminInvestorsCreate") {
            return this.prepareCreate().then(this.prepared = true)
        }

        if (routeName === "AdminInvestorsEdit") {
            return this.prepareEdit().then(this.prepared = true)
        }
    },

    methods: {
        ...documentTypesMethods,
        ...investmentsMethods,
        ...investmentPreferencesMethods,
        ...investmentTypesMethods,
        ...investmentValuesMethods,
        ...investorsMethods,
        ...investorTypesMethods,
        ...photosMethods,

        dzFeaturedPhotoSuccess() {
            alertSuccessMessage("Inversores", "El inversor fue guardado correctamente.")
            return this.$router.push({ name: "AdminInvestorsIndex" })
        },

        isInvestmentAssigned(id) {
            return this.assignedInvestments[id] !== undefined
        },

        isInvestmentPreferenceSelected(id) {
            return this.investmentPreferences[id] !== undefined
        },

        async fetchOne(id) {
            return await this.fetchOneInvestor(id)
        },

        async prepareCreate() {
            this.isDestroying = false

            this.assignedInvestments = []
            this.selectedInvestmentPreferences = []

            // Limpia valores de objetos anidados.
            store.dispatch("investors/reset")

            // Elimina errores de validación
            this.form.reset()

            this.form = new Form(deepClone(this.oneInvestor))

            var investorTypes = this.fetchAllInvestorTypes()
            var investmentTypes = this.fetchAllInvestmentTypes()
            var investmentValues = this.fetchAllInvestmentValues()
            var investmentPreferences = this.fetchAllInvestmentPreferences()
            var documentTypes = this.fetchAllDocumentTypes()
            var investments = this.fetchAllInvestments()

            window.$(()=> {
                removeDzPreviewTemplate(this.dzFeaturedPhoto.dropzone)
            })

            return await Promise.all([investments, documentTypes, investmentPreferences, investmentTypes, investmentValues, investorTypes])
        },

        async prepareEdit() {
            this.isDestroying = false
        
            var investor = this.fetchOne(this.$route.params.id)
                .then(value => {
                // Elimina errores de validación.
                    this.form.reset()
                    this.form = new Form(value)

                    this.assignedInvestments = value.investments.map(item => { return item.id })
                    this.selectedInvestmentPreferences = value.investor_profile.investment_preferences.map(item => { return item.id })

                    this.dzFeaturedPhotoMounted(value.featured_photo)

                    return value
                })

            var investmentPreferences = this.fetchAllInvestmentPreferences()
            var investorTypes = this.fetchAllInvestorTypes()
            var investmentTypes = this.fetchAllInvestmentTypes()
            var investmentValues = this.fetchAllInvestmentValues()
            var documentTypes = this.fetchAllDocumentTypes()
            var investments = this.fetchAllInvestments()

            return await Promise.all([investor, documentTypes, investments, investmentPreferences, investmentTypes, investmentValues, investorTypes])
        },

        handleSubmitForm() {
            this.submitted = true

            // Let Dropzone handle this relations.
            this.form.featured_photo = {}

            this.form.investments = []
            this.form.investor_profile.investment_preferences = []
            this.form.investor_profile.investment_type = {}
            this.form.investor_profile.investment_value = {}
            this.form.investor_profile.investor_type = {}

            this.assignedInvestments.forEach(item => this.form.investments.push({ id: item }))
            this.selectedInvestmentPreferences.forEach(item => this.form.investor_profile.investment_preferences.push(item))

            var id
            this.form[this.method](this.action)
                .then(response => {
                    id = response.data[0].id
                    this.url = "/api/investors/" + id

                    EventBus.$emit("investor-saved", response.data[0])

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
                        alertErrorMessage("Inversores", error.data.message)
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
