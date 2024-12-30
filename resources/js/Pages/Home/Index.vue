<template>
    <div>
        <Navbar />

        <div
            class="search-container d-flex justify-content-center align-items-center"
        >
            <div
                class="d-flex flex-column justify-content-center align-items-center text-center search-gradient text-white p-5 w-100 h-100"
            >
                <h1 class="search-title">Vyhľadať v databáze obcí</h1>
                <input
                    type="text"
                    class="search-input form-control"
                    placeholder="Zadajte názov"
                />
            </div>
        </div>

        <Footer />
    </div>
</template>

<script setup lang="ts">
import Footer from "../../Components/Footer.vue";
import Navbar from "../../Components/Navbar.vue";
</script>
