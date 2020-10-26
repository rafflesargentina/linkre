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
      id="investment-pills"
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
          id="product-tab"
          aria-controls="product"
          aria-selected="false"
          class="nav-link"
          data-toggle="tab"
          href="#product"
        >
          Producto
        </a>
      </li>
      <li class="nav-item">
        <a
          id="financial-tab"
          aria-controls="financial"
          aria-selected="false"
          class="nav-link"
          data-toggle="tab"
          href="#financial"
        >
          Financial
        </a>
      </li>
      <li class="nav-item">
        <a
          id="documents-tab"
          aria-controls="documents"
          aria-selected="false"
          class="nav-link"
          data-toggle="tab"
          href="#documents"
        >
          Documentos
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
                  for="company_id"
                  class="col-6 col-form-label text-muted"
                >
                  Compañía *
                </label>
                <div class="col-6 col-lg-4">
                  <select
                    v-model="form.company_id"
                    :class="{ 'is-invalid': form.errors.has('company_id') }"
                    class="form-control"
                    name="company_id"
                    required
                  >
                    <option
                      value=""
                      :selected="true"
                    >
                      Companía
                    </option>
                    <option
                      v-for="item in allCompanies"
                      :key="item.id"
                      :value="item.id"
                    >
                      {{ item.name }}
                    </option>
                  </select>
                  <span
                    v-if="form.errors.has('company_id')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('company_id')" />
                  </span>
                </div>
              </div>
            </li>

            <li class="list-group-item">
              <div class="form-group row mb-0">
                <label
                  for="promoter_id"
                  class="col-6 col-form-label text-muted"
                >
                  Promotor
                </label>
                <div class="col-6 col-lg-4">
                  <select
                    v-model="form.promoter_id"
                    :class="{ 'is-invalid': form.errors.has('promoter_id') }"
                    class="form-control"
                    name="promoter_id"
                  >
                    <option
                      value=""
                      :selected="true"
                    >
                      Promotor
                    </option>
                    <option
                      v-for="item in allPromoters"
                      :key="item.id"
                      :value="item.id"
                    >
                      {{ item.name }}
                    </option>
                  </select>
                  <span
                    v-if="form.errors.has('promoter_id')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('promoter_id')" />
                  </span>
                </div>
              </div>
            </li>
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
            <li class="list-group-item">
              <div class="form-group row mb-0">
                <label
                  for="description"
                  class="col-lg-3 col-form-label text-muted"
                >
                  Descripción *
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
          id="product"
          class="tab-pane fade show"
          role="tabpanel"
          aria-labelledby="product-tab"
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
              Resúmen / Ficha técnica
            </h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <div class="form-group row mb-0">
                <label
                  for="resume"
                  class="col-lg-3 col-form-label text-muted"
                >
                  Resúmen / Ficha técnica
                </label>
                <div class="col-lg-9">
                  <VueEditor
                    v-model="form.resume"
                    :class="{ 'is-invalid': form.errors.has('resume') }"
                    class="bg-white"
                    name="resume"
                    placeholder="Resúmen / Ficha técnica"
                  />
                  <span
                    v-if="form.errors.has('resume')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('resume')" />
                  </span>
                </div>
              </div>
            </li>
          </ul>
          <div class="card-header bg-white p-2 p-md-4">
            <h5 class="text-primary m-0">
              Contexto
            </h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <div class="form-group row mb-0">
                <label
                  for="context"
                  class="col-lg-3 col-form-label text-muted"
                >
                  Contexto
                </label>
                <div class="col-lg-9">
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
                    autocomplete="off"
                    name="address.country"
                    class="form-control"
                    type="hidden"
                  >
                  <input
                    id="route"
                    v-model="form.address.street_name"
                    autocomplete="off"
                    name="address.street_name"
                    class="form-control"
                    type="hidden"
                  >
                  <input
                    id="locality"
                    v-model="form.address.locality"
                    autocomplete="off"
                    name="address.locality"
                    class="form-control"
                    type="hidden"
                  >
                  <input
                    id="administrative_area_level_1"
                    v-model="form.address.state"
                    autocomplete="off"
                    name="address.state"
                    class="form-control"
                    type="hidden"
                  >
                  <input
                    id="postal_code"
                    v-model="form.address.zip"
                    autocomplete="off"
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
                    autocomplete="off"
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
                    autocomplete="off"
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
                  for="address.locality"
                  class="col-6 col-form-label text-muted"
                >
                  Localidad *
                </label>
                <div class="col-6 col-lg-4">
                  <input
                    v-model="form.address.locality"
                    autocomplete="off"
                    :class="{ 'is-invalid': form.errors.has('address.locality') }"
                    class="form-control"
                    name="address.locality"
                    placeholder="Localidad"
                    type="text"
                  >
                  <span
                    v-if="form.errors.has('address.locality')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('address.locality')" />
                  </span>
                </div>
              </div>
            </li>

            <li class="list-group-item">
              <div class="form-group row mb-0">
                <label
                  for="address.sublocality"
                  class="col-6 col-form-label text-muted"
                >
                  Sublocalidad
                </label>
                <div class="col-6 col-lg-4">
                  <input
                    v-model="form.address.sublocality"
                    autocomplete="off"
                    :class="{ 'is-invalid': form.errors.has('address.sublocality') }"
                    class="form-control"
                    name="address.sublocality"
                    placeholder="Sublocalidad"
                    type="text"
                  >
                  <span
                    v-if="form.errors.has('address.sublocality')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('address.sublocality')" />
                  </span>
                </div>
              </div>
            </li>

            <li class="list-group-item">
              <div class="form-group row mb-0">
                <label
                  for="address.sublocality"
                  class="col-6 col-form-label text-muted"
                >
                  Departamento / Provincia / Estado
                </label>
                <div class="col-6 col-lg-4">
                  <input
                    v-model="form.address.state"
                    autocomplete="off"
                    :class="{ 'is-invalid': form.errors.has('address.state') }"
                    class="form-control"
                    name="address.state"
                    placeholder="Departamento / Provincia / Estado"
                    type="text"
                  >
                  <span
                    v-if="form.errors.has('address.state')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('address.state')" />
                  </span>
                </div>
              </div>
            </li>

            <li class="list-group-item">
              <div class="form-group row mb-0">
                <label
                  for="address.country"
                  class="col-6 col-form-label text-muted"
                >
                  País *
                </label>
                <div class="col-6 col-lg-4">
                  <input
                    v-model="form.address.country"
                    autocomplete="off"
                    :class="{ 'is-invalid': form.errors.has('address.country') }"
                    class="form-control"
                    name="address.country"
                    placeholder="País"
                    type="text"
                  >
                  <span
                    v-if="form.errors.has('address.country')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('address.country')" />
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
              Galería de fotos
            </h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <div class="form-group row mb-0">
                <div class="col">
                  <VueDropzone
                    id="dzUnfeaturedPhotos"
                    ref="dzUnfeaturedPhotos"
                    :options="dzUnfeaturedPhotosOptions"
                    @vdropzone-error="dzUnfeaturedPhotosError"
                    @vdropzone-removed-file="dzUnfeaturedPhotosRemovedFile"
                    @vdropzone-processing="dzUnfeaturedPhotosProcessing"
                    @vdropzone-success-multiple="dzUnfeaturedPhotosSuccess"
                    @vdropzone-upload-progress="dzUnfeaturedPhotosUploadProgress"
                  />
                </div>
              </div>
            </li>
          </ul>
        </div>

        <div
          id="financial"
          class="tab-pane fade show"
          role="tabpanel"
          aria-labelledby="financial-tab"
        >
          <div class="card-header bg-white p-2 p-md-4">
            <h5 class="text-primary m-0">
              Retornos
            </h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <div class="row">
                <div class="col-md-6 order-2 order-md-1">
                  <div class="row">
                    <div class="col-12 form-group">
                      <label for="financial.open_offer">
                        Oferta abierta
                      </label>
                      <input
                        v-model="form.financial.open_offer"
                        :class="{ 'is-invalid': form.errors.has('financial.open_offer') }"
                        class="form-control"
                        min="0"
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
                        min="0"
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
                        min="0"
                        name="financial.irr"
                        placeholder="Tasa Interna de Retorno (%)"
                        step="0.1"
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
                        min="0"
                        name="financial.apr"
                        placeholder="Tasa Anual de Preferencia (%)"
                        step="0.1"
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
                        min="0"
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

                <div class="col-md-6 mb-5">
                  <pie-chart
                    :donut="true"
                    :data="[['Financiado', form.financial.funded], ['Restante', (form.financial.open_offer - form.financial.funded)]]"
                  />
                </div>
              </div>
            </li>
          </ul>

          <div class="card-header bg-white p-2 p-md-4">
            <h5 class="text-primary m-0">
              Capitalización
            </h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <div class="row">
                <div class="col-md-6 order-2 order-md-1">
                  <div class="form-group">
                    <label for="financial.senior_debt">
                      Deuda Senior
                    </label>
                    <input
                      v-model="form.financial.senior_debt"
                      :class="{ 'is-invalid': form.errors.has('financial.senior_debt') }"
                      class="form-control"
                      min="0"
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
                      min="0"
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
                      min="0"
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

                <div class="col-md-6 mb-5">
                  <pie-chart
                    :donut="true"
                    :data="[['Deuda Senior', form.financial.senior_debt], ['Deuda Mezzanine', form.financial.mezzanine_debt], ['Capital existente', form.financial.equity]]"
                  />
                </div>
              </div>
            </li>
          </ul>

          <div class="card-header bg-white p-2 p-md-4">
            <h5 class="text-primary m-0">
              Fondeo
            </h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <div class="row">
                <div class="col-md-6 order-2 order-md-1">
                  <div class="form-group">
                    <label for="financial.adquisition_cost">
                      Costos de Adquisición
                    </label>
                    <input
                      v-model="form.financial.adquisition_cost"
                      :class="{ 'is-invalid': form.errors.has('financial.adquisition_cost') }"
                      class="form-control"
                      min="0"
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
                      min="0"
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
                <div class="col-md-6 mb-5">
                  <pie-chart
                    :donut="true"
                    :data="[['Desarrollo', form.financial.development_cost], ['Adquisición', form.financial.adquisition_cost]]"
                  />
                </div>
              </div>
            </li>
          </ul>
        </div>

        <div
          id="documents"
          class="tab-pane fade show"
          role="tabpanel"
          aria-labelledby="documents-tab"
        >
          <div class="card-header bg-white p-2 p-md-4">
            <h5 class="text-primary m-0">
              Documentos adjuntos
            </h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <div class="form-group row mb-0">
                <label
                  for="documents"
                  class="col-md-3 col-form-label text-muted"
                >
                  Documentos adjuntos
                </label>
                <div class="col-md-9">
                  <VueDropzone
                    id="dzDocuments"
                    ref="dzDocuments"
                    :options="dzDocumentsOptions"
                    @vdropzone-error="dzDocumentsError"
                    @vdropzone-removed-file="dzDocumentsRemovedFile"
                    @vdropzone-processing="dzDocumentsProcessing"
                    @vdropzone-success-multiple="dzDocumentsSuccess"
                    @vdropzone-upload-progress="dzDocumentsUploadProgress"
                  />
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>

      <div class="card-footer bg-white text-right">
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
import { companiesComputed, companiesMethods, documentsMethods, investmentsComputed, investmentsMethods, promotersComputed, promotersMethods } from "@linkre/store/helpers"
import { alertErrorMessage, alertSuccessMessage, deepClone, getSavedState, removeDzPreviewTemplate, slugify } from "@/utilities/helpers"
import { dz } from "@/utilities/mixins/dz"
import { gmaps } from "@/utilities/mixins/gmaps"
import { photosMethods } from "@/store/helpers"
import { EventBus } from "@/eventBus"
import { VueEditor } from "vue2-editor"

