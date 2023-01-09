<template>
    <div>
        <h1 class="title">
            <small class="has-text-grey-light">comment</small>
        </h1>

        <div class="content">
            {{ comment.text }}
        </div>

        <table class="meta table">
            <tr>
                <td><strong>id:</strong></td>
                <td>{{ comment.id }}</td>
            </tr>
            <tr>
                <td><strong>Post:</strong></td>
                <td>
                    <router-link :to="`/admin/posts/${comment.post.id}`">{{
                        comment.post.title
                    }}</router-link>
                </td>
            </tr>
            <tr>
                <td><strong>User:</strong></td>
                <td>
                    <router-link :to="`/admin/users/${comment.user.id}`">{{
                        comment.user.name
                    }}</router-link>
                </td>
            </tr>
            <tr>
                <td><strong>create at:</strong></td>
                <td>{{ niceDate(comment.created_at) }}</td>
            </tr>
            <tr>
                <td><strong>update at:</strong></td>
                <td>{{ niceDate(comment.updated_at) }}</td>
            </tr>
        </table>

        <buttons-group source="comment" :id="comment.id" />
    </div>
</template>

<script>
import axios from 'axios'
import moment from 'moment'
import ButtonsGroup from '../../components/ButtonsGroup.vue'
export default {
    components: { ButtonsGroup },
    data() {
        return {
            comment: {
                user: {},
                post: {},
            },
        }
    },
    created() {
        axios.get('/api/comments/' + this.$route.params.id).then((response) => {
            this.comment = response.data
        })
    },
    methods: {
        niceDate(date) {
            return moment(date).format('MMMM Do YYYY, h:mm:ss a')
        },
    },
}
</script>

<style lang="scss" scoped></style>
