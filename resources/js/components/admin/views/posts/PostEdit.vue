<template>
    <div>
        <h1 class="title">Edit post</h1>
        {{ $route.params }}
        {{ post }}
    </div>
</template>

<script>
export default {
    data() {
        return {
            post: {},
        }
    },
    created() {
        axios.get('/api/posts/' + this.$route.params.id).then((response) => {
            this.post = response.data
        })
    },
}
</script>

<style lang="scss" scoped></style>
