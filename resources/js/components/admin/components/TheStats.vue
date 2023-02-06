<template>
    <div>
        <nav class="level is-mobile">
            <div class="level-item has-text-centered box">
                <div>
                    <p class="heading">Posts</p>
                    <p class="title">{{ oldPosts }}</p>
                </div>
            </div>
            <div class="level-item has-text-centered box">
                <div>
                    <p class="heading">Comments</p>
                    <p class="title">{{ oldComments }}</p>
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
            newPosts: '',
            oldPosts: '',
            newComments: '',
            oldComments: '',
            users: '',
        }
    },
    created() {
        this.reloadNum
        this.changeNum
        axios.get('/api/posts').then((response) => {
            this.oldPosts = response.data.length
        })
        axios.get('/api/comments').then((response) => {
            this.oldComments = response.data.length
        })
    },
    methods: {
        changeNum() {
            this.newLength = this.oldPosts
        },
        reloadNum() {
            window.eventBus.on('change-stats', () => {
                console.log('stane sa vobec dačo ?')
                /* axios.get('/api/posts').then((response) => {
                    this.oldPosts = this.newPosts = response.data.length
                })
                axios.get('/api/comments').then((response) => {
                    this.comments = response.data.length
                }) */
            })
        },
    },
}
</script>

<style lang="scss" scoped>
.level {
    margin-bottom: 1rem;
}
</style>
