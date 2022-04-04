<template>
    <div>
        <button @click="$emit('prevPage')" class="py-1 px-2 bg-slate-100 rounded-md border-slate-300 border-2 active:translate-y-0.5 float-left">Previous</button>
        <button @click="$emit('nextPage')" class="py-1 px-2 bg-slate-100 rounded-md border-slate-300 border-2 active:translate-y-0.5 float-right">Next</button>
    </div>
</template>

<script setup>
</script>