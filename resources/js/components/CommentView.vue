<template>
    <article class="comment">
        <div
            class="content"
            :contenteditable="editing"
            ref="comment"
            @input="textChange"
            @keydown.enter="updateComment"
            @keydown.esc="notUpdate"
            @blur="notUpdate"
        >
            {{ commentData.text }}
        </div>

        <footer class="meta">
            <a class="author"> @<strong>Author</strong> </a>
            <time :datetime="this.commentData.created_at" class="has-text-grey">
                {{ date }}
            </time>

            <span class="controls has-text-gray">
                <a class="edit" @click="startEdit">edit</a>
                <a class="delete" @click="deleteComment">x</a>
            </span>
        </footer>
    </article>
</template>

<script>
import axios from 'axios'
import moment from 'moment'

export default {
    props: ['comment-data'],
    data() {
        return {
            editing: false,
            newText: '',
            oldText: '',
            date: '',
        }
    },
    mounted() {
        this.oldText = this.newText = this.commentData.text
        this.dateForUser()
    },
    methods: {
        dateForUser() {
            this.date = moment(this.commentData.created_at).fromNow()
        },
        startEdit() {
            this.editing = true
            this.selectCell()
        },
        selectCell() {
            setTimeout(() => {
                let p = this.$refs.comment,
                    s = window.getSelection(),
                    r = document.createRange()
                r.setStart(p, 0)
                r.setEnd(p, 1)
                s.removeAllRanges()
                s.addRange(r)
                p.focus()
            }, 0)
        },
        updateComment() {
            axios.patch('/comments/' + this.commentData.id, {
                text: this.newText,
            })
            this.editing = false

            window.eventBus.emit('flash', 'comment sa prepisal od teba')

            this.oldText = this.newText
        },
        deleteComment() {
            if (window.confirm('Kamo akože naozaj ?')) {
                axios.delete('/comments/' + this.commentData.id)
                window.eventBus.emit('flash', 'comment sa zmazal padol preč')
                window.eventBus.emit('delete', '1')
                this.$el.remove()
            }
        },
        textChange() {
            this.newText = this.$refs.comment.innerText
        },
        notUpdate() {
            this.editing = false
            this.$refs.comment.innerText = this.oldText
        },
    },
}
</script>

<style lang="scss" scoped>
[contenteditable='true'] {
    box-shadow: 0 2px 0 #fff;
    outline: none;
}

.edit {
    padding-right: 7px;
}

.delete {
    padding: 12px;
}
</style>
