<template>
    <div>
        <table-search
            name="comment"
            :count="data.length"
            @searchQuery-change="search = $event"
        />

        <table class="table is-bordered is-striped is-fullwidth">
            <thead>
                <tr>
                    <th>id</th>
                    <th>text</th>
                    <th>post</th>
                    <th>user</th>
                    <th>published</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="comment in filtredItems" :key="comment.id">
                    <td>{{ comment.id }}</td>
                    <td>{{ shorten(comment.text) }}</td>
                    <td>{{ comment.post.title }}</td>
                    <td>{{ comment.user.name }}</td>
                    <td>{{ comment.created_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import tableMixin from '../mixins/tableMixin'
import TableSearch from '../components/TableSearch.vue'
import axios from 'axios'
export default {
    mixins: [tableMixin],
    data() {
        return {
            searchColum: 'text',
        }
    },
    created() {
        axios.get('/api/comments').then((response) => {
            this.data = response.data
        })
    },
    components: {
        TableSearch,
    },
}
</script>
