<template>
    <span>{{ newLength }}</span>
</template>
<script>
export default {
    props: ['comment-data'],
    data() {
        return {
            commentLength: '',
            newLength: '',
        }
    },
    mounted() {
        this.changeNum()
        this.reactChange()
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
    },
}
</script>

<style lang="scss" scoped></style>
