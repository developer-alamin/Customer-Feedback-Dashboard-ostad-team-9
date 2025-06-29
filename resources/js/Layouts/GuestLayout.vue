<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import GuestHeader from "@/Components/GuestHeader.vue";
import { Link } from "@inertiajs/vue3";

// Define the props
const props = defineProps({
    image: {
        type: String,
        default: "/images/login.png",
    },
});
</script>

<template>
    <div
        class="flex min-h-screen flex-col items-center bg-gray-50 pt-6 sm:pt-0"
    >
        <!-- Page Header -->
        <GuestHeader />

        <!-- Main Content -->
        <div class="w-full sm:max-w-6xl flex items-center bg-[#d3efe3] rounded-md shadow-lg">
            <!-- Left Side for image -->
            <div class="w-3/5">
                <img
                    class="w-[450px] h-[450px] mx-auto object-cover"
                    :src="image"
                    alt="auth image"
                />
            </div>

            <!-- Right Side for form -->
            <div class="w-2/5 px-6 py-20 bg-white flex flex-col items-center rounded-r-md">
                <div
                    class="mt-6 w-full overflow-hidden px-6 py-4"
                >
                    <slot />
                </div>
            </div>
        </div>
    </div>
</template>
