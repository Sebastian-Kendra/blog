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
                    <p class="title">{{ comments }}</p>
                </div>
            </div>
            <div class="level-item has-text-centered box">
                <div>
                    <p class="heading">Users</p>
                    <p class="title">{{ users }}</p>
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
        window.eventBus.on('change-stats', (data) => {
            if (data === 'comment') {
                axios.get('/api/comments').then((response) => {
                    this.comments = response.data.length
                })
            }
            if (data === 'post') {
                axios.get('/api/posts').then((response) => {
                    this.posts = response.data.length
                })
            }
            if (data === 'user') {
                axios.get('/api/users').then((response) => {
                    this.users = response.data.length
                })
            }
        })

        axios.get('/api/posts').then((response) => {
            this.posts = response.data.length
        })
        axios.get('/api/comments').then((response) => {
            this.comments = response.data.length
        })
        axios.get('/api/users').then((response) => {
            this.users = response.data.length
        })
    },
}
</script>

<style lang="scss" scoped>
.level {
    margin-bottom: 1rem;
}
</style>
