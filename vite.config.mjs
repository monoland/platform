import Vue from "@vitejs/plugin-vue";
import Vuetify from "vite-plugin-vuetify";
import basicSsl from "@vitejs/plugin-basic-ssl";
import { defineConfig } from "vite";
import { fileURLToPath, URL } from "node:url";
import { transformAssetUrls } from "vite-plugin-vuetify";

export default defineConfig({
	root: "resources",

	build: {
		rollupOptions: {
			input: {
				app: fileURLToPath(new URL("./resources/index.html", import.meta.url)),

				mobile: fileURLToPath(new URL("./resources/mobile.html", import.meta.url)),
			},
		},
	},

	plugins: [
		basicSsl(),
		Vue({
			template: {
				transformAssetUrls,
			},
		}),
		Vuetify({
			autoImport: true,
		}),
	],
	define: { "process.env": {} },
	resolve: {
		alias: {
			"@components": fileURLToPath(new URL("./resources/src/components", import.meta.url)),
			"@modules": fileURLToPath(new URL("./modules", import.meta.url)),
			"@plugins": fileURLToPath(new URL("./resources/src/plugins", import.meta.url)),
			"@pinia": fileURLToPath(new URL("./resources/src/plugins/pinia", import.meta.url)),
			"@styles": fileURLToPath(new URL("./resources/src/styles", import.meta.url)),
		},
		extensions: [".js", ".json", ".jsx", ".mjs", ".ts", ".tsx", ".vue"],
	},
	server: {
		host: "hmr.platform.test",
		https: true,
		port: 3000,
	},
});
