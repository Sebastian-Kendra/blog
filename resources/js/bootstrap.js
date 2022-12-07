import lodash from 'lodash'
import axios from 'axios'
import Vue from 'vue'
import mitt from 'mitt'

window._ = lodash
window.axios = axios
window.Vue = Vue

window.eventBus = mitt()

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

/* GLOBAL BRO */
function flash(string) {
    window.eventBus.emit('flash', string)
}

window.flash = flash
