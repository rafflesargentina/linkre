
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import * as apiKeys from "./apiKeys"
import * as VueGoogleMaps from "vue2-google-maps"
import Chart from "chart.js"
import Vue from "vue"
import VueChartkick from "vue-chartkick"
import VueMasonry from "vue-masonry-css"
import VueTimeline from "@growthbunker/vuetimeline"

require("./router")
require("./store")

Vue.use(VueGoogleMaps, {
    load: {
        key: apiKeys.GOOGLE_MAPS
    }
})

Vue.use(VueChartkick, { adapter: Chart })
Vue.use(VueMasonry)
Vue.use(VueTimeline, {
    theme: "dark"
})

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context("./", true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split("/").pop().split(".")[0], (resolve) => resolve(files(key))))

