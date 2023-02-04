<template>
    <div>
        <h1 class="title">Edit user</h1>
        {{ $route.params }}
        {{ user }}

        <div class="field">
            <label class="label">User</label>
            <div class="control">
                <h5 class="input">{{ user.name }}</h5>
            </div>
        </div>
    </div>
</template>

<script>
export default {
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
}
</script>

<style lang="scss" scoped></style>
