<template>
    <div>
        <li v-for="comment in newComments" :key="comment.id">
            <comment-view
                :comment-data="comment"
                :post-id="postData.id"
                :commentedUser="commentedUser"
            ></comment-view>
        </li>
    </div>
</template>

<script>
import axios from 'axios'
import CommentView from './CommentView.vue'
export default {
    components: {
        CommentView,
    },
    props: ['post-data'],
    data() {
        return {
            comments: this.postData.comments,
            newComments: [],
            commentedUser: '',
        }
    },
    mounted() {
        this.getUser()
        this.newComments = this.comments
        window.eventBus.on('new-comment-comming', (e) => {
            this.commentedUser = e.commentedUser

            axios
                .post('/comments', {
                    text: e.text,
                    post_id: e.post_id,
                })
                .then(() => {
                    window.flash('Komentar še pridal')
                    this.reloadComments()
                    window.eventBus.emit('change-numbero')
                })
                .catch((error) => {
                    console.log(error)
                })
        })
    },
    methods: {
        reloadComments() {
            axios.get('/api/comments').then((response) => {
                let postComments = response.data.filter(
                    (comment) => comment.post_id === this.postData.id
                )
                this.newComments = postComments.reverse()
            })
        },
        getUser() {
            axios.get('/api/users').then((response) => {
                window.eventBus.emit('sent-users', response.data)
            })
        },
    },
}
</script>

<style lang="scss" scoped></style>
