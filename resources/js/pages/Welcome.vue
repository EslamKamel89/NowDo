<script setup lang="ts">
import { AppPageProps } from '@/types';
import { Head, usePage } from '@inertiajs/vue3';
import { useDark, useToggle } from '@vueuse/core';
import { onMounted } from 'vue';

const isDark = useDark();
const toggleDark = useToggle(isDark);
onMounted(() => {
    toggleDark(false);
});
const page = usePage<AppPageProps>();
</script>

<template>
    <Head title="Welcome">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>
    <div class="flex items-center justify-center space-x-2">
        <div>Hello</div>
        <div v-if="page.props.auth.user">{{ page.props.auth.user.name }}</div>
    </div>
</template>
