import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
    base: "https://laravel-to-nhby7dlox-aoi3us-projects.vercel.app",
    server: {
        https: true, // HTTPSを使用するように設定
    },
});
