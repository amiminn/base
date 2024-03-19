import "./bootstrap";
import { createApp, h } from "vue";
import { createInertiaApp, Link, router } from "@inertiajs/vue3";

// window
window.router = router;

createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("./pages/**/*.vue", { eager: true });
        return pages[`./pages/${name}.vue`];
    },
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) });

        app.component("Link", Link);

        app.config.globalProperties.$api = {
            auth: {
                login: "/login",
            },
        };

        app.config.globalProperties.$filters = {
            status(data = null) {
                if (data == 1) return "Aktif";
                if (data == 0) return "Non-Aktif";
            },
        };
        app.use(plugin);
        app.mount(el);
    },
});
