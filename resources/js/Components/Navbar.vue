<template>
    <div class="border-bottom">
        <nav class="navbar d-flex flex-column navbar-expand-lg bg-white mx-13">
            <div class="container-fluid mb-3">
                <a class="navbar-brand" href="#">
                    <img
                        src="/images/garden-logo.png"
                        alt="Logo"
                        width="100%"
                        height="100%"
                    />
                </a>

                <div
                    class="collapse navbar-collapse"
                    id="navbarSupportedContent"
                >
                    <a class="contact fw-bold small ms-auto me-2" href="#">
                        Kontakty a čísla na oddelenia
                    </a>

                    <Dropdown />

                    <form class="d-flex" role="search">
                        <div class="input-group position-relative me-2">
                            <input
                                class="form-control"
                                type="search"
                                aria-label="Search"
                            />
                            <button
                                class="btn position-absolute top-0 end-0"
                                type="button"
                            >
                                <SearchIcon class="mb-1" />
                            </button>
                        </div>
                        <button
                            class="btn btn-signin px-4 text-white"
                            type="submit"
                        >
                            Prihlásenie
                        </button>
                    </form>
                </div>
            </div>

            <div class="me-auto">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">
                            O nás
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"> Zoznam miest </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"> Inšpekcia </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"> Kontakt </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</template>

<script setup lang="ts">
import SearchIcon from "../Icons/SearchIcon.vue";
import Dropdown from "./Dropdown.vue";
</script>
