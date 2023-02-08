<template>
    <div>
        <h1 class="title">Edit user</h1>
        <user-create-form
            :errors="errors"
            :user="user"
            @user-form-submited="submitForm"
        ></user-create-form>
    </div>
</template>

<script>
import axios from 'axios'
import UserCreateForm from './UserCreateForm.vue'
export default {
    components: { UserCreateForm },
    data() {
        return {
            errors: {},
            user: {},
        }
    },
    created() {
        axios.get('/api/users/' + this.$route.params.id).then((response) => {
            this.user = response.data
        })
    },
    methods: {
        submitForm(data) {
            let id = this.$route.params.id

            axios
                .patch(`/api/users/${id}`, data)
                .then(() => {
                    this.$router.push(`/admin/users/${id}`)
                })
                .catch((errors) => {
                    this.errors = errors.response.data.errors
                })
        },
    },
}
</script>

<style lang="scss" scoped></style>
