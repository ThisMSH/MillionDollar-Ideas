import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
import './axios'
import router from './router'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faComment } from '@fortawesome/free-solid-svg-icons'
import { faThumbsUp } from '@fortawesome/free-solid-svg-icons'
import { library } from '@fortawesome/fontawesome-svg-core'
import './assets/main.css'

library.add(faComment, faThumbsUp);
const pinia = createPinia();
const app = createApp(App);

app.use(pinia);
app.use(router);
app.component('font-awesome-icon', FontAwesomeIcon);
app.mount('#app');
