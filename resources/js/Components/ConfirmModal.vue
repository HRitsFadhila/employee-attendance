<script setup>
    defineProps({
        show: Boolean,
        message: String,
    });
    const emit = defineEmits(["close", "confirm"]);
</script>

<template>
<div
    v-if="show"
    id="popup-modal"
    tabindex="-1"
    class="flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-full bg-gray-900/50"
>
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white border border-gray-200 rounded-lg shadow-sm p-4 md:p-6">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-9 h-9 ms-auto inline-flex justify-center items-center" @click="$emit('close')">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13V8m0 8h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                <h3 class="mb-6 text-gray-800">{{ message }}</h3>
                <div class="flex items-center space-x-4 justify-center">
                    <button
                        @click="$emit('confirm')"
                        type="button"
                        class="text-white bg-red-600 box-border border border-transparent hover:bg-red-700 focus:ring-4 focus:ring-red-300 shadow-sm font-medium leading-5 rounded-lg text-sm px-4 py-2.5 focus:outline-none">
                    Yes, I'm sure
                    </button>
                    <button
                        @click="$emit('close')"
                        type="button"
                        class="text-gray-700 bg-white box-border border border-gray-300 hover:bg-gray-100 hover:text-gray-900 focus:ring-4 focus:ring-gray-200 shadow-sm font-medium leading-5 rounded-lg text-sm px-4 py-2.5 focus:outline-none">
                    No, cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
