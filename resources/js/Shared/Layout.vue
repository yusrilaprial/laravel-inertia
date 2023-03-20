<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template>
  <main>
    <header>
      <Link href="/home">Home</Link>
      <Link href="/about">About</Link>
      <Link href="/users">Users</Link>
    </header>
    <article>
      <slot />
    </article>
    <footer>
      <p>&copy; yusrilaprial 2023</p>
    </footer>
  </main>
</template>

<script>
export default {
  props: {
    title: String,
  },
  watch: {
    title: {
      immediate: true,
      handler(title) {
        document.title = title;
      },
    },
  },
}
</script>