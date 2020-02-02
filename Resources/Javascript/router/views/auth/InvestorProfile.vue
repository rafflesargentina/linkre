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
            style="background-image:url(images/banner/invierta_su_capital.jpg)"
          >
            <div class="row no-gutters">
              <div class="col-md-6 col-sm-12 project-detail-pic" />
              <div class="col-md-6 col-sm-12 project-detail-containt bg-black square_shape3">
                <div class="p-lr20 p-tb80">
                  <div class="bg-white p-lr30 p-tb50 text-black">
                    <h2 class="m-t0">
                      <span class="font-34 text-uppercase">
                        Eres Inversor
                      </span>
                    </h2>
                    <p class="lead text-muted">
                      Antes de comenzar necesitamos que completes el siguiente cuestionario para podamos determinar el tipo de inversor que eres, y de esta forma asignarte los proyectos que más se ajusten a tus necesidades.
                    </p>
                    <form 
                      v-if="investor.investor_profile"
                      :action="action"
                      :class="[validated ? 'needs-validation' : 'needs-validation']"
                      :method="method"
                      aria-label="Preferencias de Inversión"
                      novalidate
                      @keydown="form.errors.clear($event.target.name)"
                      @submit.prevent="handleSubmitForm"
                    >
                      <div class="form-group">
                        <p class="m-0">
                          ¿Está participando de alguna inversión en Bienes Raices actualmente?
                        </p>
                        <div class="form-check form-check-inline">
                          <input
                            v-model="form.investor_profile.real_estate"
                            class="form-check-input"
                            name="investor_profile.real_estate_1"
                            value="1"
                            type="radio"
                          >
                          <label
                            class="form-check-label"
                            for="investor_profile.real_estate_1"
                          >Sí</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input
                            v-model="form.investor_profile.real_estate"
                            class="form-check-input"
                            name="investor_profile.real_estate_0"
                            value="0"
                            type="radio"
                          >
                          <label
                            class="form-check-label"
                            for="investor_profile.real_estate_0"
                          >No</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <p class="m-0">
                          ¿Ha tenido experiencia en los últimos 5 años en este tipo de inversiones?
                        </p>
                        <div class="form-check form-check-inline">
                          <input
                            v-model="form.investor_profile.expertise"
                            class="form-check-input"
                            name="investor_profile.expertise_1"
                            value="1"
                            type="radio"
                          >
                          <label
                            class="form-check-label"
                            for="investor_profile.expertise_1"
                          >Sí</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input
                            v-model="form.investor_profile.expertise"
                            class="form-check-input"
                            name="investor_profile.expertise_0"
                            value="0"
                            type="radio"
                          >
                          <label
                            class="form-check-label"
                            for="investor_profile.expertise_0"
                          >No</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <p class="m-0">
                          ¿Usted mismo selecciona el portfolio y los análisis de la inversión?
                        </p>
                        <div class="form-check form-check-inline">
                          <input
                            v-model="form.investor_profile.portfolio"
                            class="form-check-input"
                            name="investor_profile.portfolio_1"
                            value="1"
                            type="radio"
                          >
                          <label
                            class="form-check-label"
                            for="investor_profile.portfolio_1"
                          >Sí</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input
                            v-model="form.investor_profile.portfolio"
                            class="form-check-input"
                            name="investor_profile.portfolio_0"
                            value="0"
                            type="radio"
                          >
                          <label
                            class="form-check-label"
                            for="investor_profile.portfolio_0"
                          >No</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <p class="m-0">
                          ¿Contrata equipos de consultores y analistas externos?
                        </p>
                        <div class="form-check form-check-inline">
                          <input
                            v-model="form.investor_profile.consulting"
                            class="form-check-input"
                            name="investor_profile.consulting_1"
                            value="1"
                            type="radio"
                          >
                          <label
                            class="form-check-label"
                            for="investor_profile.consulting_1"
                          >Sí</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input
                            v-model="form.investor_profile.consulting"
                            class="form-check-input"
                            name="investor_profile.consulting_0"
                            value="0"
                            type="radio"
                          >
                          <label
                            class="form-check-label"
                            for="investor_profile.consulting_0"
                          >No</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <p class="m-0">
                          ¿Participa o participó en algún REIT o Fondo Inmobiliario en Latinoamerica?
                        </p>
                        <div class="form-check form-check-inline">
                          <input
                            v-model="form.investor_profile.reit"
                            class="form-check-input"
                            name="investor_profile.reit_1"
                            value="1"
                            type="radio"
                          >
                          <label
                            class="form-check-label"
                            for="investor_profile.reit_1"
                          >Sí</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input
                            v-model="form.investor_profile.reit"
                            class="form-check-input"
                            name="investor_profile.reit_0"
                            value="0"
                            type="radio"
                          >
                          <label
                            class="form-check-label"
                            for="investor_profile.reit_0"
                          >No</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label
                          for="investor_type_id"
                        >
                          ¿Qué tipo de Inversor es?
                        </label>
                        <select
                          v-model="form.investor_profile.investor_type_id"
                          :class="{ 'is-invalid': form.errors.has('investor_profile.investor_type_id') }"
                          class="form-control"
                          name="investor_profile.investor_type_id"
                          placeholder="¿Qué tipo de Inversor es?"
                          required
                        >
                          <option
                            value=""
                            :selected="true"
                          >
                            Tipo de Inversor
                          </option>
                          <option
                            v-for="item in investorTypes"
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

                      <div class="form-group">
                        <label
                          for="investor_profile.investment_type_id"
                        >
                          ¿Qué tipo de Inversiones busca?
                        </label>
                        <select
                          v-model="form.investor_profile.investment_type_id"
                          :class="{ 'is-invalid': form.errors.has('investor_profile.investment_type_id') }"
                          class="form-control form-control-lg"
                          name="investor_profile.investment_type_id"
                          required
                        >
                          <option
                            value=""
                            :selected="true"
                          >
                            Tipo de Inversión
                          </option>
                          <option
                            v-for="item in investmentTypes"
                            :key="item.id"
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
                      <div class="form-group">
                        <label
                          for="investor_profile.investment_value_id"
                        >
                          ¿Entre qué valores?
                        </label>
                        <select
                          v-model="form.investor_profile.investment_value_id"
                          :class="{ 'is-invalid': form.errors.has('investor_profile.investment_value_id') }"
                          class="form-control form-control-lg"
                          name="investor_profile.investment_value_id"
                          required
                        >
                          <option
                            value=""
                            :selected="true"
                          >
                            Valor de Inversión
                          </option>
                          <option
                            v-for="item in investmentValues"
                            :key="item.id"
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

                      <div class="form-group">
                        <label
                          for="investor_profile.preferences"
                        >
                          Preferencias de Inversión
                        </label>
                        <select
                          v-model="selectedInvestmentPreferences"
                          :class="{ 'is-invalid': form.errors.has('investor_profile.investment_preferences') }"
                          :multiple="true"
                          class="form-control"
                          name="investor_profile.investment_preferences"
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
                          v-if="form.errors.has('investor_profile.investment_preferences')"
                          class="invalid-feedback"
                          role="alert"
                        >
                          <strong v-text="form.errors.get('investor_profile.investment_preferences')" />
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
import { investmentPreferencesComputed, investmentPreferencesMethods, investmentTypesComputed, investmentTypesMethods, investmentValuesComputed, investmentValuesMethods, investorTypesComputed, investorTypesMethods } from "@linkre/store/helpers"

