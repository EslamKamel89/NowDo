<script setup lang="ts">
import { useDark, useToggle } from '@vueuse/core';
import { onMounted } from 'vue';

const isDark = useDark();
const toggleDark = useToggle(isDark);
onMounted(() => {
    toggleDark(false);
});
</script>
<template>
    <div
        class="flex min-h-screen items-center justify-center bg-gradient-to-br from-indigo-100 via-purple-100 to-pink-100 px-4 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900"
    >
        <slot />
    </div>
</template>
