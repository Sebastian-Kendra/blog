<template>
    <div>
        <h1 class="title">Edit post</h1>
        <post-create-form
            :errors="errors"
            :post="post"
            @post-form-submited="submitForm"
        />
    </div>
</template>

<script>
import PostCreateForm from './PostCreateForm.vue'
import axios from 'axios'
export default {
    data() {
        return {
            errors: {},
            post: {},
        }
    },
    components: {
        PostCreateForm,
    },
    created() {
        axios.get('/api/posts/' + this.$route.params.id).then((response) => {
            this.post = response.data
        })
    },
    methods: {
        submitForm(data) {
            let id = this.$route.params.id

            axios
                .patch(`/api/posts/${id}`, data)
                .then((response) => {
                    this.$router.push(`/admin/posts/${response.data.post.id}`)
                })
                .catch((errors) => {
                    this.errors = errors.response.data.errors
                })
        },
    },
}
</script>
