<template>
    <form
        
        :action="'api/pokemon/' + props.id"
        method="POST"
        class="text-slate-600 text-sm flex flex-col justify-center items-center mb-1"
    >
        <input type="hidden" name="_method" value="PUT" />
        <label for="name">New Name</label>
        <input type="text" name="name" :id="id.value + '_newName'" v-model="name" :placeholder="name" />
        <label for="spriteUrl">New Sprite URL</label>
        <input
            type="text"
            name="spriteUrl"
            :id="id.value + '_newSpriteUrl'"
            v-model="spriteUrl"
            :placeholder="spriteUrl"
        />
        <button type="submit"
            class="bg-slate-100 rounded-md border-slate-300 border-2 active:translate-y-0.5 w-fit my-4 px-1 text-black"
        >Update</button>
    </form>
</template>

<script setup>
import { ref } from 'vue';
const props = defineProps(['id', 'name', 'spriteUrl']);

const id = ref(props.id);
const name = ref(props.name);
const spriteUrl = ref(props.spriteUrl);
</script>