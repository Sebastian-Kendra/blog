<template>
    <div>
        <table-search
            name="user"
            :count="filtredItems.length"
            :trueCount="data.length"
            @searchQuery-change="search = $event"
        />

        <table class="table is-bordered is-striped is-fullwidth">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>registred at</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in filtredItems" :key="user.id">
                    <td>{{ user.id }}</td>
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ niceDate(user.created_at) }}</td>
                    <td>
                        <edit-links source="user" :id="user.id" />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios'
import EditLinks from '../../components/EditLinks.vue'
import TableSearch from '../../components/TableSearch.vue'
import tableMixin from '../../mixins/tableMixin'

export default {
    mixins: [tableMixin],
    data() {
        return {
            searchColum: 'name',
        }
    },
    created() {
        axios.get('/api/users').then((response) => {
            this.data = response.data
        })
    },
    components: {
        TableSearch,
        EditLinks,
    },
}
</script>
