<template>
    <div>
        <div class="field">
            <label class="label">User</label>
            <div class="control">
                <h5 class="input">{{ comment.user.name }}</h5>
            </div>
        </div>
        <div class="field">
            <label class="label">Post slug</label>
            <div class="control">
                <h5 class="input">{{ comment.post.slug }}</h5>
            </div>
        </div>
        <div class="field">
            <label class="label">Message</label>
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
        post: {
            type: Object,
        },
    },
    data() {
        return {
            title: '',
            text: '',
            slug: '',
        }
    },
    mounted() {
        document.addEventListener('trix-change', () => {
            this.text = document.getElementById('x').value
        })
    },
    watch: {
        title(value) {
            this.slug = _.trim(
                _.deburr(value.toLowerCase())
                    .replace(/[^\w\s]/gi, '') /* medzery všetky do pč */
                    .replace(/ {2,}/g, ' ') /* medzery všetky do pč */
                    .replace(/ /g, '-') /* nahradenie medzier */,
                '-'
            )
        },
        post(post) {
            ;(this.slug = post.slug),
                (this.text = post.text),
                (this.title = post.title)

            let trix = document.querySelector('trix-editor')
            trix.editor.insertHTML(post.text)
        },
    },
    methods: {
        submitForm() {
            let data = {
                text: this.text,
                title: this.title,
                slug: this.slug,
                user_id: 1,
            }

            this.$emit('post-form-submited', data)
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
