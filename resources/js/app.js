import './bootstrap';


import { createApp } from "vue";
import App from "./components/dashboard.vue";
import Router from "./router/index";


const app = createApp(App);
app.use(Router)
app.mount('#app');
