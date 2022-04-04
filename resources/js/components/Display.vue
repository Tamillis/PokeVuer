<template>
    <div class="flex flex-col sm:flex-row flex-wrap justify-center items-center my-2">
        <div v-for="mon in currPageData">
            <p class="text-xl font-light text-center text-white">
                {{ mon.name.replace(/^\w/, (c) => c.toUpperCase()) }}
                #{{ mon.id }}
            </p>
            <div class="w-fit h-fit bg-slate-100 rounded-full">
                <img
                    :src="mon.spriteUrl"
                    width="200"
                    class="hover:cursor-pointer rounded-full"
                    @click="toggleElHidden(mon.id + '_form')"
                />
                <div :id="mon.id + '_form'" class="hidden">
                    <!-- I don't know why the following component keeps old data after paging... -->
                    <UpdateForm :id="mon.id" :name="mon.name" :spriteUrl="mon.spriteUrl"/>

                    <button
                        @click="deletePost(mon.id)"
                        class="bg-slate-100 rounded-md border-slate-300 border-2 active:translate-y-0.5 w-fit mb-4"
                    >Delete</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import UpdateForm from './UpdateForm.vue';

defineProps(['currPageData']);

//defined emit for use within deletePost function
const emit = defineEmits(["reload"]);

function toggleElHidden(id) {
    //passed in id is already formatted for the relevant element
    let el = document.getElementById(id);
    //for now the style to switch between are hard-coded, but could easily be defined as a variable
    (el.className === "hidden") ? el.className = "flex flex-col justify-center items-center" : el.className = "hidden";
}

function deletePost(id) {
    if (confirm("Are you sure you wish to delete record " + id + " permantently?")) {
        fetch('api/pokemon/' + id, { method: 'DELETE' });

        //emit to parent to trigger a reload of the base data, as one has now been removed, and to refresh the view
        emit("reload");
    }
}
</script>