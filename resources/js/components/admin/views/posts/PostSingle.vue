<template>
    <div>
        <h1 class="title">
            <small class="has-text-grey-light">post | </small>
            {{ post.title }}
        </h1>

        <div class="content" v-html="post.text"></div>

        <table class="meta table">
            <tr>
                <td><strong>id:</strong></td>
                <td>{{ post.id }}</td>
            </tr>
            <tr>
                <td><strong>slug:</strong></td>
                <td>
                    <input
                        type="text"
                        class="input"
                        :value="post.slug"
                        readonly
                    />
                </td>
            </tr>
            <tr>
                <td><strong>create at:</strong></td>
                <td>{{ niceDate(post.created_at) }}</td>
            </tr>
            <tr>
                <td><strong>update at:</strong></td>
                <td>{{ niceDate(post.updated_at) }}</td>
            </tr>
        </table>

        <buttons-group source="post" :id="post.id" />
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
            post: {},
        }
    },
    created() {
        axios
            .get('/api/posts/' + this.$route.params.id)
            .then((response) => {
                this.post = response.data
            })
            .catch((error) => {
                return this.$router.push('/admin/404')
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
