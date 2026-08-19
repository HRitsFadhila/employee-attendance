<script setup>
import { PencilIcon, TrashIcon } from '@heroicons/vue/24/outline';
import DashboardLayout from '../../Layouts/DashboardLayout.vue';
import { Link, router } from '@inertiajs/vue3';
import { ref } from 'vue';
import ConfirmModal from '../../Components/ConfirmModal.vue';

defineProps({
    users: Array,
});

const showDeleteModal = ref(false);
const selectedUser = ref(null);

const confirmDelete = (user) => {
    selectedUser.value = user;
    showDeleteModal.value = true;
};

const closeModal = () => {
    showDeleteModal.value = false;
    selectedUser.value = null;
};

const deleteUser = () => {
    router.delete(route("users.destroy", selectedUser.value.id), {
        preserveScroll: true,
        onSuccess: () => {
            closeModal();
        },
    });
};

</script>

<template>
    <DashboardLayout>
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-3xl font-bold text-slate-800">Data User</h1>
                <p class="text-slate-500 mt-1">Kelola akun admin</p>
            </div>
            <div>
            </div>
        </div>
        <div class="bg-white rounded-2xl">
            <div class="flex justify-end p-4">
                <Link href="/users/create" class="bg-orange-600 text-white px-4 py-2 rounded-lg">
                    Tambah User
                </Link>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-50">
                        <tr class="text-slate-600 text-left">
                            <th class="px-6 py-4">No</th>
                            <th class="px-6 py-4">Nama</th>
                            <th class="px-6 py-4">Email</th>
                            <th class="px-6 py-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(user, index) in users" :key="user.id" class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">{{ index + 1 }}</td>
                            <td class="px-6 py-4">{{ user.name }}</td>
                            <td class="px-6 py-4">{{ user.email }}</td>
                            <td class="px-6 py-4">
                                <div class="flex justify-center gap-2">
                                    <Link
                                        :href="route('users.edit', user.id)"
                                        class="p-2 rounded-lg bg-yellow-100 text-yellow-600 hover:bg-yellow-200">
                                        <PencilIcon class="w-4 h-4"/>
                                    </Link>
                                    <button
                                        @click="confirmDelete(user)"
                                        class="p-2 rounded-lg bg-red-100 text-red-600 hover:bg-red-200">
                                        <TrashIcon class="w-4 h-4"/>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </DashboardLayout>
    <ConfirmModal
        :show="showDeleteModal"
        :message="`Are you sure want deleted ${selectedUser?.name}?`"
        @close="closeModal"
        @confirm="deleteUser"
    />
</template>
