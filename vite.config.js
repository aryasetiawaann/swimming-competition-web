import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/css/adm-dashboard.css",
                "resources/css/user-dashboard.css",
                "resources/css/auth.css",
                "resources/js/app.js",
            ],
            refresh: true,
        }),
    ],
});
