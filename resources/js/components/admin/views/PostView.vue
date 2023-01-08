<template>
    <div>
        <table-search
            name="post"
            :count="data.length"
            @searchQuery-change="search = $event"
        />

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
                <tr v-for="post in filtredPosts" :key="post.id">
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
import TableSearch from '../components/TableSearch.vue'
import axios from 'axios'
export default {
    data() {
        return {
            data: [],
            search: '',
        }
    },
    created() {
        axios.get('/api/posts').then((response) => {
            this.data = response.data
        })
    },
    methods: {
        shorten(text, len = 50) {
            return _.truncate(text, { length: len })
        },
    },
    computed: {
        filtredPosts() {
            return this.data.filter((item) => {
                return item.title
                    .toLowerCase()
                    .includes(this.search.toLowerCase())
            })
        },
    },
    components: {
        TableSearch,
    },
}
</script>

<style lang="scss" scoped>
small {
    color: silver;
    font-size: 0.75rem;
}
</style>
