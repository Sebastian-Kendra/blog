<template>
    <div class="columns layout">
        <nav class="column is-3 main-navbar">
            <the-navigation />
        </nav>

        <main class="column is-9">
            <the-stats />
            <router-view></router-view>
        </main>

        <flash-message></flash-message>
    </div>
</template>

<script>
import TheNavigation from './components/TheNavigations.vue'
import TheStats from './components/TheStats.vue'
import FlashMessage from '../FlashMessage'

export default {
    components: {
        TheNavigation,
        TheStats,
        FlashMessage,
    },
    setup() {
        return {}
    },
}
</script>

<style lang="scss" scoped></style>
