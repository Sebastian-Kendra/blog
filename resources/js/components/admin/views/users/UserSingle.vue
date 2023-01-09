<template>
    <div>
        <h1 class="title">
            <small class="has-text-grey-light">user | </small>
            {{ user.name }}
        </h1>

        <div class="content">
            {{ user.text }}
        </div>

        <table class="meta table">
            <tr>
                <td><strong>id:</strong></td>
                <td>{{ user.id }}</td>
            </tr>
            <tr>
                <td><strong>email:</strong></td>
                <td>
                    <input
                        type="text"
                        class="input"
                        :value="user.email"
                        readonly
                    />
                </td>
            </tr>
            <tr>
                <td><strong>create at:</strong></td>
                <td>{{ niceDate(user.created_at) }}</td>
            </tr>
            <tr>
                <td><strong>update at:</strong></td>
                <td>{{ niceDate(user.updated_at) }}</td>
            </tr>
        </table>

        <buttons-group source="user" :id="user.id" />
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
            user: {},
        }
    },
    created() {
        axios.get('/api/users/' + this.$route.params.id).then((response) => {
            this.user = response.data
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
