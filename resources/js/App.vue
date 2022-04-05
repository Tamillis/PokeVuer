<template>
    <TopBar />

    <!-- Pagination handling component -->

    <Paginator @nextPage="nextPage" @prevPage="prevPage" />

    <!-- Main Pokemon Display -->
    <div v-if="dataReady" class="flex flex-col sm:flex-row flex-wrap justify-center items-center my-2">
        <Pokemon v-for="mon in currPageData" :id="mon.id" :name="mon.name" :spriteUrl="mon.spriteUrl" @reload="loadData"/>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import TopBar from './components/TopBar.vue'
import Paginator from './components/Paginator.vue'
import Pokemon from './components/Pokemon.vue'

const pageOffset = ref(0);  //standard pagination terminology
const pageLimit = ref(15);

const pokemonData = ref({});    //all of the data from the Laravel database
const currPageData = ref({});   //the current page data, the sliced array of the main pokemondata, sliced according to pageOffset and pageLimit
const dataReady = ref(false);   //a simple flag to prevent rendering of elements whose data hasn't loaded yet

function loadData() {
    //simple fetch functionality used since the API being interacted with is our own Laravel based API
    fetch('/api/pokemon', { method: 'GET' })
        .then(response => response.json())
        .then(data => {
            pokemonData.value = data;

            currPageData.value = data.slice(pageOffset.value, pageLimit.value);

            dataReady.value = true;
        })
        .catch(err => {
            console.log(err);
        });
}

function nextPage() {
    //increments the page index by the page limit value
    pageOffset.value += pageLimit.value;
    if (pageOffset.value >= pokemonData.value.length) pageOffset.value = 0;

    calcCurrPageData();
}

function prevPage() {
    //decrements the page index by the page limit value
    pageOffset.value -= pageLimit.value;
    if (pageOffset.value < 0) pageOffset.value = pokemonData.value.length - pageLimit.value;

    calcCurrPageData();
}

function calcCurrPageData() {
    //small helper function to avoid repitition - DRY
    let newData = pokemonData.value.slice(pageOffset.value, pageOffset.value + pageLimit.value)
    currPageData.value = newData;
}

onMounted(() => {
    loadData();
})
</script>

<style></style>