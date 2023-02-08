<template>
    <div>
        <div class="field">
            <label class="label">User name</label>
            <div class="control">
                <input
                    class="input"
                    :class="{ 'is-danger': errors.name }"
                    type="text"
                    name="name"
                    v-model="name"
                />
                <div v-if="errors.name">
                    <p
                        v-for="(error, index) in errors.name"
                        :key="index"
                        class="help is-danger"
                    >
                        {{ error }}
                    </p>
                </div>
            </div>
        </div>
        <div class="field">
            <label class="label">User email</label>
            <div class="control">
                <input
                    class="input"
                    :class="{ 'is-danger': errors.email }"
                    type="email"
                    name="email"
                    v-model="email"
                />
                <div v-if="errors.email">
                    <p
                        v-for="(error, index) in errors.email"
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
export default {
    props: {
        errors: {
            type: Object,
        },
        user: {
            type: Object,
        },
    },
    data() {
        return {
            name: '',
            email: '',
        }
    },
    watch: {
        user(user) {
            ;(this.name = user.name), (this.email = user.email)
        },
    },
    methods: {
        submitForm() {
            let data = {
                name: this.name,
                email: this.email,
            }

            this.$emit('user-form-submited', data)
        },
    },
}
</script>

<style lang="scss" scoped></style>
