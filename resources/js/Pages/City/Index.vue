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
                <div class="row align-items-start">
                    <div class="col-6 d-flex flex-column gap-3">
                        <strong>Meno starostu:</strong>
                        <strong>Adresa obecného úradu:</strong>
                        <strong>Telefón:</strong>
                        <template v-for="(email, index) in emails">
                            <strong v-if="index === 0">Email:</strong>
                            <span v-else>&nbsp;</span>
                        </template>
                        <strong>Web:</strong>
                    </div>

                    <div class="col-6 d-flex flex-column gap-3">
                        <span>{{ city.mayor_name }}</span>
                        <span>{{ city.city_hall_address }}</span>
                        <span>{{ city.phone }}</span>
                        <template v-for="email in emails">
                            <span>{{ email }}</span>
                        </template>
                        <span>{{ city.website }}</span>
                    </div>
                </div>
            </div>

            <div
                class="city-cfa d-flex flex-column justify-content-center align-items-center gap-3"
            >
                <img
                    :src="city.coat_of_arms_path"
                    alt="CFA logo"
                    width="20%"
                    height="30%"
                />
                <h1 class="city-name">{{ city.name }}</h1>
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

const emails = computed(() => {
    return props.city.email.split(" ");
});
</script>
