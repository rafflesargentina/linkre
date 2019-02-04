<template>
  <form
    :action="action"
    :class="[validated ? 'needs-validation' : 'needs-validation']"
    :method="method"
    aria-label="Registrate"
    novalidate
    @keydown="form.errors.clear($event.target.name)"
    @submit.prevent="register"
  >
    <div
      class="btn-group btn-group-toggle mb-4"
      data-toggle="buttons"
    >
      <label
        class="btn btn-secondary active"
        @click="form.developer = 0,form.investor = 1"
      >
        <input
          id="investor"
          v-model="form.investor"
          type="radio"
          name="investor"
          autocomplete="off"
          value="1"
          checked
        > Inversor
      </label>
      <label
        class="btn btn-secondary"
        :class="form.developer === 1"
        @click="form.developer = 1,form.investor = 0"
      >
        <input
          id="developer"
          v-model="form.developer"
          type="radio"
          name="developer"
          autocomplete="off"
          value="1"
        > Developer
      </label>
    </div>
    <div class="row">
      <div class="col-md-3 form-group">
        <label
          class="sr-only"
          for="document_type_id"
        >
          Tipo
        </label>
        <select
          v-model="form.document_type_id"
          :class="{ 'is-invalid': form.errors.has('document_type_id') }"
          class="form-control form-control-lg"
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
      <div class="col-md-9">
        <label
          class="sr-only"
          for="document_number"
        >
          Número
        </label>
        <input
          v-model="form.document_number"
          :class="{ 'is-invalid': form.errors.has('document_number') }"
          autocomplete="username"
          class="form-control form-control-lg"
          name="document_number"
          placeholder="Número"
          required
          type="number"
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
    <div class="row">
      <div class="col-sm-6 form-group">
        <label
          class="sr-only"
          for="first_name"
        >
          Nombre
        </label>
        <input 
          v-model="form.first_name" 
          :class="{ 'is-invalid': form.errors.has('first_name') }"
          class="form-control form-control-lg" 
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
      <div class="col-sm-6 form-group">
        <label
          class="sr-only"
          for="last_name"
        >
          Apellido
        </label>
        <input
          v-model="form.last_name"
          :class="{ 'is-invalid': form.errors.has('last_name') }"
          class="form-control form-control-lg"
          name="last_name"
          placeholder="Apellido"
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

    <div class="form-group">
      <label
        class="sr-only"
        for="email"
      >
        E-Mail
      </label>
      <input 
        v-model="form.email" 
        :class="{ 'is-invalid': form.errors.has('email') }"
        autocomplete="username"
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

    <div class="form-group">
      <label
        class="sr-only"
        for="password"
      >
        Contraseña
      </label>
      <input 
        v-model="form.password" 
        :class="{ 'is-invalid': form.errors.has('password') }"
        autocomplete="new-password"
        class="form-control form-control-lg" 
        name="password"
        placeholder="Contraseña"
        type="password"
        required
      >
      <span
        v-if="form.errors.has('password')"
        class="invalid-feedback"
        role="alert"
      >
        <strong v-text="form.errors.get('password')" />
      </span>
    </div>

    <div class="form-group">
      <label
        class="sr-only"
        for="password_confirmation"
      >
        Confirmación de contraseña
      </label>
      <input 
        v-model="form.password_confirmation" 
        :class="{ 'is-invalid': form.errors.has('password_confirmation') }"
        autocomplete="new-password"
        class="form-control form-control-lg" 
        name="password_confirmation"
        placeholder="Confirmación de contraseña"
        required
        type="password"
      >
    </div>

    <div class="form-group">
      <div class="form-check">
        <input
          v-model="form.accepted"
          :class="{ 'is-invalid': form.errors.has('accepted') }"
          class="form-check-input"
          name="accepted"
          required
          type="checkbox"
          value="1"
        >
        <label 
          for="accepted" 
          class="form-check-label"
        >
          Acepto los <u
            data-toggle="modal" 
            data-target="#modalTermsAndConditions"
            role="button"
          >
            Términos y Condiciones
          </u> y la <u 
            data-toggle="modal" 
            data-target="#modalPolicyOfPrivacy"
            role="button"
          >
            Política de Privacidad
          </u>.
        </label>
        <div
          v-if="form.errors.has('accepted')"
          class="invalid-feedback"
          role="alert"
        >
          <strong v-text="form.errors.get('accepted')" />
        </div>
      </div>
    </div>

    <button
      :disabled="submitted"
      class="btn btn-block btn-lg btn-primary"
      type="submit"
    >
      Registrate
    </button>
  </form>
</template>

<script>
import { documentTypesComputed } from "@/store/helpers"
import Form from "@/utilities/Form"

let fields = {
    accepted: "",
    developer: 0,
    document_number: "",
    document_type_id: "",
    email: "",
    first_name: "",
    investor: 1,
    last_name: "",
    password: "",
    password_confirmation: ""
}

export default {

    name: "RegisterForm",

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
        ...documentTypesComputed,
 
        validated() {
            return this.form.errors.any()
        }
    },

    methods: {
        register() {
            this.submitted = true

            let redirect
            this.form[this.method](this.action).then(response => {
                redirect = response.redirect
                return this.$store.dispatch("auth/login", response)
            }).then(()=> {
                this.$snotify.success("Fuiste registrado correctamente.")
                return this.$router.push({ path: redirect })
            }).catch(error => {
                this.submitted = false
                if (error.status > 422) {
                    this.$snotify.error("Ocurrió un error con el siguiente mensaje: " + error.data.message)
                }
            })
        },
    },
}
</script>
