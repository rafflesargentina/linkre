<template>
  <div>
    <SiteHeader />

    <!-- CONTENT START -->
    <div class="page-content">
      <div
        class="section-full p-tb90"
        style="padding-top: 10px;"
      >
        <div class="container-fluid">
          <div
            class="project-detail-outer bg-top-left bg-parallax bg-center"
            data-stellar-background-ratio="0.5"
            style="background-image:url(images/banner/reuna_su_capital.jpg)"
          >
            <div class="row no-gutters">
              <div class="col-md-6 col-sm-12 project-detail-pic" />
              <div class="col-md-6 col-sm-12 project-detail-containt bg-black square_shape3">
                <div class="p-lr20 p-tb80">
                  <div class="bg-white p-lr30 p-tb50 text-black">
                    <h2 class="m-t0">
                      <span class="font-34 text-uppercase">
                        Eres Desarrollista
                      </span>
                    </h2>
                    <p class="lead text-muted">
                      Antes de comenzar necesitamos que completes el siguiente cuestionario.
                    </p>
                    <p class="lead">
                      Cuéntanos acerca de tu compañía
                    </p>
                    <form 
                      v-if="developer.developer_profile"
                      :action="action"
                      :class="[validated ? 'needs-validation' : 'needs-validation']"
                      :method="method"
                      aria-label="Perfil Desarrollista"
                      novalidate
                      @keydown="form.errors.clear($event.target.name)"
                      @submit.prevent="handleSubmitForm"
                    >
                      <div class="form-group">
                        <label
                          for="developer_profile.company"
                        >
                          Perfil de su compañía
                        </label>
                        <textarea
                          v-model="form.developer_profile.company"
                          :class="{ 'is-invalid': form.errors.has('developer_profile.company') }"
                          class="form-control"
                          name="developer_profile.company"
                          placeholder="Perfil de su compañía"
                          required
                          rows="5"
                        />
                        <span
                          v-if="form.errors.has('developer_profile.company')"
                          class="invalid-feedback"
                          role="alert"
                        >
                          <strong v-text="form.errors.get('developer_profile.company')" />
                        </span>
                      </div>

                      <div class="form-group">
                        <label
                          for="developer_profile.expertise"
                        >
                          Describa su experiencia
                        </label>
                        <textarea
                          v-model="form.developer_profile.expertise"
                          :class="{ 'is-invalid': form.errors.has('developer_profile.expertise') }"
                          class="form-control form-control-lg"
                          name="developer_profile.expertise"
                          placeholder="Describa su experiencia"
                          required
                          rows="5"
                        />
                        <span
                          v-if="form.errors.has('developer_profile.expertise')"
                          class="invalid-feedback"
                          role="alert"
                        >
                          <strong v-text="form.errors.get('developer_profile.expertise')" />
                        </span>
                      </div>

                      <div class="form-group">
                        <label
                          for="developer_profile.career"
                        >
                          ¿Cuál es su trayectoria?
                        </label>
                        <textarea
                          v-model="form.developer_profile.career"
                          :class="{ 'is-invalid': form.errors.has('developer_profile.career') }"
                          class="form-control form-control-lg"
                          name="developer_profile.career"
                          placeholder="¿Cuál es su trayectoria?"
                          required
                          rows="5"
                        />
                        <span
                          v-if="form.errors.has('developer_profile.career')"
                          class="invalid-feedback"
                          role="alert"
                        >
                          <strong v-text="form.errors.get('developer_profile.career')" />
                        </span>
                      </div>

                      <p class="lead">
                        Cuéntenos acerca de su proyecto
                      </p>
                      <div class="form-group">
                        <label
                          for="developer_profile.project_name"
                        >
                          Nombre de su proyecto
                        </label>
                        <input
                          v-model="form.developer_profile.project_name"
                          :class="{ 'is-invalid': form.errors.has('developer_profile.project_name') }"
                          class="form-control form-control-lg"
                          name="developer_profile.project_name"
                          placeholder="Nombre de su proyecto"
                          type="text"
                          required
                        >
                        <span
                          v-if="form.errors.has('developer_profile.project_name')"
                          class="invalid-feedback"
                          role="alert"
                        >
                          <strong v-text="form.errors.get('developer_profile.project_name')" />
                        </span>
                      </div>

                      <div class="form-group">
                        <label
                          for="developer_profile.project_description"
                        >
                          Descripción de su proyecto
                        </label>
                        <textarea
                          v-model="form.developer_profile.project_description"
                          :class="{ 'is-invalid': form.errors.has('developer_profile.project_description') }"
                          class="form-control form-control-lg"
                          name="developer_profile.project_description"
                          placeholder="Descripción de su proyecto"
                          required
                          rows="5"
                        />
                        <span
                          v-if="form.errors.has('developer_profile.project_description')"
                          class="invalid-feedback"
                          role="alert"
                        >
                          <strong v-text="form.errors.get('developer_profile.project_description')" />
                        </span>
                      </div>

                      <div class="form-group">
                        <label
                          for="developer_profile.country"
                        >
                          País
                        </label>
                        <input
                          v-model="form.developer_profile.country"
                          :class="{ 'is-invalid': form.errors.has('developer_profile.country') }"
                          class="form-control form-control-lg"
                          name="developer_profile.country"
                          placeholder="País"
                          type="text"
                          required
                        >
                        <span
                          v-if="form.errors.has('developer_profile.country')"
                          class="invalid-feedback"
                          role="alert"
                        >
                          <strong v-text="form.errors.get('developer_profile.country')" />
                        </span>
                      </div>

                      <div class="form-group">
                        <label
                          for="developer_profile.city"
                        >
                          Ciudad
                        </label>
                        <input
                          v-model="form.developer_profile.city"
                          :class="{ 'is-invalid': form.errors.has('developer_profile.city') }"
                          class="form-control form-control-lg"
                          name="developer_profile.city"
                          placeholder="Ciudad"
                          type="text"
                          required
                        >
                        <span
                          v-if="form.errors.has('developer_profile.city')"
                          class="invalid-feedback"
                          role="alert"
                        >
                          <strong v-text="form.errors.get('developer_profile.city')" />
                        </span>
                      </div>

                      <p class="lead">
                        Y sus preferencias de inversión
                      </p>
                      <div class="form-group">
                        <label
                          for="developer_profile.preferences"
                        >
                          Preferencias de Inversión
                        </label>
                        <select
                          v-model="selectedInvestmentPreferences"
                          :class="{ 'is-invalid': form.errors.has('developer_profile.investment_preferences') }"
                          :multiple="true"
                          class="form-control"
                          name="developer_profile.investment_preferences"
                          placeholder="Preferencias de Inversión"
                        >
                          <option
                            value=""
                            :disabled="true"
                            :selected="true"
                          >
                            Preferencias de Inversión
                          </option>
                          <option
                            v-for="item in investmentPreferences"
                            :key="'investmentPreference-' + item.id"
                            :value="item.id"
                          >
                            {{ item.name }}
                          </option>
                        </select>
                        <span
                          v-if="form.errors.has('developer_profile.investment_preferences')"
                          class="invalid-feedback"
                          role="alert"
                        >
                          <strong v-text="form.errors.get('developer_profile.investment_preferences')" />
                        </span>
                      </div>
                 
                      <div class="form-group"> 
                        <button
                          :disabled="submitted"
                          type="submit"
                          class="btn btn-block btn-primary mb-3"
                        >
                          Guardar encuesta
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { authComputed, authMethods } from "@/store/helpers"
import { alertErrorMessage, alertSuccessMessage, deepClone } from "@/utilities/helpers"
import { investmentPreferencesComputed, investmentPreferencesMethods } from "@linkre/store/helpers"

