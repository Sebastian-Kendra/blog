<template>
    <div>
        <section class="page posts-page">
            <h1>Comments</h1>
        </section>

        <table class="table is-bordered is-striped is-fullwidth">
            <thead>
                <tr>
                    <th>id</th>
                    <th>comment</th>
                    <th>post</th>
                    <th>user</th>
                    <th>published</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="comment in comments" :key="comment.id">
                    <td>{{ comment.id }}</td>
                    <td>{{ shorten(comment.text) }}</td>
                    <td>{{ comment.post_id }}</td>
                    <td>{{ comment.user_id }}</td>
                    <td>{{ comment.created_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    data() {
        return {
            comments: [],
        }
    },
    created() {
        axios.get('/api/comments').then((response) => {
            this.comments = response.data
        })
    },
    methods: {
        shorten(text, len = 50) {
            return _.truncate(text, { length: len })
        },
    },
}
</script>
