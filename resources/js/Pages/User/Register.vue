<template>
    <Layout :title="title">
        <h1>Tambah User</h1>
        <form @submit.prevent="register">
            <div class="form-control">
                <label for="name">Name:</label>
                <input type="text" v-model="user.name">
                <p class="error" v-if="errors.name">{{ errors.name }}</p>
            </div>
            <div class="form-control">
                <label for="name">Email:</label>
                <input type="email" v-model="user.email">
                <p class="error" v-if="errors.email">{{ errors.email }}</p>
            </div>
            <div class="form-control">
                <label for="password">Password:</label>
                <input type="password" v-model="user.password">
                <p class="error" v-if="errors.password">{{ errors.password }}</p>
            </div>
            <div class="form-control">
                <label for="password">Validasi Password:</label>
                <input type="password" v-model="user.valid_password">
                <p class="error" v-if="errors.valid_password">{{ errors.valid_password }}</p>
            </div>
            <button type="submit" :disabled="user.processing">Register</button>
        </form>
    </Layout>
</template>
<script>
import Layout from '@/Shared/Layout.vue'
import { Link } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'

export default {
    data() {
        return {
            user: {
                name: '',
                email: '',
                password: '',
                valid_password: ''
            }
        }
    },
    props: {
        title: String,
        errors: Object
    },
    components: {
        Layout,
        Link
    },
    methods: {
        register() {
            router.post('/user', this.user);
        }
    },
}
</script>
<style>
    .form-control {
        margin-bottom: 5px;
    }
    .error {
        color: red;
        margin: 0;
    }
</style>