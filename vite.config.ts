import { defineConfig } from "vite";
import hybridly from "hybridly/vite";

export default defineConfig({
  resolve: {
    alias: {
      '@': '/resources',
    },
  },
    plugins: [
        hybridly({
            laravel: {
                valetTls: true,
            },
        }),
    ],
});
