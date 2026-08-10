<script setup>
import Navbar from '../Components/Navbar.vue';
import Sidebar from '../Components/Sidebar.vue';

</script>
<template>
    <div class="flex h-screen bg-stone-100">
        <Sidebar />
        <div class="flex flex-col flex-1 overflow-y-auto">
        <Navbar />

        <div class="p-16">
            <slot />
        </div>
    </div>
    </div>
</template>
