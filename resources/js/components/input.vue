<template>
    <div class="result" v-if="distance">
        Расстояние от {{ title }} до Москва, Проспект Вернадского, 105. равно {{ distance }} километров <br>
        ---------------------------------------------------------------------------------------------------------------------------------
    </div>
    <div class="form__group field">
        <input
            type="text"
            @input="suggest"
            class="form__field"
            placeholder="Address"
            name="name"
            id='name' required/>
        <label for="name" class="form__label">Address</label>
    </div>
    <div class="suggestions" v-for="suggestions in suggestPlace">
        <ul>
            <li class="list-suggest" @click="suggestValue=suggestions.value">{{ suggestions.value }}</li>
        </ul>
    </div>
    <button @click="counting" class="gradient-button">Рассчитать</button>
</template>

<script>
const axios = require('axios');
export default {
    data() {
        return {
            suggestValue: '',
            title: '',
            suggestPlace: [],
            result: '',
            geo_lat: 0,
            geo_lon: 0,
            distance: 0
        }
    },
    methods: {
        suggest(event) {
            this.title = event.target.value
            axios.post('https://suggestions.dadata.ru/suggestions/api/4_1/rs/suggest/address', {
                query: this.title,
                count: 3
            }, {
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    "Authorization": "Token " + "896fe98d18cb1019fae8d747120b760b089d092d"
                },
            }).then(response => {
                this.geo_lat = response.data.suggestions[0].data.geo_lat
                this.geo_lon = response.data.suggestions[0].data.geo_lon
                console.log(response.data.suggestions[0].data.geo_lat)
                console.log(response.data.suggestions[0].data.geo_lon)
                this.suggestPlace = response.data.suggestions
            })
        },
        counting() {
            axios.get('/api/calculate/' + this.geo_lat + '/' + this.geo_lon)
                .then(response => {
                    console.log(response)
                    this.distance = response.data
                })
        }
    },
}
</script>

<style scoped>

</style>
