<template>
    <div>
        <h1 class="title">Create new post</h1>
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
            <div class="control">
                <textarea
                    class="textarea"
                    :class="{ 'is-danger': errors.text }"
                    v-model="text"
                    placeholder="Textarea"
                ></textarea>
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
import axios from 'axios'
export default {
    data() {
        return {
            title: '',
            text: '',
            slug: '',
            errors: {},
        }
    },
    computed: {
        slug() {
            return _.trim(
                _.deburr(this.title.toLowerCase())
                    .replace(/[^\w\s]/gi, '') /* medzery všetky do pč */
                    .replace(/ {2,}/g, ' ') /* medzery všetky do pč */
                    .replace(/ /g, '-') /* nahradenie medzier */,
                '-'
            )
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

            axios
                .post('/api/posts', data)
                .then((response) => {
                    this.$router.push(`/admin/posts/${response.data.post.id}`)
                })
                .catch((errors) => {
                    this.errors = errors.response.data.errors
                })
        },
    },
}
</script>

<style lang="scss" scoped></style>
