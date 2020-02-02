<template>
  <form 
    :action="action"
    :class="[validated ? 'needs-validation' : 'needs-validation']"
    :method="method"
    aria-label="Ingresá"
    novalidate
    @keydown="form.errors.clear($event.target.name)"
    @submit.prevent="login"
  >
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
          :disabled="submitted"
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
          :disabled="submitted"
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
        :disabled="submitted"
        autocomplete="current-password"
        class="form-control form-control-lg" 
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

    <button
      :disabled="submitted"
      type="submit"
      class="btn btn-block btn-primary mb-3"
    >
      Ingresá
    </button>
    <a
      class="btn btn-block btn-secondary mb-3"
      href="/auth/linkedin"
    >Ingrese mediante LinkedIn</a>

    <div class="form-check">
      <label class="w-100">
        <input 
          v-model="form.remember" 
          class="form-check-input"
          :disabled="submitted"
          name="remember"
          type="checkbox"
        > Recordame.
        <RouterLink
          class="auth__link auth__link--forgot-password"
          to="/password/request"
        >
          ¿Olvidaste tu contraseña?
        </RouterLink>
      </label>
    </div>
  </form>
</template>

<script>
import { documentTypesComputed } from "@/store/helpers"
import Form from "@/utilities/Form"

let fields = {
    document_number: "",
    document_type_id: "",
    password: "",
    remember: "",
}

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
        ...documentTypesComputed,

        validated() {
            return this.form.errors.any()
        }
    },

    methods: {
        login() {
            this.submitted = true

            this.form[this.method](this.action)
                .then(response => {
                    return this.$store.dispatch("auth/login", response)
                })
                .then(response => {
                    let intended = this.$route.query.intended
                    let redirect = intended||response.redirect
                    this.$router.push({ path: redirect })
                    return this.submitted = false
                }).catch(error => {
                    if (error.status > 422) {
                        alertErrorMessage("Login", error.data.message)
                    }

                    return this.submitted = false
                })
        },
    }
}
</script>
