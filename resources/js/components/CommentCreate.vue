<template>
    <form class="add-comment-form" @submit.prevent="subForm">
        <div class="field">
            <label class="label">SSssprava</label>
            <div class="control">
                <textarea
                    v-model="query"
                    class="textarea"
                    placeholder="Tu si piš"
                    rows="4"
                    name="text"
                ></textarea>
            </div>

            <div class="control">
                <button class="button is-warning">Pridaj si komm.</button>
            </div>
        </div>
    </form>
</template>

<script>
import axios from 'axios'
export default {
    props: ['post-id'],
    data() {
        return {
            query: '',
        }
    },
    methods: {
        getSomething() {
            console.log(this.postId)
        },
        subForm() {
            axios
                .post('/comments', {
                    text: this.query,
                    post_id: this.postId,
                })
                .then((response) => {
                    window.flash('Komentar še pridal')
                })
                .catch((error) => {
                    console.log(error)
                })
        },
    },
}
</script>
