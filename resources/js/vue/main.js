import { createApp } from 'vue'

import Oruga from '@oruga-ui/oruga-next'
import '@oruga-ui/oruga-next/dist/oruga.css'
import '@oruga-ui/oruga-next/dist/oruga-full.css'

import App from './App.vue'

const app = createApp(App).use(Oruga)

app.mount('#app')