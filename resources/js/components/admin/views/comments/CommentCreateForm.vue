<template>
    <div>
        <div class="field">
            <label class="label">For Post (id)</label>
            <div class="control">
                <input
                    class="input"
                    :class="{ 'is-danger': errors.postId }"
                    type="text"
                    placeholder="Post"
                    name="post-title"
                    v-model="postId"
                />
                <div v-if="errors.postId">
                    <p
                        v-for="(error, index) in errors.postId"
                        :key="index"
                        class="help is-danger"
                    >
                        {{ error }}
                    </p>
                </div>
            </div>
        </div>
        <div class="field">
            <label class="label">Comment</label>
            <div class="control content">
                <input id="x" :value="text" type="hidden" name="text" />
                <trix-editor
                    input="x"
                    :class="{ 'input is-danger': errors.text }"
                ></trix-editor>
                <div v-if="errors.text">
                    <p
                        v-for="(error, index) in errors.text"
                        :key="index"
                        class="help is-danger"
                    >
                        {{ error }}
                    </p>
                </div>
            </div>
        </div>
        <div class="field is-grouped">
            <div class="control">
                <button class="button is-primary" @click="submitForm">
                    Submit
                </button>
            </div>
            <div class="control">
                <button @click="$router.go(-1)" class="button is-text">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import trix from 'trix'
import axios from 'axios'
export default {
    props: {
        errors: {
            type: Object,
        },
        comment: {
            type: Object,
        },
    },
    data() {
        return {
            postId: '',
            text: '',
        }
    },
    mounted() {
        document.addEventListener('trix-change', () => {
            this.text = document.getElementById('x').value
        })
    },
    watch: {
        comment(comment) {
            ;(this.text = comment.text), (this.postId = comment.post_id)

            let trix = document.querySelector('trix-editor')
            trix.editor.insertHTML(comment.text)
        },
    },
    methods: {
        submitForm() {
            let data = {
                text: this.text,
                post_id: this.postId,
                user_id: 1,
            }

            this.$emit('comment-form-submited', data)
        },
    },
}
</script>

<style lang="scss" scoped>
@import '~trix/dist/trix.css';

trix-editor {
    min-height: 10em;
}
</style>
