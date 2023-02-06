<template>
    <div>
        <h1 class="title">Edit comment</h1>
        <comment-create-form
            :errors="errors"
            :comment="comment"
            @comment-form-submited="submitForm"
        />
    </div>
</template>

<script>
import CommentCreateForm from './CommentCreateForm.vue'
export default {
    components: {
        CommentCreateForm,
    },
    data() {
        return {
            errors: {},
            comment: {},
        }
    },
    created() {
        axios.get('/api/comments/' + this.$route.params.id).then((response) => {
            this.comment = response.data
        })
    },
    methods: {
        submitForm(data) {
            axios
                .post('/api/comments', data)
                .then((response) => {
                    this.comment = response.data
                    this.$router.push(`/admin/posts/${response.data.post.id}`)
                })
                .catch((errors) => {
                    this.errors = errors.response.data.errors
                })
        },
    },
}
</script>

<style lang="scss" scoped></style>
