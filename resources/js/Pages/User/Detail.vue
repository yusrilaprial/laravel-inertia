<template>
    <Layout :title="title">
        <h1>Profile User</h1>
        <h3>Nama User: {{ user.name }}</h3>
        <p>Email User: <strong>{{ user.email }}</strong></p>
        <p>User Created: {{ user.created }}</p>
        <Link href="/users" as="button">Back</Link>
        <Link :href="`/user/${user.id}/edit`" as="button">Edit</Link>
        <Link href="" as="button" @click.prevent="delUser">Delete</Link>
    </Layout>
</template>
<script>
import Layout from '@/Shared/Layout.vue'
import { Link } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'

export default {
    props: {
        title: String,
        user: Object
    },
    components: {
        Layout,
        Link
    },
    methods: {
        delUser() {
            if (confirm('Are you sure you want to delete this user?')) {
                router.delete('/user/'+this.user.id);
            } else {
                return false;
            }
        }
    }
}
</script>
<style>
    
</style>