import store from "@/store"
import Form from "@/utilities/Form"

var fields = deepClone(store.state.auth.user)

export default {
    data() {
        return {
            action: "/api/account",
            form: new Form(fields),
            investmentPreferences: [],
            investmentTypes: [],
            investmentValues: [],
            investor: {},
            investorTypes: [],
            method: "put",
            prepared: false,
            selectedInvestmentPreferences: [],
            submitted: false
        }
    },

    computed: {
        ...authComputed,
        ...investmentPreferencesComputed,
        ...investmentTypesComputed,
        ...investmentValuesComputed,
        ...investorTypesComputed,

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
        ...investmentTypesMethods,
        ...investmentValuesMethods,
        ...investorTypesMethods,

        handleSubmitForm() {
            this.submitted = true

            delete this.form.investor_profile["investment_type"]
            delete this.form.investor_profile["investment_value"]
            delete this.form.investor_profile["investor_type"]

            this.form.investor_profile.investment_preferences = []
            this.selectedInvestmentPreferences.forEach(item => this.form.investor_profile.investment_preferences.push(item))

            this.form[this.method](this.action)
                .then(response => {
                    alertSuccessMessage("Eres Inversor", "Gracias por completar el cuestionario.")
                    this.$router.push({ name: "Home" })
                    return this.submitted = false
                })
                .catch(error => {
                    if (error.status > 422) {
                        alertErrorMessage("Eres Inversor", error.data.message)
                    }

                    return this.submitted = false
                })
        },

        prepare() {
            var investor = this.validate()
                .then(value => {
                    if (value) {
                        this.investor = value
                        this.selectedInvestmentPreferences = value.investor_profile.investment_preferences.map(item => { return item.id })

                        this.form = new Form(deepClone(value))

                        if (this.form.developer_profile) {
                            delete this.form["developer_profile"]
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

            var investmentTypes = this.fetchAllInvestmentTypes()
                .then(value => {
                    if (value) {
                        this.investmentTypes = value
                    }

                    return value
                })

            var investmentValues = this.fetchAllInvestmentValues()
                .then(value => {
                    if (value) {
                        this.investmentValues = value
                    }

                    return value
                })

            var investorTypes = this.fetchAllInvestorTypes()
                .then(value => {
                    if (value) {
                        this.investorTypes = value
                    }

                    return value
                })

            return Promise.all([investor, investmentPreferences, investmentTypes, investmentValues, investorTypes])
        }
    }
}
</script>
