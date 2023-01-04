import './bootstrap'
import router from './components/admin/router'
import Admin from './components/admin/Admin.vue'

const admin = new Vue({
    router,
    render: (h) => h(Admin),
}).$mount('#admin')
