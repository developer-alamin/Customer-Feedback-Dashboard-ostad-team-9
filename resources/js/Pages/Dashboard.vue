<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import RightSidebar from "@/Components/RightSidebar/RightSidebar.vue";
import { Head } from "@inertiajs/vue3";

// Props from backend
const props = defineProps({
  questions: Array
})

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 my-5">
            <div class="flex justify-between gap-8">
                
                <!-- Left Side : Main Content Area -->
                <div class="w-[75%] overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    
                </div>

                <!-- Right Side : Questions Answer Area -->
                <div class="w-[25%]">
                    <RightSidebar :questions="questions" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
