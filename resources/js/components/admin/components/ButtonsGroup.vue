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
                <button class="button is-danger is-outlined">
                    <span class="icon"
                        ><i class="mdi mdi-trash-can-outline"></i
                    ></span>
                    <div class="text">Delete {{ source }}</div>
                </button>
            </p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        source: {
            type: String,
        },
        id: {
            type: Number,
        },
    },
}
</script>

<style lang="scss" scoped></style>
