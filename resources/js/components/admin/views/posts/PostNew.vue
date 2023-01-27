<template>
    <div>
        <h1 class="title">Create new post</h1>
        <div class="field">
            <label class="label">Titte</label>
            <div class="control">
                <input
                    class="input"
                    type="text"
                    placeholder="Title"
                    name="Title"
                    v-model="title"
                />
            </div>
        </div>
        <div class="field">
            <label class="label">Slug</label>
            <div class="control">
                <input
                    class="input"
                    type="text"
                    placeholder="Slug"
                    name="Slug"
                    v-model="slug"
                />
            </div>
        </div>
        <div class="field">
            <label class="label">Message</label>
            <div class="control">
                <textarea
                    class="textarea"
                    v-model="text"
                    placeholder="Textarea"
                ></textarea>
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

            axios.post('/api/posts', data).then((response) => {
                this.$router.push(`/admin/posts/${response.data.post.id}`)
            })
        },
    },
}
</script>

<style lang="scss" scoped></style>