import store from "@/store"
import vue2Dropzone from "vue2-dropzone"
import Form from "@/utilities/Form"

const token = getSavedState("auth.token")
const csrfToken = document.head.querySelector("meta[name=\"csrf-token\"]").content

var fields = deepClone(store.state.investments.initialState.one)

export default {
    components: {
        VueDropzone: vue2Dropzone,
        VueEditor,
    },

    mixins: [dz, gmaps],

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
            dzDocumentsOptions: {
                addRemoveLinks: true,
                autoProcessQueue: false,
                dictDefaultMessage: "<i class='fa fa-cloud-upload'></i><br/>Hacé click o arrastrá una foto hacía acá",
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                    "Authorization": "Bearer " + token
                },
                maxFiles: 8,
                maxFilesize: 50,
                method: "put",
                paramName: "documents",
                uploadMultiple: true,
                url: "/api/investments",
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
                url: "/api/investments",
            },
            dzUnfeaturedPhotosOptions: {
                addRemoveLinks: true,
                autoProcessQueue: false,
                dictDefaultMessage: "<i class='fa fa-cloud-upload'></i><br/>Hacé click o arrastrá una foto hacía acá",
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                    "Authorization": "Bearer " + token
                },
                maxFiles: 8,
                maxFilesize: 1,
                method: "put",
                paramName: "unfeatured_photos",
                uploadMultiple: true,
                url: "/api/investments",
            },
            form: new Form(fields),
            isDestroying: false,
            location: "",
            submitted: false,
            url: "/api/investments/",
        }
    },

    computed: {
        ...companiesComputed,
        ...investmentsComputed,
        ...promotersComputed,

        validated() {
            return this.form.errors.any()
        }
    },

    watch: {
        "$route" (value) {
            var routeName = value.name
            if (routeName === "AdminInvestmentsCreate" && this.prepared) {
                this.prepareCreate()
            }

            if (routeName === "AdminInvestmentsEdit" && this.prepared) {
                this.prepareEdit()
            }
        }
    },

    beforeDestroy() {
        this.isDestroying = true
    },

    created() {
        var routeName = this.$route.name
        if (routeName === "AdminInvestmentsCreate") {
            return this.prepareCreate().then(this.prepared = true)
        }

        if (routeName === "AdminInvestmentsEdit") {
            return this.prepareEdit().then(this.prepared = true)
        }
    },

    mounted() {
        return this.initAutocomplete("autocomplete", { types: ["geocode"] })
    },

    methods: {
        ...companiesMethods,
        ...documentsMethods,
        ...investmentsMethods,
        ...photosMethods, 
        ...promotersMethods,

        async fetchOne(id) {
            return await this.fetchOneInvestment(id)
        },

        dzDocumentsSuccess() {
            alertSuccessMessage("La inversión fue guardada correctamente.")
            return this.$router.push({ name: "AdminInvestmentsIndex" })
        },

        dzFeaturedPhotoSuccess() {
            return this.dzUnfeaturedPhotosProcessQueue()
        },

        dzUnfeaturedPhotosSuccess() {
            return this.dzDocumentsProcessQueue()
        },

        async prepareCreate() {
            this.isDestroying = false

            this.location = ""

            store.dispatch("investments/reset")

            // Elimina errores de validación
            this.form.reset()
            this.form = new Form(deepClone(this.oneInvestment))

            var companies = this.fetchAllCompanies()
            var promoters = this.fetchAllPromoters()

            this.geolocate().then(coordinates => {
                return this.geolocation = coordinates
            })
                .catch(err => console.err(err))

            window.$(()=> {
                removeDzPreviewTemplate(this.dzFeaturedPhoto.dropzone)
                removeDzPreviewTemplate(this.dzUnfeaturedPhotos.dropzone)
                removeDzPreviewTemplate(this.dzDocuments.dropzone)

                if (this.$refs.map) {
                    this.initMap("map", { center: this.geolocation, zoom: 14 })
                }
            })

            return await Promise.all([companies, promoters])
        },

        async prepareEdit() {
            this.isDestroying = false

            var investment = this.fetchOne(this.$route.params.id)
                .then(value => {
                    this.location = ""

                    this.form.reset()
                    this.form = new Form(value)

                    this.dzFeaturedPhotoMounted(value.featured_photo)
                    this.dzUnfeaturedPhotosMounted(value.unfeatured_photos)
                    this.dzDocumentsMounted(value.documents)

                    window.$(()=> {
                        if (this.$refs.map) {
                            this.initMap("map", { center: this.geolocation, zoom: value.map.zoom })
                        }
                    })

                    return value
                })

            this.geolocate().then(coordinates => {
                if (null !== this.oneInvestment.map.lat && null !== this.oneInvestment.map.lng) {
                    this.geolocation = this.oneInvestment.map.coordinates

                    return
                }
                
                return coordinates
            })
                .catch(err => console.err(err))

            var companies = this.fetchAllCompanies()
            var promoters = this.fetchAllPromoters()

            return await Promise.all([investment, companies, promoters])
        },

        handleSubmitForm() {
            this.submitted = true

            delete this.form.address.location
            delete this.form.map.coordinates

            // Let Dropzone handle this relations.
            this.form.documents = []
            this.form.featured_photo = {}
            this.form.unfeatured_photos = []

            var id
            this.form[this.method](this.action)
                .then(response => {
                    id = response.data[0].id
                    this.url = "/api/investments/" + id

                    EventBus.$emit("investment-saved", response.data[0])

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
