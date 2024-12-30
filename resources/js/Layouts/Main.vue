<template>
    <div>
        <Navbar />
        <slot />
        <Footer />
    </div>
</template>

<script setup lang="ts">
import Footer from "../Components/Footer.vue";
import Navbar from "../Components/Navbar.vue";
</script>
