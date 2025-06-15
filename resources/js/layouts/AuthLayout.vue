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
    <div>
        <slot />
    </div>
</template>
