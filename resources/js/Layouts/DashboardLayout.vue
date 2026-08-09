<script setup>
import Sidebar from '../Components/Sidebar.vue';

</script>
<template>
    <Sidebar />
    <div class="flex flex-col flex-1 overflow-y-auto">
        <slot />
    </div>
</template>
