<template>
    <div>
        <h1 class="title">Create new comment</h1>
        <comment-create-form
            :errors="errors"
            @comment-form-submited="submitForm"
        />
    </div>
</template>

<script>
import CommentCreateForm from './CommentCreateForm.vue'
import axios from 'axios'
export default {
    data() {
        return {
            errors: {},
        }
    },
    components: {
        CommentCreateForm,
    },
    methods: {
        submitForm(data) {
            axios
                .post('/api/comments', data)
                .then((response) => {
                    /* this.comment = response.data */
                    this.$router.push(
                        `/admin/comments/${response.data.comment.id}`
                    )
                })
                .catch((errors) => {
                    this.errors = errors.response.data.errors
                })
        },
    },
}
</script>

<style lang="scss" scoped></style>
