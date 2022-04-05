<template>
    <div>
        <Pokemon v-for="mon in currPageData" :id="mon.id" :name="mon.name" :spriteUrl="mon.spriteUrl"/>
        <!-- <div v-for="(mon, index) in currPageData">
            <p class="text-xl font-light text-center text-white">
                {{ mon.name.replace(/^\w/, (c) => c.toUpperCase()) }}
                #{{ mon.id }}
            </p>
            <div class="w-fit h-fit bg-slate-100 rounded-full">
                <img
                    :src="mon.spriteUrl"
                    width="200"
                    class="hover:cursor-pointer rounded-full"
                    @click="toggleHidden(index)"
                />
                <div v-if="notHidden.value[index]" class="flex flex-col justify-center items-center">
                    
                    <UpdateForm :id="mon.id" :name="mon.name" :spriteUrl="mon.spriteUrl"/>

                    <button
                        @click="deletePost(mon.id)"
                        class="bg-slate-100 rounded-md border-slate-300 border-2 active:translate-y-0.5 w-fit mb-4"
                    >Delete</button>
                </div>
            </div>
        </div> -->
    </div>
</template>

<script setup>
import {ref, onMounted} from 'vue';
import UpdateForm from './UpdateForm.vue';
import Pokemon from './Pokemon.vue';

const props = defineProps(['currPageData']);

//defined emit for use within deletePost function
const emit = defineEmits(["reload"]);

const notHidden = ref([]);

function toggleHidden(index) {
    notHidden.value[index] = notHidden.value[index];
}

function deletePost(id) {
    if (confirm("Are you sure you wish to delete record " + id + " permantently?")) {
        fetch('api/pokemon/' + id, { method: 'DELETE' });

        //emit to parent to trigger a reload of the base data, as one has now been removed, and to refresh the view
        emit("reload");
    }
}

// onMounted(() => {
//     props.currPageData.forEach(mon => {
//         hidden.value.push(false);
//     });
//     console.log(hidden.value[0]);
// });
</script>