import store from "@/store"
import Form from "@/utilities/Form"

var fields = deepClone(store.state.auth.user)

export default {
    data() {
        return {
            action: "/api/account",
            developer: {},
            form: new Form(fields),
            investmentPreferences: [],
            method: "put",
            prepared: false,
            selectedInvestmentPreferences: [],
            submitted: false
        }
    },

    computed: {
        ...authComputed,
        ...investmentPreferencesComputed,

        validated() {
            return this.form.errors.any()
        }
    },

    created() {
        return this.prepare().then(this.prepared = true)
    },

    methods: {
        ...authMethods,
        ...investmentPreferencesMethods,

        handleSubmitForm() {
            this.submitted = true

            this.form.developer_profile.investment_preferences = []
            this.selectedInvestmentPreferences.forEach(item => this.form.developer_profile.investment_preferences.push(item))

            this.form[this.method](this.action)
                .then(response => {
                    alertSuccessMessage("Eres Desarrollista", "Gracias por completar el cuestionario.")
                    this.$router.push({ name: "Home" })
                    return this.submitted = false
                })
                .catch(error => {
                    if (error.status > 422) {
                        alertErrorMessage("Eres Desarrollista", error.data.message)
                    }

                    return this.submitted = false
                })
        },

        prepare() {
            var developer = this.validate()
                .then(value => {
                    if (value) {
                        this.developer = value
                        this.selectedInvestmentPreferences = value.developer_profile.investment_preferences.map(item => { return item.id })

                        this.form = new Form(deepClone(value))

                        if (this.form.investor_profile) {
                            delete this.form["investor_profile"]
                        }
                    }

                    return value
                })

            var investmentPreferences = this.fetchAllInvestmentPreferences()
                .then(value => {
                    if (value) {
                        this.investmentPreferences = value
                    }

                    return value
                })

            return Promise.all([developer, investmentPreferences])
        }
    }
}
</script>
