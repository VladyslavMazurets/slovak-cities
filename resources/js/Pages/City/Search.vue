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

                <div
                    class="autocomplete-container d-flex flex-column align-items-center w-100"
                >
                    <input
                        type="text"
                        placeholder="Zadajte názov"
                        v-model="newSearchQuery"
                        class="search-input form-control"
                        @keyup="autoComplete"
                        @keyup.enter="handleSearch"
                    />

                    <div
                        v-if="newSearchQuery.length > 0"
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
                            <Link
                                :href="route('city.index', { city: city.id })"
                                as="link"
                                class="btn btn-primary"
                            >
                                Detail
                            </Link>
                        </div>
                    </div>

                    <button
                        v-if="isMore"
                        @click="loadMore"
                        class="btn btn-success mt-4"
                    >
                        Show more
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref } from "vue";
import { City } from "../../types";
import { router, Link } from "@inertiajs/vue3";
import { route } from "ziggy-js";
import axios from "axios";

interface Props {
    cities: City[];
    searchQuery: string;
    isMore: boolean;
}

const props = defineProps<Props>();
const page = ref(2);

const newSearchQuery = ref("");
const autoCompleteItems = ref<City[]>([]);

let timer: ReturnType<typeof setTimeout>;

const autoComplete = () => {
    clearTimeout(timer);

    timer = setTimeout(() => {
        if (newSearchQuery.value.length > 0) {
            axios
                .get(
                    route("cities.autocomplete", {
                        searchCity: newSearchQuery.value,
                    })
                )
                .then((response) => {
                    autoCompleteItems.value = response.data;
                });
        }
    }, 500);
};

const handleSearch = () => {
    router.visit(route("cities.search", { searchCity: newSearchQuery.value }));
};

const loadMore = () => {
    router.reload({
        only: ["cities", "isMore"],
        data: {
            searchCity: props.searchQuery,
            page: page.value,
        },

        onSuccess: () => {
            page.value++;
        },
    });
};
</script>
