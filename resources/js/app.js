// require('./bootstrap');

import { createApp } from 'vue'
import MainInput from './components/input'
import vue from 'vue'


const app = createApp({})


app.component('search-page', MainInput)

app.mount('#app')
