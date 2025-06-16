<script setup lang="ts">
const props = defineProps<{
    error?: string | null;
}>();
</script>
<template>
    <div v-if="error" class="px-3 text-xs font-thin text-red-500">{{ error }}</div>
</template>
