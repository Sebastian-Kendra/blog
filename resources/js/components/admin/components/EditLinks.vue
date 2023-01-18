<template>
    <div class="flex">
        <router-link to="">
            <span class="icon" @click="deleteSource"
                ><i class="mdi mdi-trash-can-outline"></i
            ></span>
        </router-link>
        <router-link :to="`/admin/${source}s/${id}/edit`">
            <span class="icon"
                ><i class="mdi mdi-square-edit-outline"></i
            ></span>
        </router-link>
        <router-link :to="`/admin/${source}s/${id}`">
            <span class="icon"><i class="mdi mdi-eye-outline"></i></span>
        </router-link>
    </div>
</template>

<script>
export default {
    props: ['source', 'id'],
    created() {},
    methods: {
        deleteSource() {
            if (window.confirm('si Si si naozaj ista ? tak poista')) {
                window.eventBus.emit(
                    'flash',
                    `${this.source} sa zmazal padol preč`
                )
                axios
                    .delete(`/api/${this.source}s/${this.id}`)
                    .then((response) =>
                        // trochu na skraslenie
                        setTimeout(() => {
                            this.$router.go()
                        }, 700)
                    )
            }
        },
    },
}
</script>

<style lang="scss" scoped>
.flex {
    display: flex;
    justify-content: center;
}
a {
    border: none;
}
</style>
