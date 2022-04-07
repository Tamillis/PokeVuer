<template >
    <div class="flex-col">
        <p class="text-xl font-light text-center text-white">
            {{ name.replace(/^\w/, (c) => c.toUpperCase()) }}
            #{{ id }}
        </p>
        <div class="w-fit h-fit bg-slate-100 rounded-full">
            <img
                :src="spriteUrl"
                width="200"
                class="hover:cursor-pointer rounded-full"
                @click="() => visible = !visible"
            />
            <div v-if="visible" class="flex flex-col justify-center items-center">
                <UpdateForm :key="id" :id="id" :name="name" :spriteUrl="spriteUrl" />

                <button
                    @click="deletePost(id)"
                    class="bg-slate-100 rounded-md border-slate-300 border-2 active:translate-y-0.5 w-fit mb-4"
                >Delete</button>
            </div>
        </div>
    </div>
</template>

<script setup>
import UpdateForm from './UpdateForm.vue';
import { ref } from 'vue';
defineProps(["id", "name", "spriteUrl"]);
const emit = defineEmits(["reload"]);

const visible = ref(false);

function deletePost(id) {
    if (confirm("Are you sure you wish to delete record " + id + " permantently?")) {
        //call the API's delete path
        fetch('api/pokemon/' + id, { method: 'DELETE' });

        //to avoid leaving the UpdateForm open with old data, set it to not visible
        visible.value = false;
        
        //emit to parent to trigger a reload of the base data, as one has now been removed, and to refresh the view
        emit("reload");
    }
}
</script>