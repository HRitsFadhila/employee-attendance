<template>
    <div class="flex items-center justify-between h-16 bg-stone-300 border-b border-gray-200">
        <div class="flex items-center px-4">
            <button class="text-gray-500 focus:outline-none focus:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
        <div class="flex items-center pr-2">
            <button class="flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-gray-50 transition-all duration-200 focus:outline-none">
                <!-- Avatar -->
                <div class="relative">
                    <img
                        class="w-10 h-10 rounded-full object-cover ring-2 ring-white shadow-sm"
                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="Muhammad Harits Fadhila"
                    >
                </div>
                <div class="hidden sm:block text-left">
                    <h1 class="text-sm font-semibold text-gray-800 leading-5">
                        Muhammad Harits Fadhila
                    </h1>

                    <p class="text-xs text-gray-500 mt-0.5">
                        Administrator
                    </p>
                </div>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="hidden sm:block w-4 h-4 text-gray-400"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="m6 9 6 6 6-6"
                    />
                </svg>
            </button>
        </div>

    </div>
</template>
