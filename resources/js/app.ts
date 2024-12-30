import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import "bootstrap/dist/css/bootstrap.min.css";
import "../scss/app.scss";
import "bootstrap";
import MainLayout from "./Layouts/Main.vue";

createInertiaApp({
    resolve: async (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue");
        const page = (await pages[`./Pages/${name}.vue`]()).default;

        page.layout = MainLayout;

        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el);
    },
});
