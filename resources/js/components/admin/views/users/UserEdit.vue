<template>
    <div>
        <h1 class="title">Edit user</h1>
        {{ $route.params }}
        {{ user }}
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
