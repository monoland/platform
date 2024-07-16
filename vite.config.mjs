import Vue from "@vitejs/plugin-vue";
import Vuetify, { transformAssetUrls } from "vite-plugin-vuetify";
import ViteFonts from "unplugin-fonts/vite";
import Laravel from "laravel-vite-plugin";
import basicSsl from "@vitejs/plugin-basic-ssl";

import { defineConfig } from "vite";
import { fileURLToPath, URL } from "node:url";

export default defineConfig({
	root: "resources",

	// build: {
	// 	rollupOptions: {
	// 		input: {
	// 			app: fileURLToPath(new URL("./resources/index.html", import.meta.url)),

	// 			mobile: fileURLToPath(new URL("./resources/mobile.html", import.meta.url)),
	// 		},
	// 	},
	// },

	plugins: [
		basicSsl(),
		Laravel({
			input: ["src/mobile.js"],
			refresh: true,
		}),
		Vue({
			template: { transformAssetUrls },
		}),
		Vuetify({
			autoImport: true,
			styles: {
				configFile: "src/styles/settings.scss",
			},
		}),
		ViteFonts({
			google: {
				families: [
					"Madimi One",

					{
						name: "Open Sans",
						styles: "wght@100;300;400;500;700",
					},

					{
						name: "Ubuntu",
						styles: "wght@100;300;400;500;700",
					},
				],
			},
		}),
	],
	define: { "process.env": {} },
	resolve: {
		alias: {
			"@modules": fileURLToPath(new URL("./modules", import.meta.url)),
			"@components": fileURLToPath(new URL("./resources/src/components", import.meta.url)),
			"@plugins": fileURLToPath(new URL("./resources/src/plugins", import.meta.url)),
			"@pinia": fileURLToPath(new URL("./resources/src/plugins/pinia", import.meta.url)),
		},
		extensions: [".js", ".json", ".jsx", ".mjs", ".ts", ".tsx", ".vue"],
	},
	server: {
		host: "platform.test",
		https: true,
		port: 3000,
	},
});
