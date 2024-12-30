<template>
    <div
        class="d-flex flex-column justify-content-center align-items-center pt-4 pb-5"
    >
        <h1 class="fw-lighter mb-5">Detail obce</h1>

        <div
            class="city d-flex justify-content-center align-items-center border mb-5"
        >
            <div
                class="city-details d-flex flex-column justify-content-center gap-3"
            >
                <div class="d-flex justify-content-between">
                    <strong>Meno starostu:</strong>
                    <span>{{ city.mayor_name }}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <strong>Adresa obecného úradu:</strong>
                    <span>{{ city.city_hall_address }}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <strong>Telefón:</strong>
                    <span>{{ city.phone }}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <strong>Email:</strong>
                    <div class="d-flex flex-column">
                        <span v-for="email in emails" :key="email">
                            {{ email }}
                        </span>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <strong>Web: </strong>
                    <span>{{ city.website }}</span>
                </div>
            </div>
            <div
                class="city-cfa d-flex flex-column justify-content-center align-items-center gap-3"
            >
                <img
                    :src="city.coat_of_arms_path"
                    alt="CFA logo"
                    width="22%"
                    height="22%"
                />
                <h1 class="text-primary">{{ city.name }}</h1>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { computed } from "vue";
import { City } from "../../types";

interface Props {
    city: City;
}

const props = defineProps<Props>();
console.log("🚀 ~ props:", props.city);

const emails = computed(() => {
    return props.city.email.split(" ");
});
</script>
