<template>
    <div>Detail Obca</div>
</template>

<script setup lang="ts">
import { City } from "../../types";

interface Props {
    city: City;
}

const props = defineProps<Props>();
console.log("🚀 ~ props:", props.city);
</script>
