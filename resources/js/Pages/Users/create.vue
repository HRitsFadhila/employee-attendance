<script setup>
import DashboardLayout from '../../Layouts/DashboardLayout.vue';
import { router, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
});

const cancel = () => {
    router.visit('/users')
}

const submit = () => {
    form.post(route("users.store"))
}
</script>

<template>
    <DashboardLayout>
        <div class="mb-6 px-4">
            <h1 class="text-2xl font-bold text-slate-800">Create User</h1>
            <p class="text-slate-500 mt-1">Create admin account</p>
        </div>
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200">
            <div class="px-6 py-5 border-b border-slate-300">
                <h2 class="font-semibold text-lg">User Information</h2>
            </div>

            <form
                @submit.prevent="submit"
                class="p-6 space-y-6"
            >
                <div class="flex flex-col gap-2">
                    <label class="text-sm font-medium text-slate-700">
                        Full Name <span class="text-red-500">*</span>
                    </label>
                    <input
                        v-model="form.name"
                        type="text"
                        placeholder="Your name"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none transition-all"
                        required
                    />
                    <div v-if="form.errors.name" class="text-red-500 text-xs mt-1">{{ form.errors.name }}</div>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-slate-700">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <input
                        v-model="form.email"
                        type="email"
                        placeholder="your@email.com"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none transition-all"
                        required
                    />
                    <div v-if="form.errors.email" class="text-red-500 text-xs mt-1">{{ form.errors.email }}</div>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-slate-700">
                        Password <span class="text-red-500">*</span>
                    </label>
                    <input
                        v-model="form.password"
                        type="password"
                        placeholder="••••••••"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none transition-all"
                        required
                    />
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-slate-700">
                        Confirm Password <span class="text-red-500">*</span>
                    </label>
                    <input
                        v-model="form.password_confirmation"
                        type="password"
                        placeholder="••••••••"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none transition-all"
                        required
                    />
                    <div v-if="form.errors.password" class="text-red-500 text-xs mt-1">{{ form.errors.password }}</div>
                </div>

                <div class="flex justify-end gap-3 pt-4 border-t border-slate-300">

                    <button
                        type="button"
                        @click="cancel"
                        class="px-5 py-3 rounded-xl border border-slate-300 hover:bg-slate-100"
                    >
                        Cancel
                    </button>

                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="px-6 py-3 rounded-xl bg-orange-600 text-white hover:bg-orange-700 transition disabled:opacity-50"
                    >
                        {{ form.processing ? "Saving ...": "Save user" }}
                    </button>

                </div>
            </form>
        </div>
    </DashboardLayout>
</template>
