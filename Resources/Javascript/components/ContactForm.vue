<style lang="scss" scoped>
textarea {
  height: 12rem;
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
    <div class="contact-one p-a40 p-r150">
      <div class="form-group">
        <label
          class="sr-only"
          for="name"
        >
          Ingresá tu nombre
        </label>
        <input
          v-model="form.name"
          :class="{ 'is-invalid': form.errors.has('name') }"
          :disabled="submitted"
          class="form-control"
          name="name"
          placeholder="Nombre"
          required
          type="text"
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
        <label
          class="sr-only"
          for="email"
        >
          Ingrese su dirección de Email
        </label>
        <input 
          v-model="form.email" 
          :class="{ 'is-invalid': form.errors.has('email') }"
          :disabled="submitted"
          class="form-control"
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
          for="phone"
        >
          Ingrese un teléfono de contacto
        </label>
        <input
          v-model="form.phone"
          :class="{ 'is-invalid': form.errors.has('phone') }"
          :disabled="submitted"
          class="form-control"
          name="phone"
          placeholder="Teléfono"
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

      <div class="form-group">
        <label
          class="sr-only"
          for="message"
        >
          Mensaje
        </label>
        <textarea
          v-model="form.message"
          :class="{ 'is-invalid': form.errors.has('message') }"
          :disabled="submitted"
          class="form-control"
          name="message"
          required
          placeholder="Mensaje"
        />
        <span
          v-if="form.errors.has('message')"
          class="invalid-feedback"
          role="alert"
        >
          <strong v-text="form.errors.get('message')" />
        </span>
      </div>

      <button
        :disabled="submitted"
        class="site-button black radius-no text-uppercase"
        type="submit"
      >
        <span class="font-12 letter-spacing-5">
          Enviar
        </span>
      </button>

      <div class="contact-info bg-black text-white p-a30">
        <div class="wt-icon-box-wraper left p-b30">
          <div class="icon-sm">
            <i class="iconmoon-smartphone-1" />
          </div>
          <div class="icon-content text-white ">
            <h5 class="m-t0 text-uppercase">
              Teléfono
            </h5>
            <p class="text-white">
              +54 9 11 4915 5200
            </p>
          </div>
        </div>
        <div class="wt-icon-box-wraper left">
          <div class="icon-sm">
            <i class="iconmoon-travel" />
          </div>
          <div class="icon-content text-white">
            <h5 class="m-t0  text-uppercase">
              Dirección
            </h5>
            <p>Av. Corrientes 222 Piso 10, C1043AAP Catalinas Norte</p>
          </div>
        </div>
      </div>
    </div>
  </form>
</template>

<script>
import { alertErrorMessage, alertSuccessMessage } from "@/utilities/helpers"
import Form from "@/utilities/Form"

let fields = {
    email: "",
    message: "",
    name: "",
    phone: "",
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
        validated() {
            return this.form.errors.any()
        }
    },

    methods: {
        handleSubmitForm() {
            this.submitted = true

            this.form[this.method](this.action)
                .then(response => {
                    alertSuccessMessage("Contacto", "Tu mensaje fue enviado.")
                    this.$router.push({ path: response.redirect })
                    return this.submitted = false
                })
                .catch(error => {
                    if (error.status > 422) {
                        alertErrorMessage("Contacto", error.data.message || error.message)
                    }

                    return this.submitted = false
                })
        }
    },
}
</script>
