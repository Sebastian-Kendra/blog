<template>
    <div>
        <section class="page posts-page">
            <h1>Posts</h1>
        </section>

        <table class="table is-bordered is-striped is-fullwidth">
            <thead>
                <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>user</th>
                    <th>published</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="post in posts" :key="post.id">
                    <td>{{ post.id }}</td>
                    <td>
                        {{ post.title }}
                        <small>{{ shorten(post.text) }}</small>
                    </td>
                    <td>{{ post.user_id }}</td>
                    <td>{{ post.created_at }}</td>
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
            posts: [],
        }
    },
    created() {
        axios.get('/api/posts').then((response) => {
            this.posts = response.data
        })
    },
    methods: {
        shorten(text, len = 50) {
            return _.truncate(text, { length: len })
        },
    },
}
</script>

<style lang="scss" scoped>
small {
    color: silver;
    font-size: 0.75rem;
}
</style>
