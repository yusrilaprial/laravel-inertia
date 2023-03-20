<template>
    <Layout title="About">
        <h1>
            INI HALAMAN ABOUT {{ name }}
        </h1>
        <Link href="/home" as="button">Home</Link>
    </Layout>
</template>
<script>
import { Link } from '@inertiajs/vue3'
import Layout from '../Shared/Layout.vue';

export default {
    props: ['name'],
    components: {
        Link,
        Layout
    },
}
</script>
<style>
    
</style>