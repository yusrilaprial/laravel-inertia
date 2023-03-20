<template>
    <Layout :title="title">
        <h1>Daftar User</h1>
        <Link href="/register" as="button">Register</Link>
        <div v-if="$page.props.flash.message" :class="`alert ${$page.props.flash.status}`">
            {{ $page.props.flash.message }}
        </div>
        <ul>
            <li v-for="user in users" :key="user.id">
                {{ user.name }}<br>
                <Link :href="`/user/${user.id}`">Lihat User</Link>
            </li>
        </ul>
    </Layout>
</template>
<script>
import Layout from '@/Shared/Layout.vue'
import { Link } from '@inertiajs/vue3'

export default {
    props: {
        title: String,
        users: Array,
    },
    components: {
        Layout,
        Link
    },
}
</script>
<style>
    .alert{
        color: white;
        border-radius: 5px; 
        text-align: center;
        width: fit-content;
        padding: 10px;
        margin: 10px 0;
    }
    .success {
        background: yellowgreen;
    }
    .errors {
        background: red;
    }
    .warning {
        background: yellow;
    }
</style>