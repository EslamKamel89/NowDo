<script setup lang="ts">
import SessionMsg from '@/components/Shared/SessionMsg.vue';
import ValidationError from '@/components/Shared/ValidationError.vue';
import Button from '@/components/ui/button/Button.vue';
import Card from '@/components/ui/card/Card.vue';
import Input from '@/components/ui/input/Input.vue';
import Label from '@/components/ui/label/Label.vue';
import AuthLayout from '@/layouts/AuthLayout.vue';
import { Link, useForm } from '@inertiajs/vue3';
const form = useForm({
    email: '',
    password: '',
});
const submit = () => {
    form.post(route('login'));
};
</script>
<template>
    <AuthLayout>
        <Card class="w-full max-w-md p-5">
            <h1 class="mb-6 text-center text-2xl font-bold text-gray-800 dark:text-white">Sign In to NoDow</h1>
            <SessionMsg />
            <form @submit.prevent="submit" class="space-y-4">
                <div class="space-y-2">
                    <Label for="email">Email</Label>
                    <Input v-model="form.email" id="email" type="email" placeholder="you@example.com" />
                    <ValidationError :error="form.errors.email" />
                </div>
                <div class="space-y-2">
                    <Label for="password">Password</Label>
                    <Input v-model="form.password" id="password" type="password" placeholder="••••••••" />
                    <ValidationError :error="form.errors.password" />
                </div>
                <Button :disabled="form.processing" class="mt-4 w-full">Sign In</Button>
            </form>
            <p class="mt-4 text-center text-sm text-gray-600 dark:text-gray-400">
                Don't have an account?
                <Link href="/auth/register" class="text-blue-600 hover:underline">Register</Link>
            </p>
        </Card>
    </AuthLayout>
</template>
