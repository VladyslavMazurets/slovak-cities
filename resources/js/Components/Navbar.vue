<template>
    <nav class="navbar d-flex flex-column navbar-expand-lg bg-white mx-13">
        <div class="container-fluid mb-2">
            <a class="navbar-brand" href="#">Navbar</a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex ms-auto" role="search">
                    <input
                        class="form-control me-2"
                        type="search"
                        placeholder="Search"
                        aria-label="Search"
                    />
                    <button class="btn btn-outline-success" type="submit">
                        Search
                    </button>
                </form>
            </div>
        </div>

        <div class="me-auto">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">
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
</template>

<script setup lang="ts"></script>
