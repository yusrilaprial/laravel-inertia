<template>
    <Layout :title="title">
        <h1>Tambah User</h1>
        <form @submit.prevent="update">
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
            <button type="submit" :disabled="user.processing">Update</button>
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
            editUser: {
                name: this.user.name,
                email: this.user.email
            }
        }
    },
    props: {
        title: String,
        errors: Object,
        user: Object
    },
    components: {
        Layout,
        Link
    },
    methods: {
        update() {
            router.put('/user/'+this.user.id, this.editUser);
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