<template>
    <div>
        <nav class="nav">
            <div class="navbar-brand">
                <a class="navbar-item" href="/">
                    <img src="../Logo-sk.png" />
                </a>
            </div>

            <section>
                <h5 class="heading">ADMIN</h5>
                <router-link to="/admin/">Dashboards</router-link>
            </section>

            <section>
                <h5 class="heading">RESOURCES</h5>
                <router-link to="/admin/posts">Posts</router-link>
                <router-link to="/admin/comments">Comments</router-link>
                <router-link to="/admin/users">Users</router-link>
            </section>

            <section>
                <h5 class="heading">GENERAL</h5>
                <a href="/">Homepage</a>
                <a href="/logout">Logout</a>
            </section>
        </nav>
    </div>
</template>

<script>
export default {}
</script>

<style lang="scss" scoped>
.heading {
    margin-top: 3rem;
}

.navbar-brand a {
    margin-right: 0.85rem;
}

@media screen and (max-width: 768px) {
    .heading {
        margin-top: 0.7rem;
    }
}
</style>
