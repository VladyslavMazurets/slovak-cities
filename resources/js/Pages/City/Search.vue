<template>
    <div
        class="search-result-container d-flex justify-content-center align-items-center"
    >
        <div
            class="d-flex flex-column justify-content-center align-items-center text-center search-gradient text-white pt-5 pb-5 w-100 h-100"
        >
            <div class="d-flex flex-column align-items-center w-75 mb-5">
                <h1 class="search-result-title">
                    Hľadaný obec: {{ searchQuery }}
                </h1>
                <input
                    type="text"
                    placeholder="Zadajte názov"
                    v-model="newSearchQuery"
                    class="search-input form-control"
                    @keyup.enter="handleSearch"
                />
            </div>

            <div class="w-50 bg-white p-5 mb-5">
                <h2 class="fw-light text-black mb-5">Výsledky vyhľadávania</h2>

                <div class="d-flex flex-column">
                    <div
                        v-for="city in cities"
                        :key="city.id"
                        class="d-flex justify-content-between align-items-center py-2"
                    >
                        <div>
                            <h5 class="text-black">{{ city.name }}</h5>
                        </div>
                        <div>
                            <button class="btn btn-primary">Detail</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref } from "vue";
import { City } from "../../types";
import { router } from "@inertiajs/vue3";
import { route } from "ziggy-js";

interface Props {
    cities: City[];
    searchQuery: string;
}

const props = defineProps<Props>();
console.log("🚀 ~ props:", props.searchQuery);
console.log("🚀 ~ props:", props.cities);

const newSearchQuery = ref("");

const handleSearch = () => {
    router.visit(route("cities.search", { searchCity: newSearchQuery.value }));
};
</script>
