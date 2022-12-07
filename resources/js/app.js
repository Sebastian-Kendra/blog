import './bootstrap'

import FlashMessage from './components/FlashMessage.vue'
import CommentView from './components/CommentView.vue'
import CommentCalc from './components/CommentCalc.vue'
import CommentCreate from './components/CommentCreate.vue'
import CommentList from './components/CommentList.vue'

const app = new Vue({
    el: '#app',
    components: {
        FlashMessage,
        CommentView,
        CommentCalc,
        CommentCreate,
        CommentList,
    },
})
