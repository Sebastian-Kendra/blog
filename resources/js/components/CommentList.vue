<template>
    <div>
        <li v-for="comment in comments" :key="comment.id">
            <comment-view
                @click="showUser"
                :comment-data="comment"
            ></comment-view>
        </li>
    </div>
</template>

<script>
import CommentView from './CommentView.vue'
export default {
    components: {
        CommentView,
    },
    props: ['post-data'],
    data() {
        return {
            comments: this.postData.comments,
        }
    },
    mounted() {
        //updateComments()
    },
    methods: {
        showUser() {
            //
        },
        updateComments() {
            //
        },
    },
}
</script>

<style lang="scss" scoped></style>
