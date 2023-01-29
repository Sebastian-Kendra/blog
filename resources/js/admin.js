import './bootstrap'
import router from './components/admin/router'
import Admin from './components/admin/Admin.vue'

Vue.config.ignoredElements = ['trix-editor']

const admin = new Vue({
    router,
    render: (h) => h(Admin),
}).$mount('#admin')
