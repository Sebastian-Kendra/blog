<template>
    <span>{{ newLength }}</span>
</template>
<script>
export default {
    props: ['comment-data', 'post-id'],
    data() {
        return {
            commentLength: '',
            newLength: '',
        }
    },
    mounted() {
        this.changeNum()
        this.reactChange()
        this.reloadNum()
    },
    methods: {
        changeNum() {
            this.newLength = this.commentLength = this.commentData.length
        },
        reactChange() {
            window.eventBus.on('delete', (e) => {
                this.newLength = this.commentLength - e
            })
        },
        reloadNum() {
            window.eventBus.on('change-numbero', () => {
                axios.get('/api/comments').then((response) => {
                    let postComments = response.data.filter(
                        (comment) => comment.post_id === this.postId
                    )

                    this.newLength = this.commentLength = postComments.length
                })
            })
        },
    },
}
</script>

<style lang="scss" scoped></style>
