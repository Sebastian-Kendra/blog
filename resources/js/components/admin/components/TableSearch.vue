<template>
    <div>
        <!-- Main container -->
        <nav class="level">
            <!-- Left side -->
            <div class="level-left">
                <div class="level-item">
                    <p class="subtitle is-5">
                        <strong>{{ count }} of {{ trueCount }}</strong>
                        {{ name }}s
                    </p>
                </div>
                <div class="level-item">
                    <div class="field has-addons">
                        <p class="control">
                            <input
                                class="input"
                                type="text"
                                :placeholder="'Find a ' + name"
                                v-model="searchQuery"
                            />
                        </p>
                        <p class="control">
                            <button
                                class="button"
                                v-show="this.searchQuery != ''"
                                @click="resetQuery"
                            >
                                Reset
                            </button>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Right side -->
            <div class="level-right">
                <p class="level-item">
                    <router-link
                        :to="`/admin/${name}s/new`"
                        class="button is-success"
                        >New {{ name }}</router-link
                    >
                </p>
            </div>
        </nav>
    </div>
</template>

<script>
export default {
    props: {
        name: {
            type: String,
        },
        count: {
            type: Number,
        },
        trueCount: {
            type: Number,
        },
    },
    data() {
        return {
            searchQuery: '',
        }
    },
    methods: {
        resetQuery() {
            this.searchQuery = ''
        },
    },
    watch: {
        searchQuery(value) {
            this.$emit('searchQuery-change', value)
        },
    },
}
</script>

<style lang="scss" scoped>
nav {
    margin-bottom: 0.85rem;
    margin-top: 0.85rem;
}
</style>
