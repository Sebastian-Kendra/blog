<template>
    <div>
        <div class="field">
            <label class="label">Titte</label>
            <div class="control">
                <input
                    class="input"
                    :class="{ 'is-danger': errors.title }"
                    type="text"
                    placeholder="Title"
                    name="Title"
                    v-model="title"
                />
                <div v-if="errors.title">
                    <p
                        v-for="(error, index) in errors.title"
                        :key="index"
                        class="help is-danger"
                    >
                        {{ error }}
                    </p>
                </div>
            </div>
        </div>
        <div class="field">
            <label class="label">Slug</label>
            <div class="control">
                <input
                    class="input"
                    :class="{ 'is-danger': errors.slug }"
                    type="text"
                    placeholder="Slug"
                    name="Slug"
                    v-model="slug"
                />
                <div v-if="errors.slug">
                    <p
                        v-for="(error, index) in errors.slug"
                        :key="index"
                        class="help is-danger"
                    >
                        {{ error }}
                    </p>
                </div>
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
            slug: '', // To bolo pri watcherovy
        }
    },
    mounted() {
        document.addEventListener('trix-change', () => {
            this.text = document.getElementById('x').value
        })
    },
    computed: {
        slugs: {
            // getter
            get: function () {
                let value = _.trim(
                    _.deburr(this.title.toLowerCase())
                        .replace(/[^\w\s]/gi, '') /// medzery všetky do pč
                        .replace(/ {2,}/g, ' ') /// medzery všetky do pč
                        .replace(/ /g, '-'), /// nahradenie medzier ,
                    '-'
                )
                return (this.slug = value)
            },
            // setter
            set: function (value) {
                let slug = _.trim(
                    _.deburr(this.title.toLowerCase())
                        .replace(/[^\w\s]/gi, '') /// medzery všetky do pč
                        .replace(/ {2,}/g, ' ') /// medzery všetky do pč
                        .replace(/ /g, '-'), /// nahradenie medzier ,
                    '-'
                )
                return (this.slug = slug + value)
            },
        },
    },
    watch: {
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
                user_id: 2,
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
