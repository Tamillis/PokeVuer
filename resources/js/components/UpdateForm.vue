<template>
  <form
    @submit.prevent="submitUpdate(form)"
    :action="'api/pokemon/' + id"
    method="POST"
    class="
      text-slate-600 text-sm
      flex flex-col
      justify-center
      items-center
      mb-1
    "
  >
    <input type="hidden" name="_method" value="PUT" />
    <label for="name">New Name</label>
    <input
      type="text"
      name="name"
      id="name"
      v-model="name"
      :placeholder="name"
      :class="{ 'border-red-500': nameErr || urlErr }"
    />
    <p v-if="nameErr" class="text-red-500 text-sm font-light">
      Alphabetical characters only
    </p>
    <label for="spriteUrl">New Sprite URL</label>
    <input
      type="text"
      name="spriteUrl"
      id="spriteUrl"
      v-model="spriteUrl"
      :placeholder="spriteUrl"
      :class="{ 'border-red-500': nameErr || urlErr }"
    />
    <p v-if="urlErr" class="text-red-500 text-sm font-light">Valid URL only</p>
    <button
      type="submit"
      :disabled="nameErr || urlErr"
      class="
        bg-slate-100
        rounded-md
        border-slate-300 border-2
        active:translate-y-0.5
        w-fit
        my-4
        px-1
        text-black
      "
    >
      Update
    </button>
  </form>
</template>

<script setup>
import { ref, onUpdated } from "vue";
const props = defineProps(["id", "name", "spriteUrl"]);

const id = ref(props.id);
const name = ref(props.name);
const spriteUrl = ref(props.spriteUrl);
const nameErr = ref(false);
const urlErr = ref(false);

function submitUpdate(form) {
  //fetch("api/pokemon/" + props.id, { __method: "PUT" });

  console.log("Submitted ");
  console.log(form);
}

onUpdated(() => {
  if (!containsOnlyLetters(name.value)) nameErr.value = true;
  else nameErr.value = false;

  if (!isValidUrl(spriteUrl.value)) urlErr.value = true;
  else urlErr.value = false;
});

function containsOnlyLetters(str) {
  return /^[A-Za-z]+$/.test(str);
}

function isValidUrl(string) {
  let url_string;
  try {
    url_string = new URL(string);
  } catch (_) {
    return false;
  }

  return url_string.protocol === "http:" || url_string.protocol === "https:";
}
</script>