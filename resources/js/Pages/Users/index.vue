<script setup>
import { PencilIcon, TrashIcon, MagnifyingGlassIcon } from '@heroicons/vue/24/outline';
import DashboardLayout from '../../Layouts/DashboardLayout.vue';
import { Link, router } from '@inertiajs/vue3';
import { ref, watch } from 'vue';
import ConfirmModal from '../../Components/ConfirmModal.vue';
import debounce from 'lodash/debounce';

const props = defineProps({
    users: Object,
    filters: Object,
});

const search = ref(props.filters?.search ?? "");

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

watch(
    search,
    debounce((value) => {
        router.get(
            route('users.index'),
            { search: value },
            {
                preserveState: true,
                replace: true,
            }
        );
    }, 500)
);

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
            <div class="flex items-center justify-between p-5 border-b">
                <div class="relative w-80">
                <MagnifyingGlassIcon
                    class="absolute left-3 top-3.5 w-5 h-5 text-slate-400"
                />

                <input
                    v-model="search"
                    type="text"
                    placeholder="Search user..."
                    class="w-full pl-10 pr-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
                />
            </div>
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
                            <th class="px-6 py-4">Role</th>
                            <th class="px-6 py-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Perbaikan v-for untuk membaca property .data dari pagination -->
                        <tr v-for="(user, index) in users.data" :key="user.id" class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">{{ index + 1 }}</td>
                            <td class="px-6 py-4">{{ user.name }}</td>
                            <td class="px-6 py-4">{{ user.email }}</td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 rounded-2xl text-xs font-semibold"
                                    :class="
                                        user.roles[0]?.name === 'admin'
                                            ? 'bg-blue-100 text-blue-700'
                                            : 'bg-green-100 text-green-700'
                                    "
                                >
                                    {{ user.roles[0]?.name }}
                                </span>
                            </td>
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

            <div v-if="users.links && users.links.length > 3" class="flex items-center justify-center p-5 border-t">
                <div class="flex flex-wrap justify-center gap-1">
                    <template v-for="(link, pIndex) in users.links" :key="pIndex">
                        <!-- Tombol Aktif / Bisa Diklik -->
                        <Link
                            v-if="link.url"
                            :href="link.url"
                            v-html="link.label"
                            class="px-4 py-2 text-sm border rounded-lg transition-colors"
                            :class="link.active
                                ? 'bg-blue-600 text-white border-blue-600'
                                : 'bg-white text-slate-600 border-slate-300 hover:bg-slate-50'"
                        />

                        <!-- Tombol Disabled (Prev di awal / Next di akhir) -->
                        <span
                            v-else
                            v-html="link.label"
                            class="px-4 py-2 text-sm text-slate-400 bg-gray-100 border border-slate-200 rounded-lg cursor-not-allowed"
                        ></span>
                    </template>
                </div>
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
