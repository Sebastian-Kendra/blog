<template>
    <div>
        <nav class="level is-mobile">
            <div class="level-item has-text-centered box">
                <div>
                    <p class="heading">Posts</p>
                    <p class="title">{{ posts }}</p>
                </div>
            </div>
            <div class="level-item has-text-centered box">
                <div>
                    <p class="heading">Comments</p>
                    <p class="title">123</p>
                </div>
            </div>
            <div class="level-item has-text-centered box">
                <div>
                    <p class="heading">Users</p>
                    <p class="title">456K</p>
                </div>
            </div>
            <div class="level-item has-text-centered box">
                <div>
                    <p class="heading">Likes</p>
                    <p class="title">789</p>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
export default {
    data() {
        return {
            posts: '',
            comments: '',
            users: '',
        }
    },
    created() {
        console.log(this.posts)
        axios.get('/api/posts').then((response) => {
            this.posts = response.data.length
        })
    },
    watch: {
        posts(posts) {},
    },
}
</script>

<style lang="scss" scoped>
.level {
    margin-bottom: 1rem;
}
</style>
