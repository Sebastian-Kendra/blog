<template>
    <div>
        <h1 class="title">Create new post</h1>
        <post-create-form :errors="errors" @post-form-submited="submitForm" />
    </div>
</template>

<script>
import PostCreateForm from './PostCreateForm.vue'
import axios from 'axios'
export default {
    data() {
        return {
            errors: {},
        }
    },
    components: {
        PostCreateForm,
    },
    methods: {
        submitForm(data) {
            axios
                .post('/api/posts', data)
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
