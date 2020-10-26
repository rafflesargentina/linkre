<template>
  <form
    :action="action"
    :class="[validated ? 'needs-validation' : 'needs-validation']"
    :method="method"
    aria-label=""
    novalidate
    @keydown="form.errors.clear($event.target.name)"
    @submit.prevent="handleSubmitForm"
  >
    <div class="row">
      <div class="col-md-6 form-group">
        <label
          class="sr-only"
          for="first_name"
        >
          Nombre *
        </label>
        <input
          v-model="form.first_name"
          :class="{ 'is-invalid': form.errors.has('first_name') }"
          :disabled="submitted"
          class="form-control form-control-lg"
          name="first_name"
          placeholder="Nombre"
          type="text"
          required
        >
        <span
          v-if="form.errors.has('first_name')"
          class="invalid-feedback"
          role="alert"
        >
          <strong v-text="form.errors.get('first_name')" />
        </span>
      </div>
      <div class="col-md-6">
        <label
          class="sr-only"
          for="last_name"
        >
          Apellido *
        </label>
        <input
          v-model="form.last_name"
          :class="{ 'is-invalid': form.errors.has('last_name') }"
          :disabled="submitted" 
          class="form-control form-control-lg"
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
    <div class="row">
      <div class="col-12 form-group">
        <label
          class="sr-only"
          for="email"
        >
          Email *
        </label>
        <input 
          v-model="form.email"
          :class="{ 'is-invalid': form.errors.has('email') }"
          :disabled="submitted"
          class="form-control form-control-lg" 
          name="email"
          placeholder="Email"
          required
          type="email"
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
    <div class="row">
      <div class="col-md-6 form-group">
        <label
          class="sr-only"
          for="mobile"
        >
          Tel. celular
        </label>
        <input
          v-model="form.mobile"
          :class="{ 'is-invalid': form.errors.has('mobile') }"
          :disabled="submitted"
          class="form-control form-control-lg"
          name="mobile"
          placeholder="Tel. celular"
          type="text"
        >
        <span
          v-if="form.errors.has('mobile')"
          class="invalid-feedback"
          role="alert"
        >
          <strong v-text="form.errors.get('mobile')" />
        </span>
      </div>

      <div class="col-md-6 form-group">
        <label
          class="sr-only"
          for="phone"
        >
          Tel. línea
        </label>
        <input 
          v-model="form.phone"
          :class="{ 'is-invalid': form.errors.has('phone') }"
          :disabled="submitted"
          class="form-control form-control-lg" 
          name="phone"
          placeholder="Tel. de línea"
          type="text"
        >
        <span
          v-if="form.errors.has('phone')"
          class="invalid-feedback"
          role="alert"
        >
          <strong v-text="form.errors.get('phone')" />
        </span>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 form-group">
        <label
          class="sr-only"
          for="company"
        >
          Compañía
        </label>
        <input 
          v-model="form.company" 
          :class="{ 'is-invalid': form.errors.has('company') }"
          :disabled="submitted"
          class="form-control form-control-lg" 
          name="company"
          placeholder="Compañía"
          type="text"
        >
        <span
          v-if="form.errors.has('company')"
          class="invalid-feedback"
          role="alert"
        >
          <strong v-text="form.errors.get('company')" />
        </span>
      </div>
  
      <div class="col-md-6 form-group">
        <label
          class="sr-only"
          for="position"
        >
          Cargo
        </label>
        <input 
          v-model="form.position"
          :class="{ 'is-invalid': form.errors.has('position') }"
          :disabled="submitted"
          class="form-control form-control-lg" 
          name="position"
          placeholder="Cargo"
          type="text"
        >
      </div>
    </div>

    <div class="form-group">
      <div class="form-check">
        <input
          v-model="form.subscribe"
          :class="{ 'is-invalid': form.errors.has('subscribe') }"
          :disabled="submitted"
          class="form-check-input"
          name="subscribe"
          required
          type="checkbox"
          value="1"
        >
        <label 
          for="subscribe"
          class="form-check-label"
        >
          Deseo subscribirme al newsletter.
        </label>
        <div
          v-if="form.errors.has('subscribe')"
          class="invalid-feedback"
          role="alert"
        >
          <strong v-text="form.errors.get('subscribe')" />
        </div>
      </div>
    </div>

    <button
      :disabled="submitted"
      class="btn btn-block btn-lg btn-primary"
      type="submit"
    >
      Descargar informe
    </button>
  </form>
</template>

<script>
import { alertErrorMessage, deepClone } from "@/utilities/helpers"
import { leadsComputed } from "@linkre/store/helpers"

import store from "@/store"
import Form from "@/utilities/Form"

var fields = deepClone(store.state.leads.initialState.one)

export default {
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
            form: new Form(fields),
            submitted: false
        }
    },

    computed: {
        ...leadsComputed,
 
        validated() {
            return this.form.errors.any()
        }
    },

    methods: {
        handleSubmitForm() {
            this.submitted = true

            this.form[this.method](this.action)
                .then(()=> {
                //alertSuccessMessage("Reportes", "Gracias por dejarnos tus datos. Ya puedes descargar el informe.")
                    this.$router.push({ name: "ReportsShow", params: { id: this.$route.params.id }})
                    return this.submitted = false
                }).catch(error => {
                    if (error.status > 422) {
                        alertErrorMessage("Reportes", error.data.message)
                    }

                    return this.submitted = false
                })
        }
    }
}
</script>
