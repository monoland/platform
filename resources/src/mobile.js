// Plugins
import { registerMobilePlugins } from "@plugins";

// Components
import App from "./App.vue";

// Composables
import { createApp } from "vue";

const app = createApp(App);

registerMobilePlugins(app);

app.mount("#monosoft");
