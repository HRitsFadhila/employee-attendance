<script setup>
import { HomeIcon, UserIcon } from '@heroicons/vue/24/outline';
</script>

<template>
    <input type="checkbox" id="menu-toggle" class="hidden peer">
    <div class="flex-col w-64 bg-green-800 transition-all duration-300 ease-in-out peer-checked:-ml-64">
        <div class="flex flex-col flex-1 overflow-y-auto">
            <nav
                class="flex flex-col flex-1 overflow-y-auto bg-gradient-to-b from-emerald-900 to-green-800 px-2 py-4 gap-10">
                <div class="h-6 p-4">
                    disini gambar logo
                </div>
                <div class="flex flex-col flex-1 gap-3">
                    <a href="#"
                        class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-400 hover:bg-opacity-25 rounded-2xl">
                        <HomeIcon class="w-6 h-6 mr-1"/>
                        Home
                    </a>
                    <a href="#"
                        class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-400 hover:bg-opacity-25 rounded-2xl">
                        <UserIcon class="w-6 h-6 mr-1"/>
                        Users
                    </a>
                </div>
            </nav>
        </div>
    </div>
</template>
