import VueRouter from 'vue-router'

import Dashboards from './views/DashBoards.vue'
import NotFoud from './NotFound.vue'

import Users from './views/users/UsersView.vue'
import UserSingle from './views/users/UserSingle.vue'
import UserEdit from './views/users/UserEdit.vue'

import Posts from './views/posts/PostView.vue'
import PostSingle from './views/posts/PostSingle.vue'
import PostEdit from './views/posts/PostEdit.vue'
import PostNew from './views/posts/PostNew.vue'

import Comments from './views/comments/CommentsView.vue'
import CommentNew from './views/comments/CommentNew.vue'
import CommentSingle from './views/comments/CommentSingle.vue'
import CommentEdit from './views/comments/CommentEdit.vue'

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
            path: '/admin/posts/new',
            component: PostNew,
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
            path: '/admin/comments',
            component: Comments,
        },
        {
            path: '/admin/comments/new',
            component: CommentNew,
        },
        {
            path: '/admin/comments/:id',
            component: CommentSingle,
        },
        {
            path: '/admin/comments/:id/edit',
            component: CommentEdit,
        },
        {
            path: '/admin/users',
            component: Users,
        },
        {
            path: '/admin/users/:id',
            component: UserSingle,
        },
        {
            path: '/admin/users/:id/edit',
            component: UserEdit,
        },
        {
            path: '/admin/404',
            component: NotFoud,
        },
        {
            path: '*',
            redirect: '/admin/404',
        },
    ],
})
