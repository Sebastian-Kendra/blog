<template>
    <div class="flex">
        <a :href="`/admin/${source}s/${id}`">
            <span class="icon"><i class="mdi mdi-trash-can-outline"></i></span>
        </a>
        <a :href="`/admin/${source}s/${id}/edit`">
            <span class="icon"
                ><i class="mdi mdi-square-edit-outline"></i
            ></span>
        </a>
        <a>
            <span class="icon"><i class="mdi mdi-eye-outline"></i></span>
        </a>
    </div>
</template>

<script>
export default {
    props: ['source', 'id'],
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
