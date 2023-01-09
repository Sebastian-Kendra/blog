<template>
    <div>
        <table-search
            name="comment"
            :count="filtredItems.length"
            :trueCount="data.length"
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
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="comment in filtredItems" :key="comment.id">
                    <td>{{ comment.id }}</td>
                    <td>{{ shorten(comment.text) }}</td>
                    <td class="nowrap">
                        <a :href="'/admin/posts/' + comment.post_id">
                            {{ comment.post_id }} <strong>➜</strong>
                        </a>
                    </td>
                    <td>
                        <a :href="'/admin/users/' + comment.user.id">
                            {{ comment.user.name }}
                        </a>
                    </td>
                    <td>{{ niceDate(comment.created_at) }}</td>
                    <td>
                        <edit-links
                            source="comment"
                            :id="comment.id"
                        ></edit-links>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import tableMixin from '../../mixins/tableMixin'
import TableSearch from '../../components/TableSearch.vue'
import axios from 'axios'
import EditLinks from '../../components/EditLinks.vue'
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
        EditLinks,
    },
}
</script>
