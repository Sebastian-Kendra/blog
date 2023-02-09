<template>
    <div>
        <div class="field is-grouped">
            <p class="control">
                <router-link
                    :to="`/admin/${source}s/new`"
                    class="button is-success"
                    >Create new</router-link
                >
            </p>
            <p class="control">
                <router-link
                    :to="`/admin/${source}s/${id}/edit`"
                    class="button is-info is-outlined"
                >
                    <span class="icon"
                        ><i class="mdi mdi-square-edit-outline"></i
                    ></span>
                    <div class="text">Edit {{ source }}</div></router-link
                >
            </p>
            <p class="control">
                <a @click="deleteSource">
                    <button class="button is-danger is-outlined">
                        <span class="icon"
                            ><i class="mdi mdi-trash-can-outline"></i
                        ></span>
                        <div class="text">Delete {{ source }}</div>
                    </button>
                </a>
            </p>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    props: {
        source: {
            type: String,
        },
        id: {
            type: Number,
        },
    },
    methods: {
        deleteSource() {
            if (window.confirm('si Si si naozaj ista ? tak poista')) {
                axios
                    .delete(`/api/${this.source}s/${this.id}`)
                    .then(() => {
                        window.eventBus.emit('change-stats', 'comment')
                        window.eventBus.emit('change-stats', 'user')
                        window.eventBus.emit('change-stats', 'post')
                    })
                    .then(() => this.$router.push(`/admin/${this.source}s`))
            }
        },
    },
}
</script>

<style lang="scss" scoped></style>
