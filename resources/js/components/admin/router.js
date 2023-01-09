import VueRouter from 'vue-router'

import Dashboards from './views/DashBoards.vue'

import Users from './views/users/UsersView.vue'

import Posts from './views/posts/PostView.vue'
import PostSingle from './views/posts/PostSingle.vue'
import PostEdit from './views/posts/PostEdit.vue'
import PostNew from './views/posts/PostNew.vue'

import Comments from './views/comments/CommentsView.vue'

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
            path: '/admin/posts/:id',
            component: PostSingle,
        },
        {
            path: '/admin/posts/:id/edit',
            component: PostEdit,
        },
        {
            path: '/admin/posts/new',
            component: PostNew,
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
