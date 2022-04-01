import { createApp } from 'vue'

import Oruga from '@oruga-ui/oruga-next'
import '@oruga-ui/oruga-next/dist/oruga.css'
import '@oruga-ui/oruga-next/dist/oruga-full.css'
import '@oruga-ui/oruga-next/dist/oruga-full-vars.css'

import '@mdi/font/css/materialdesignicons.css'

//import '../../css/vue.css'

import router from "./router"

import axios from 'axios'

import App from './App.vue'

const app = createApp(App).use(Oruga).use(router)
app.config.globalProperties.$axios = axios;
window.axios = axios

app.mount('#app')