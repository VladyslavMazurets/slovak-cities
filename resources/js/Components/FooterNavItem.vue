<template>
    <a :href="link ?? '/'" :alt="title + '-link'" class="footer-nav-item">{{
        title
    }}</a>
</template>
<script setup lang="ts">
interface Props {
    title: string;
    link?: string;
}

const props = defineProps<Props>();
</script>
