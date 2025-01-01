<template>
    <div
        class="search-container d-flex justify-content-center align-items-center"
    >
        <div
            class="d-flex flex-column justify-content-center align-items-center text-center search-gradient text-white p-5 w-100 h-100"
        >
            <h1 class="search-title">Vyhľadať v databáze obcí</h1>

            <div
                class="autocomplete-container d-flex flex-column align-items-center w-100"
            >
                <input
                    type="text"
                    placeholder="Zadajte názov"
                    v-model="searchQuery"
                    class="search-input form-control"
                    @keyup="autoComplete"
                    @keyup.enter="handleSearch"
                />

                <div
                    v-if="searchQuery.length > 0"
                    class="search-autocomplete d-flex flex-column text-start bg-white"
                >
                    <Link
                        v-for="city in autoCompleteItems"
                        :href="
                            route('city.index', {
                                city: city.id,
                            })
                        "
                        class="autocomplete-link w-100"
                    >
                        {{ city.name }}
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref } from "vue";
import { Link, router } from "@inertiajs/vue3";
import { route } from "ziggy-js";
import { City } from "../../types";
import axios from "axios";

const searchQuery = ref("");
const autoCompleteItems = ref<City[]>([]);

let timer: ReturnType<typeof setTimeout>;

const autoComplete = () => {
    clearTimeout(timer);

    timer = setTimeout(() => {
        if (searchQuery.value.length > 0) {
            axios
                .get(
                    route("cities.autocomplete", {
                        searchCity: searchQuery.value,
                    })
                )
                .then((response) => {
                    autoCompleteItems.value = response.data;
                });
        }
    }, 500);
};

const handleSearch = () => {
    router.visit(route("cities.search", { searchCity: searchQuery.value }));
};
</script>
