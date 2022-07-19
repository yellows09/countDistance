// require('./bootstrap');

import { createApp } from 'vue'
import MainInput from './components/input'
import vue from 'vue'

import VueAutosuggest from "vue-autosuggest";

const app = createApp({})

app.use(VueAutosuggest);

app.component('search-page', MainInput)

app.mount('#app')
