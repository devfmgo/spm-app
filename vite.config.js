import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/flowbite.js",
                "resources/js/jquery-3.6.4.js",
                "resources/js/custom.js",
            ],
            refresh: true,
        }),
    ],
});
