<template>
    <div>
        <table-search
            name="post"
            :count="filtredItems.length"
            :trueCount="data.length"
            @searchQuery-change="search = $event"
        />

        <table class="table is-bordered is-striped is-fullwidth">
            <thead>
                <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>user</th>
                    <th>published</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="post in filtredItems" :key="post.id">
                    <td>{{ post.id }}</td>
                    <td>
                        {{ post.title }}
                        <small>{{ shorten(post.text) }}</small>
                    </td>
                    <td>
                        <router-link :to="'/admin/users/' + post.user.id">
                            {{ post.user.name }}
                        </router-link>
                    </td>
                    <td>{{ niceDate(post.created_at) }}</td>
                    <td>
                        <edit-links source="post" :id="post.id" />
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
            searchColum: 'title',
        }
    },
    created() {
        axios.get('/api/posts').then((response) => {
            this.data = response.data
        })
    },
    components: {
        TableSearch,
        EditLinks,
        EditLinks,
    },
}
</script>

<style lang="scss" scoped>
small {
    color: silver;
    font-size: 0.75rem;
}
</style>
