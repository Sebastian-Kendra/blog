<template>
    <div>
        <h1 class="title">Edit comment</h1>
        {{ $route.params }}
        {{ comment }}
    </div>
</template>

<script>
export default {
    data() {
        return {
            comment: {},
        }
    },
    created() {
        axios.get('/api/comments/' + this.$route.params.id).then((response) => {
            this.comment = response.data
        })
    },
}
</script>

<style lang="scss" scoped></style>
