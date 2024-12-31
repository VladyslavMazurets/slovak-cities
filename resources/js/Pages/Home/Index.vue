<template>
    <div
        class="search-container d-flex justify-content-center align-items-center"
    >
        <div
            class="d-flex flex-column justify-content-center align-items-center text-center search-gradient text-white p-5 w-100 h-100"
        >
            <h1 class="search-title">Vyhľadať v databáze obcí</h1>
            <input
                type="text"
                placeholder="Zadajte názov"
                v-model="searchQuery"
                class="search-input form-control"
                @keyup.enter="handleSearch"
            />
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref } from "vue";
import { router } from "@inertiajs/vue3";
import { route } from "ziggy-js";

const searchQuery = ref("");

const handleSearch = () => {
    router.visit(route("cities.search", { searchCity: searchQuery.value }));
};
</script>
