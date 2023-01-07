import VueRouter from 'vue-router'

import Dashboards from './views/DashBoards.vue'
import Posts from './views/PostView.vue'
import Comments from './views/CommentsView.vue'
import Users from './views/UsersView.vue'

Vue.use(VueRouter)

export default new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/admin/',
            component: Dashboards,
        },
        {
            path: '/admin/posts',
            component: Posts,
        },
        {
            path: '/admin/comments',
            component: Comments,
        },
        {
            path: '/admin/users',
            component: Users,
        },
    ],
})
