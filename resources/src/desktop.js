// Plugins
import { registerDesktopPlugins } from "@plugins";

// Components
import App from "./App.vue";

// Composables
import { createApp } from "vue";

const app = createApp(App);

registerDesktopPlugins(app);

app.mount("#monosoft");
