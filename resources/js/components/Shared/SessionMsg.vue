<script setup lang="ts">
import { AppPageProps } from '@/types';
import { usePage } from '@inertiajs/vue3';

const page = usePage<AppPageProps>();
</script>
<template>
    <div v-if="page.props.session.error">
        <div class="mb-4 rounded-lg bg-red-50 p-4 text-sm text-red-800 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">Error!</span> {{ page.props.session.error }}.
        </div>
        <div
            v-if="page.props.session.success"
            class="mb-4 rounded-lg bg-green-50 p-4 text-sm text-green-800 dark:bg-gray-800 dark:text-green-400"
            role="alert"
        >
            <span class="font-medium">Success!</span> {{ page.props.session.success }}
        </div>
    </div>
</template>
