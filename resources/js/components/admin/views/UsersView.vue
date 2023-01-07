<template>
    <div>
        <section class="page posts-page">
            <h1>Users</h1>
        </section>

        <table class="table is-bordered is-striped is-fullwidth">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>registred at</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in users" :key="user.id">
                    <td>{{ user.id }}</td>
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ user.created_at }}</td>
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
            users: [],
        }
    },
    created() {
        axios.get('/api/users').then((response) => {
            this.users = response.data
        })
    },
}
</script>
