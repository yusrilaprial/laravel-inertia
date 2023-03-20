<template>
    <Layout title="Home">
        <h1>
            Hello {{ title }}
        </h1>
        <Link href="/about">About</Link>
    </Layout>
</template>
<script>
import { Link } from '@inertiajs/vue3'
import Layout from '@/Shared/Layout.vue'

export default {
    props: ['title'],
    components: {
        Link,
        Layout,
    },
}
</script>
<style>
    
</style>