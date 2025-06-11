<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { useDark, useToggle } from '@vueuse/core';
import { onMounted } from 'vue';

const isDark = useDark();
const toggleDark = useToggle(isDark);
onMounted(() => {
    toggleDark(false);
});
</script>

<template>
    <Head title="Welcome">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>
    <div>Hello world</div>
</template>
