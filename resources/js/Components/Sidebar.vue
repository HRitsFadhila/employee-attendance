<script setup>
    import { HomeIcon, UserIcon } from '@heroicons/vue/24/outline';
    import { Link } from '@inertiajs/vue3';
</script>

<template>
    <input type="checkbox" id="menu-toggle" class="hidden peer">
    <div class="flex-col w-64 bg-green-800 transition-all duration-300 ease-in-out peer-checked:-ml-64">
        <div class="flex flex-col flex-1 overflow-y-auto">
            <nav
                class="flex flex-col flex-1 overflow-y-auto bg-gradient-to-b from-emerald-900 to-green-800 px-2 py-4 gap-5">
                <div class="h-20 flex items-center px-6 border-b border-green-800">
                    <img
                        :src="'/img/Logo.png'"
                        alt="logo"
                        class="h-9 w-auto object-contain"
                    />
                    <div class="ml-3">
                        <h1 class="text-white font-bold text-lg">
                            Absensi Pegawai
                        </h1>
                        <p class="text-xs text-slate-400">
                            Politeknik Elektronika Negeri Surabaya
                        </p>
                    </div>
                </div>
                <div class="flex flex-col flex-1 gap-3">
                    <Link href="/dashboard"
                        class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-400 hover:bg-opacity-25 rounded-2xl">
                        <HomeIcon class="w-6 h-6 mr-1"/>
                        Home
                    </Link>
                    <Link href="/users"
                        class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-400 hover:bg-opacity-25 rounded-2xl">
                        <UserIcon class="w-6 h-6 mr-1"/>
                        Users
                    </Link>
                </div>
            </nav>
        </div>
    </div>
</template>
